@extends('layouts.master')

@section('konten')
	@include('layouts.partial.navbar')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <section class="gray p-0">
        <div class="container-fluid p-0">
            <div class="row">

                @include('layouts.partial.adminsidebar')

                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div class="dashboard-body">
                    
                        <div class="dashboard-wraper">
                            
                            <!-- Bookmark Property -->
                            <div class="frm_submit_block">	
                                <div class="align-items-left" id="cariBlacklistSection">
                                    <h3>Data blacklist</h3>
                                    <div class="row d-flex justify-content-between form-group">
                                        
                                        <div class="col-lg-6 mb-2">
                                            <h6>Jenis Blacklist</h6>
                                            <div class="simple-input">
                                                <select id="validasiStatus" class="form-control">
                                                    <option value="belum">Belum Divalidasi</option>
                                                    <option value="sudah">Sudah Divalidasi</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <button id="btncek" type="button" class="btn btn-theme full-width bg-2" onclick="getStatusBlacklist()">Cek</button>

                                    <h3>Hasil Pencarian</h3>
                                    <table class="property-table-wrap responsive-table bkmark">
                                        <tbody id="dtblacklist2">
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Pagination -->
                            <!--
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<ul class="pagination p-center">
										<li class="page-item">
										  <a class="page-link" href="#" aria-label="Previous">
											<span class="ti-arrow-left"></span>
											<span class="sr-only">Previous</span>
										  </a>
										</li>
										<li class="page-item"><a class="page-link" href="#">1</a></li>
										<li class="page-item"><a class="page-link" href="#">2</a></li>
										<li class="page-item active"><a class="page-link" href="#">3</a></li>
										<li class="page-item"><a class="page-link" href="#">...</a></li>
										<li class="page-item"><a class="page-link" href="#">18</a></li>
										<li class="page-item">
										  <a class="page-link" href="#" aria-label="Next">
											<span class="ti-arrow-right"></span>
											<span class="sr-only">Next</span>
										  </a>
										</li>
									</ul>
								</div>
							</div>
                        -->
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </section>
	@include('layouts.partial.footer')
@endsection		

@section('script')
    @parent

	<script>
        $("#sbblacklist").addClass("active");
        function validateBlacklist(id){
            $.ajax({
                type  : 'PUT',
                url   : "{{ url('/api/validateBlacklist') }}",
                dataType : 'json',
                headers: {
                    "Authorization" : "Bearer {{ Cookie::get('api_token') }}",
                },
                data: {
                    id : id
                },
                success : function(response){
                    let data = response.data;
                    if(response.status)
                    {
                        alert(response.message);
                        getBlacklist();
                    }
                    else
                    {
                        alert(response.message);
                    }
                },
                error: function(err){
                    alert("Error, hubungi admin")
                }
            });
        }

        function deleteBlacklist(){
            $.ajax({
                type  : 'DELETE',
                url   : "{{ url('/api/deleteBlacklist') }}",
                dataType : 'json',
                headers: {
                    "Authorization" : "Bearer {{ Cookie::get('api_token') }}",
                },
                data: {
                    id : '23'
                },
                success : function(response){
                    let data = response.data;
                    if(response.status)
                    {
                        alert(response.message);
                        getBlacklist();
                        clearinput();
                    }
                    else
                    {
                        alert(response.message);
                    }
                },
                error: function(err){
                    console.log("masuk sini")
                    alert("Error, hubungi admin")
                }
            });
        }

        async function getStatusBlacklist() {
            // Check if input's length more than 5 character, then autosearch is on
            // This make the server not heavy query if the input is very short for auto search

            // Make HTML Element using Javascript for blacklist
            let html2 = "";

            await $.ajax({
                type: "GET",
                url: "{{ url('/api/getBlacklist') }}",
                dataType: "json",
                headers: {
                    Authorization: "Bearer {{ Cookie::get('api_token') }}"
                },
                data: {
                    status  : $('#validasiStatus').val()
                },
                success: function(response) {
                    let data = response.data;
                    if (response.status) {
                        // Make sure the data of blacklist minimal 1
                        if (data.length !== 0) {
                            for (let i = 0; i < data.length; i++) {
                                html2 += `<tr>
                                            <td class="dashboard_propert_wrapper" class="row">
                                                <img class="col-md-3" src="https://via.placeholder.com/1400x720" alt="">
                                                <div class="title col-md-6">
                                                    <h3 id="spannama">${data[i].nama}</h3>
                                                    <h4><a href="#">${data[i].identitas}</a></h4>
                                                    <span>Telp : ${data[i].telp}</span>
                                                    <span>Keterangan : ${data[i].keterangan}</span>
                                                </div>
                                                ${data[i].validate_at ?
                                                `<div class="col-md-3">
                                                    <div class="btn btn-primary">Validated</div>
                                                </div>`
                                                    : 
                                                `<div class="col-md-3">
                                                    <div class="btn btn-primary" onclick="validateBlacklist(${data[i].id})">Validasi</div>
                                                </div>`
                                            }
                                                
                                            </td>
                                        </tr>`;
                            }
                        } else {
                            // Give a feedback for user if doesnt exist data with input
                            html2 =
                                "<h4>Semua data blacklist sudah divalidasi</h4>";
                        }
                    } else {
                        alert(response.message);
                    }
                },
                error: function(err) {
                    alert("Error, hubungi admin");
                }
            });

            $("#dtblacklist2").html(html2);
        }
	</script>
@stop