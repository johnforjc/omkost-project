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
                                        <div class="col-lg-6 mb-2">
                                            <h6>Status Validasi</h6>
                                            <div class="simple-input">
                                                <select id="statusTukang" class="form-control">
                                                    <option value="belum">Belum Divalidasi</option>
                                                    <option value="sudah">Sudah Divalidasi</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button id="btnsimpan" type="button" class="btn btn-theme full-width bg-2" onclick="getTukang()">Simpan</button>
                                    </div>

                                    <h3>Hasil Pencarian</h3>
                                    <table class="property-table-wrap responsive-table bkmark">
                                        <tbody id="dttukang2">
                                            <thead>
                                                
                                            </thead>
                                        </tbody>
                                    </table>
                                    <div id="adminTukang" class="pagination-box"></div>
                                </div>

                                <!--
                                    <div class="col-lg-8">
                                        <table class="table" id="tabeltukang" style = "width:100%;">
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
                                            <tbody id="dttukang">
                                                
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

    <div class="reject-container" id="reject-box">
        <div id="reject-content" class="reject-content-box">

        </div>
    </div>
	@include('layouts.partial.footer')
@endsection		

@section('script')
    @parent

	<script>
        $("#sbtukang").addClass("active");

        function showBox(id){
            $("#reject-box").toggleClass("active");

            let html = `
                <div class="row mb-3">
                    <h6>Beri feedback kepada user mengapa data masih belum layak</h6>
                </div>
                <div class="simple-input mb-3">
                    <select id="keteranganTolak" class="form-control">
                        <option value="Gambar kurang jelas">Gambar kurang jelas</option>
                        <option value="Toko tidak ada">Toko tidak ada</option>
                        <option value="Alamat tidak ada">Alamat tidak sesuai</option>
                        <option value="Nomor telpon tidak ada">Nomor telpon tidak sesuai</option>
                    </select>
                </div>

                <div class="row d-flex align-content-center justify-content-end">
                    <div class="col-sm-3 btn-danger p-2 mr-2 text-center" onclick="closeBox()">
                        Batal
                    </div>

                    <div class="col-sm-3 bg-blue button-primary p-2 text-center" style="color:white"onclick="tolakTukang(${id})">
                        Kirim Penolakan
                    </div>
                </div>
            `;

            $("#reject-content").html(html);
        }

        function closeBox(event){
            if($("#reject-box").hasClass("active")){
                $("#reject-box").toggleClass("active");
            }
        }

        function validateTukang(id){
            $.ajax({
                type  : 'PUT',
                url   : "{{ url('/api/validateTukang') }}",
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
                        getTukang();
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

        function tolakTukang(id){
            $.ajax({
                type  : 'PUT',
                url   : "{{ url('/api/validateTukang') }}",
                dataType : 'json',
                headers: {
                    "Authorization" : "Bearer {{ Cookie::get('api_token') }}",
                },
                data: {
                    id : id,
                    keterangan : $('#keteranganTolak').val()
                },
                success : function(response){
                    let data = response.data;
                    if(response.status)
                    {
                        alert(response.message);
                        getTukang();
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
        
        function getTukang(page = 1)
		{
            $.ajax({
                type  : 'GET',
                url   : `{{ url('/api/getTukang?page=${page}') }}`,
                dataType : 'json',
                headers: {
                    "Authorization" : "Bearer {{ Cookie::get('api_token') }}"
                },
                data : {
                    status       :$('#statusTukang').val(),
                },
                success : function(response){
                    let result = response.data;
                    if(response.status)
                    {
                        let html = '';
                        let data = result.data;
                        if(data.length == 0){
                            html = `<h3>Data tidak ditemukan</h3>`;
                        } else {
                            for(let i=0; i<data.length; i++){
                                html += `<tr>
                                            <td class="dashboard_propert_wrapper" class="row">
                                                <img class="col-md-3" src="https://via.placeholder.com/1400x720" alt="">
                                                <div class="title col-md-6">
                                                    <h3 id="spannama">${data[i].nama}</h3>
                                                    <h4><a href="#">${data[i].telp}</a></h4>
                                                    <span>Kota : ${data[i].kota}</span>
                                                    <span>Keterangan :${data[i].keterangan}</span>
                                                </div>
                                                ${data[i].validate_by ?
                                                `<div class="col-md-3">
                                                    <div class="btn btn-primary">Validated</div>
                                                </div>`
                                                    : 
                                                `<div class="col-md-3">
                                                    <div class="btn btn-primary" onclick="validateTukang(${data[i].id})">Validasi</div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="btn btn-primary" onclick="showBox(${data[i].id})">Tolak</div>
                                                </div>`
                                            }
                                                
                                            </td>
                                        </tr>`
                            }
                        }

                        $('#dttukang2').html(html);

                        makePagination(result.current_page, result.last_page, 'getTukang', "#adminTukang");
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