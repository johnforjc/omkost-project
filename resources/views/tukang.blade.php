@extends('layouts.master')

@section('konten')
	@include('layouts.partial.navbar')
    <section class="gray p-0">
        <div class="container-fluid p-0">
            <div class="row">

                @include('layouts.partial.sidebar')

                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div class="dashboard-body">
                    
                        <div class="dashboard-wraper">
                            
                            <!-- Bookmark Property -->
                            <div class="frm_submit_block">	
                                <div class="filterspace__controls">
                                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="tabcektukang" data-toggle="pill" href="#pills-rent" role="tab" aria-controls="pills-rent" aria-selected="true" onclick="tabcek()">
                                                Cari Tukang
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabtambahtukang" data-toggle="pill" href="#pills-buy" role="tab" aria-controls="pills-buy" aria-selected="false" onclick="tabtambah()">
                                                Rekomendasikan tukang
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                </br></br>

                                <div class="align-items-left collapse show" id="cariTukangSection">
                                    <div class="row d-flex justify-content-between form-group">
                                        <div class="col-lg-6 mb-2">
                                            <h6>Jenis tukang</h6>
                                            <div class="simple-input">
                                                <select id="cariJenisTukang" class="form-control">
                                                    <option value="ac">AC</option>
                                                    <option value="bangunan">Bangunan</option>
                                                    <option value="ledeng">Ledeng</option>
                                                    <option value="listrik">Listrik</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 mb-2">
                                            <h6>Kota</h6>
                                            <input type="text" class="form-control" placeholder="Surabaya"
                                            id="cariKotaTukang">
                                        </div>

                                        <div class="col-lg-6 mb-2">
                                            <h6>Nama</h6>
                                            <input type="text" class="form-control" placeholder="Pak Londo" id="cariNamaTukang">                    
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button id="btnsimpan" type="button" class="btn btn-theme full-width bg-2" onclick="getTukang()">Simpan</button>
                                    </div>

                                    <h3>Hasil Pencarian</h3>
                                    <table class="property-table-wrap responsive-table bkmark">
                                        <tbody id="dttukang2">
                                            <thead>
                                                <tr>
                                                    <th style="text-align:left;width:1%;">Kota</th>
                                                    <th style="text-align:left;width:auto;">Nama</th>
                                                    <th style="text-align:left;width:1%;">Telp</th>
                                                    <th style="text-align:left;width:auto;">Keterangan</th>
                                                    <th style="text-align:left;width:1%;">Referensi</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="align-items-left collapse" id="tambahTukangSection">
                                    <div class="row d-flex justify-content-between form-group">
                                        <div class="col-lg-6 mb-2">
                                            <h6>Jenis tukang</h6>
                                            <div class="simple-input">
                                                <select id="tambahJenisTukang" class="form-control">
                                                    <option value="ac">AC</option>
                                                    <option value="bangunan">Bangunan</option>
                                                    <option value="ledeng">Ledeng</option>
                                                    <option value="listrik">Listrik</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 mb-2">
                                            <h6>Kota</h6>
                                            <input type="text" class="form-control" placeholder="Surabaya"
                                            id="tambahKotaTukang">
                                        </div>

                                        <div class="col-lg-6 mb-2">
                                            <h6>Nama</h6>
                                            <input type="text" class="form-control" placeholder="Pak Londo" id="tambahNamaTukang">                    
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <h6>Telp</h6>
                                            <input type="text" class="form-control" placeholder="081xxxxxxxxx"id="tambahTelponTukang">
                                        </div>

                                        <div class="col-md-6 mb-2">
                                            <h6>Keterangan</h6>
                                            <input type="text" class="form-control" placeholder="Hasil kerja bagus" id="tambahKeteranganTukang">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button id="btnsimpan" type="button" class="btn btn-theme full-width bg-2" onclick="setTukang()">Rekomendasikan</button>
                                    </div>
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
                        
                        <!--
                        <div class="row">
                            <div class="col-md-12 col-lg-12 mt-4">
                                <footer class="text-center">
                                    <p class="mb-0">© 2020 Verio. Designd By <a href="#">Pexel Experts</a> All Rights Reserved</p>
                                </footer>
                            </div>
                        </div>
                    -->
                        <!-- row -->
                    
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
        $("#sbtukang").addClass("active");
        function tabcek()
        {
            $("#cariTukangSection").collapse('show');
            $("#tambahTukangSection").collapse('hide');
            clearinput();
        }
        function tabtambah()
        {
            $("#cariTukangSection").collapse('hide');
            $("#tambahTukangSection").collapse('show');
            clearinput();
        }
        function clearinput()
        {
            $('#cariKotaTukang').val("");
            $('#cariNamaTukang').val("");
            $('#tambahKotaTukang').val("");
            $('#tambahNamaTukang').val("");
            $('#tambahKeteranganTukang').val("");
            $('#tambahTelponTukang').val("");
        }

        function setTukang()
		{
            $.ajax({
                type  : 'POST',
                url   : "{{ url('/api/setTukang') }}",
                dataType : 'json',
                headers: {
                    "Authorization" : "Bearer {{ Cookie::get('api_token') }}"
                },
                data : {
                    jenis       :$('#tambahJenisTukang').val(), 
                    kota        :$('#tambahKotaTukang').val(), 
                    nama        :$('#tambahNamaTukang').val(), 
                    telp        :$('#tambahTelponTukang').val(), 
                    keterangan  :$('#tambahKeteranganTukang').val()
                    //submit_by:"{{ Cookie::get('email') }}",
                },
                success : function(response){
                    //let data = response.data;
                    if(response.status)
                    {
                        alert(response.message);
                        getTukang();
                        clearinput();
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

        function getTukang()
		{
            $.ajax({
                type  : 'GET',
                url   : "{{ url('/api/getTukang') }}",
                dataType : 'json',
                headers: {
                    "Authorization" : "Bearer {{ Cookie::get('api_token') }}"
                },
                data : {
                    jenis       :$('#cariJenisTukang').val(), 
                    kota        :$('#cariKotaTukang').val(), 
                    nama        :$('#cariNamaTukang').val(), 
                },
                success : function(response){
                    let data = response.data;
                    if(response.status)
                    {
                        let html = '';

                        if(data.length == 0){
                            html = `<h3>Data tidak ditemukan</h3>`;
                        } else {
                            for(let i=0; i<data.length; i++){
                                html += `<tr>
                                            <td style="text-align:left;">${data[i].kota}</td>
                                            <td style="text-align:left;">${data[i].nama}</td>
                                            <td style="text-align:left;">${data[i].telp}</td>
                                            <td style="text-align:left;">${data[i].keterangan}</td>
                                            <td style="text-align:left;">${data[i].submit_by}</td>
                                        </tr>`;
                            }
                        }

                        $('#dttukang2').html(html);
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