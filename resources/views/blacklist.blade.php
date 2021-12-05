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
                                            <a class="nav-link active" id="tabcekblacklist" data-toggle="pill" href="#pills-rent" role="tab" aria-controls="pills-rent" aria-selected="true" onclick="tabcek()">
                                                Cek Blacklist
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabtambahblacklist" data-toggle="pill" href="#pills-buy" role="tab" aria-controls="pills-buy" aria-selected="false" onclick="tabtambah()">
                                                Tambah Blacklist
                                            </a>
                                            
                                        </li>
                                    </ul>
                                </div>
                                </br></br>

                                <div class="row align-items-left">
                                    <div class="col-lg-4">
                                        <h6>Jenis Blacklist</h6>
                                        <div class="form-group">
                                            <div class="simple-input">
                                                <select id="seljenisblacklist" class="form-control">
                                                    <option value="pencari">Pencari Kost</option>
                                                    <option value="pegawai">Pegawai Kost</option>
                                                    <option value="tukang">Tukang</option>
                                                    <option value="toko">Toko</option>
                                                </select>
                                            </div>
                                        </div>
    
                                        <div id = "divcek" class = "collapse show">
                                            <h6>Cari Melalui</h6>
                                            <div class="form-group">
                                                <div class="input-with-icon">
                                                    <input type="text" class="form-control" placeholder="KTP / Nama"
                                                    id="txtcari">
                                                    <i class="ti-search"></i>
                                                </div>
                                            </div>
                                            <button id="btncek" type="button" class="btn btn-theme full-width bg-2" onclick="getBlacklist()">Cek</button>
                                        </div>
    
                                        <div id = "divtambah" class = "collapse">
                                            <div class="form-group">
                                                <div class="input-with-icon">
                                                    <h6>Kota</h6>
                                                    <input type="text" class="form-control" placeholder="Surabaya"
                                                    id="txtkota">
                                                    <h6>No Identitas</h6>
                                                    <input type="text" class="form-control" placeholder="357xxxxxxxxxx"
                                                    id="txtidentitas">
                                                    <h6>Nama</h6>
                                                    <input type="text" class="form-control" placeholder="Rudy"
                                                    id="txtnama1">
                                                    <h6>Telp</h6>
                                                    <input type="text" class="form-control" placeholder="081xxxxxxxxx"
                                                    id="txttelp1">
                                                    <h6>Keterangan</h6>
                                                    <input type="text" class="form-control" placeholder="Kabur tidak bayar kos"
                                                    id="txtketerangan">
                                                    <h6>Bukti</h6>
                                                    <input type="file" class="form-control"
                                                    id="txtbukti">
                                                </div>
                                                <button id="btnsimpan" type="button" class="btn btn-theme full-width bg-2" onclick="setBlacklist()">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                <!--
                                    <div class="col-lg-8">
                                        <table class="table" id="tabelblacklist" style = "width:100%;">
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
                                            <tbody id="dtblacklist">
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                -->
                                </div>
                            </div>
                            <h3>Hasil Pencarian</h3>
                            <table class="property-table-wrap responsive-table bkmark">
                                <tbody id="dtblacklist2">
                                    <!-- Item #1 
                                    <tr>
                                        <td class="dashboard_propert_wrapper">
                                            <img src="https://via.placeholder.com/1400x720" alt="">
                                            <div class="title">
                                                <h4><a href="#">Identitas</a></h4>
                                                <span id="spannama">Nama : </span>
                                                <span>Telp : asdfsdfsd</span>
                                                <span>Keterangan : </span>
                                                <span class="table-property-price">$900 / monthly</span>
                                            </div>
                                        </td>-->
                                    <!--
                                        <td class="action">
                                            <a href="#" class="delete"><i class="ti-close"></i> Delete</a>
                                        </td>
                                    
                                    </tr>-->
                                </tbody>
                            </table>

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
        $("#sbblacklist").addClass("active");
        function tabcek()
        {
            $("#divcek").collapse('show');
            $("#divtambah").collapse('hide');
        }
        function tabtambah()
        {
            $("#divcek").collapse('hide');
            $("#divtambah").collapse('show');
        }
        function clearinput()
        {
            $('#txtkota').val("");
            $('#txtidentitas').val("");
            $('#txtnama1').val("");
            $('#txttelp1').val("");
            $('#txtketerangan').val("");
        }

        function setBlacklist()
		{
            $.ajax({
                type  : 'POST',
                url   : "{{ url('/api/setBlacklist') }}",
                dataType : 'json',
                headers: {
                    "Authorization" : "Bearer {{ Cookie::get('api_token') }}"
                },
                data : {
                    jenis       :$('#seljenisblacklist').val(), 
                    kota        :$('#txtkota').val(), 
                    identitas   :$('#txtidentitas').val(), 
                    nama        :$('#txtnama1').val(), 
                    telp        :$('#txttelp1').val(), 
                    keterangan  :$('#txtketerangan').val()
                    //submit_by:"{{ Cookie::get('email') }}",
                },
                success : function(response){
                    //var data = response.data;
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
                    alert("Error, hubungi admin")
                }
            });
        }

        function getBlacklist()
		{
            $.ajax({
                type  : 'GET',
                url   : "{{ url('/api/getBlacklist') }}",
                dataType : 'json',
                headers: {
                    "Authorization" : "Bearer {{ Cookie::get('api_token') }}"
                },
                data : {
                    cari  :$('#txtcari').val()
                },
                success : function(response){
                    var data = response.data;
                    if(response.status)
                    {
                        //alert(response.message);
                        var html = '';
                        var html2 = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            /*
                            html += '<tr>'+
                                    '<td style="text-align:left;">'+data[i].kota+'</td>'+
                                    '<td style="text-align:left;">'+data[i].identitas+'</td>'+
                                    '<td style="text-align:left;">'+data[i].nama+'</td>'+
                                    '<td style="text-align:left;">'+data[i].telp+'</td>'+
                                    '<td style="text-align:left;">'+data[i].keterangan+'</td>'+
                                    '</tr>';
                            */
                            html2 += '<tr>'+
                                        '<td class="dashboard_propert_wrapper">'+
                                            '<img src="https://via.placeholder.com/1400x720" alt="">'+
                                            '<div class="title">'+
                                                '<h4><a href="#">'+data[i].identitas+'</a></h4>'+
                                                '<span id="spannama">Nama : '+data[i].nama+'</span>'+
                                                '<span>Telp : '+data[i].telp+'</span>'+
                                                '<span>Keterangan : '+data[i].keterangan+'</span>'+
                                            '</div>'+
                                        '</td>'+
                                    '</tr>';
                        }
                        $('#dtblacklist').html(html);
                        $('#dtblacklist2').html(html2);
                        //document.getElementById('spannama').innerHTML += "tes";
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

        window.onload=getBlacklist();
	</script>
@stop