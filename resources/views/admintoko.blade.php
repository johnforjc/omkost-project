@extends('layouts.master')

@section('konten')
	@include('layouts.partial.navbar')
    <section class="gray p-0">
        <div class="container-fluid p-0">
            <div class="row">

                @include('layouts.partial.adminsidebar')

                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div class="dashboard-body">
                    
                        <div class="dashboard-wraper">
                            
                            <!-- Bookmark Property -->
                            <div class="frm_submit_block">
                                <div class="align-items-left" id="cariTukangSection">
                                    <div class="row d-flex justify-content-between form-group">

                                        <div class="col-lg-6  mb-2">
                                            <h6>Jenis toko</h6>
                                            <div class="simple-input">
                                                <select id="statusValidasi" class="form-control">
                                                    <option value="belum">Belum Validasi</option>
                                                    <option value="sudah">Sudah Validasi</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col" >
                                        <button id="btncek" type="button" class="btn btn-theme full-width bg-2" onclick="getToko()">Cek</button>
                                    </div>

                                    <h3>Hasil Pencarian</h3>
                                    <table class="property-table-wrap responsive-table bkmark">
                                        <tbody id="dttoko2">
                                            
                                        </tbody>
                                    </table>

                                    <div id="adminToko" class="pagination-box"></div>
                                </div>

                                <!--
                                    <div class="col-lg-8">
                                        <table class="table" id="tabeltoko" style = "width:100%;">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:left;width:1%;">Kota</th>
                                                    <th style="text-align:left;width:1%;">Identitas</th>
                                                    <th style="text-align:left;width:1%;">Nama</th>
                                                    <th style="text-align:left;width:1%;">Telp</th>
                                                    <th style="text-align:left;width:auto;">Keterangan</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="dttoko">
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                -->
                                </div>
                            </div>

                            <!--
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                    <a href="#" class="btn btn-theme arrow-btn bg-2">Lihat Semua<span><i class="ti-arrow-right"></i></span></a>
                                </div>
                            </div>
                        -->
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
        $("#sbtoko").addClass("active");
        function validateToko(id){
            $.ajax({
                type  : 'PUT',
                url   : "{{ url('/api/validateToko') }}",
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
                        getToko();
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

        function getToko(page = 1)
		{
            $.ajax({
                type  : 'GET',
                url   : `{{ url('/api/getToko?page=${page}') }}`,
                dataType : 'json',
                headers: {
                    "Authorization" : "Bearer {{ Cookie::get('api_token') }}"
                },
                data : {
                   status    :$('#statusValidasi').val(),
                },
                success : function(response){
                    let result = response.data;
                    if(response.status)
                    {
                        //alert(response.message);
                        let html = '';
                        let data = result.data;
                        if( data.length == 0 ){
                            html = `<h3>Data tidak ditemukan</h3>`
                        } else {
                            for(let i=0; i<data.length; i++){
                                html += `<tr>
                                            <td class="dashboard_propert_wrapper" class="row">
                                                <img class="col-md-3" src="https://via.placeholder.com/1400x720" alt="">
                                                <div class="title col-md-6">
                                                    <h3 id="spannama">${data[i].nama}</h3>
                                                    <h4><a href="#">${data[i].telp}</a></h4>
                                                    <span>${data[i].alamat},${data[i].kota}</span>
                                                    <span>Keterangan :${data[i].keterangan}</span>
                                                </div>
                                                ${data[i].validate_at ?
                                                `<div class="col-md-3">
                                                    <div class="btn btn-primary">Validated</div>
                                                </div>`
                                                    : 
                                                `<div class="col-md-3">
                                                    <div class="btn btn-primary" onclick="validateToko(${data[i].id})">Validasi</div>
                                                </div>`
                                            }
                                                
                                            </td>
                                        </tr>`
                            }
                        }
                        
                        $('#dttoko2').html(html);

                        makePagination(result.current_page, result.last_page, 'getToko', "#adminToko");
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

	</script>
@stop