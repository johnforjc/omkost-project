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

                                <div class="align-items-left collapse show" id="cariBlacklistSection">
                                    <div class="row d-flex justify-content-between form-group">
                                        
                                        <div class="col-lg-6 mb-2">
                                            <h6>Jenis Blacklist</h6>
                                            <div class="simple-input">
                                                <select id="cariJenisBlacklist" class="form-control">
                                                    <option value="pencari">Pencari Kost</option>
                                                    <option value="pegawai">Pegawai Kost</option>
                                                    <option value="tukang">Tukang</option>
                                                    <option value="toko">Toko</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 mb-2">
                                            <h6>Nama/NIK</h6>
                                            <input type="text" class="form-control" placeholder="Rudy" id="cariNamaBlacklist" oninput="getBlacklist()">
                                        </div>
                                    </div>

                                    <button id="btncek" type="button" class="btn btn-theme full-width bg-2" onclick="getBlacklist()">Cek</button>

                                    <h3>Hasil Pencarian</h3>
                                    <table class="property-table-wrap responsive-table bkmark">
                                        <tbody id="dtblacklist2">
                                            
                                        </tbody>
                                    </table>
                                </div>


                                <div class="align-items-left collapse" id="tambahBlacklistSection">
                                        <form enctype="multipart/form-data" onsubmit="setBlacklist()">
                                            @csrf
                                            <div class="row d-flex justify-content-between form-group">
                                                <div class="col-lg-6 mb-2">
                                                    <h6>Jenis Blacklist</h6>
                                                    <div class="simple-input">
                                                        <select id="tambahJenisBlacklist" class="form-control">
                                                            <option value="pencari">Pencari Kost</option>
                                                            <option value="pegawai">Pegawai Kost</option>
                                                            <option value="tukang">Tukang</option>
                                                            <option value="toko">Toko</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mb-2">
                                                    <h6>Kota</h6>
                                                    <input type="text" class="form-control" placeholder="Surabaya" id="tambahKotaBlacklist">
                                                </div>
                                                
                                                <div class="col-lg-6 mb-2">
                                                    <h6>No Identitas</h6>
                                                    <input type="text" class="form-control" placeholder="357xxxxxxxxxx"id="tambahIdentitasBlacklist">
                                                </div>
                                                
                                                <div class="col-lg-6 mb-2">
                                                    <h6>Nama</h6>
                                                    <input type="text" class="form-control" placeholder="Rudy" id="tambahNamaBlacklist">
                                                </div>
                                                
                                                <div class="col-lg-6 mb-2">
                                                    <h6>Telp</h6>
                                                    <input type="text" class="form-control" placeholder="081xxxxxxxxx" id="tambahTelponBlacklist">
                                                </div>
                                                
                                                <div class="col-lg-6 mb-2">
                                                    <h6>Keterangan</h6>
                                                    <input type="text" class="form-control" placeholder="Kabur tidak bayar kos" id="tambahKeteranganBlacklist">
                                                </div>

                                                <div class="col-lg-6 mb-2">
                                                    <h6>Bukti</h6>
                                                    <input type="file" class="form-control" id="tambahBuktiBlacklist">
                                                </div>
                                            </div>
                                                
                                            <div class="form-group col">
                                                <button id="btnsimpan" type="submit" class="btn btn-theme full-width bg-2">Simpan</button>
                                            </div>
                                        </form>
                                    </div>

                                        <!-- <div class="form-group">
                                            <div class="simple-input">
                                                <select id="seljenisblacklist" class="form-control">
                                                    <option value="pencari">Pencari Kost</option>
                                                    <option value="pegawai">Pegawai Kost</option>
                                                    <option value="tukang">Tukang</option>
                                                    <option value="toko">Toko</option>
                                                </select>
                                            </div>
    
                                        <div id = "divcek" class = "collapse show">
                                            <h6>Cari Melalui</h6>
                                            <div class="form-group">
                                                <div class="input-with-icon">
                                                    <input type="text" class="form-control" placeholder="KTP / Nama"
                                                    id="txtcari" oninput="getBlacklist()" autofocus>
                                                    <i class="ti-search"></i>
                                                </div>
                                            </div>
                                            <button id="btncek" type="button" class="btn btn-theme full-width bg-2" onclick="getBlacklist()">Cek</button>
                                        </div> -->
    
                                        <!-- <div id = "divtambah" class = "collapse">
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
                                        </div> -->
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
        function tabcek()
        {
            $("#cariBlacklistSection").collapse('show');
            $("#tambahBlacklistSection").collapse('hide');
            clearinput();
        }
        function tabtambah()
        {
            $("#cariBlacklistSection").collapse('hide');
            $("#tambahBlacklistSection").collapse('show');
            clearinput();
        }
        function clearinput()
        {
            $('#tambahKotaBlacklist').val("");
            $('#tambahIdentitasBlacklist').val("");
            $('#tambahNamaBlacklist').val("");
            $('#tambahTelponBlacklist').val("");
            $('#tambahKeteranganBlacklist').val("");
            $('#tambahBuktiBlacklist').val("");
            $('#cariNamaBlacklist').val("");
        }

        function validateBlacklist(){
            $.ajax({
                type  : 'PUT',
                url   : "{{ url('/api/validateBacklist') }}",
                dataType : 'json',
                headers: {
                    "Authorization" : "Bearer {{ Cookie::get('api_token') }}",
                },
                data: {
                    id : '1'
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

        function setBlacklist()
		{
            event.preventDefault();

            // let formElement = document.querySelector('form#divtambah');

            // let newFormData = new FormData(formElement);

            // for (let value of newFormData.values()) {
            //     console.log(value);
            // }

            // return;

            // // console.log(newFormData.values('txtkota'));
            // // return;

            // // console.log('masuk');
            $.ajax({
                type  : 'POST',
                url   : "{{ url('/api/setBlacklist') }}",
                dataType : 'json',
                headers: {
                    "Authorization" : "Bearer {{ Cookie::get('api_token') }}",

                },
                // data    : newFormData,
                data : {
                    jenis       :$('#tambahJenisBlacklist').val(), 
                    kota        :$('#tambahKotaBlacklist').val(), 
                    identitas   :$('#tambahIdentitasBlacklist').val(), 
                    nama        :$('#tambahNamaBlacklist').val(), 
                    telp        :$('#tambahTelponBlacklist').val(), 
                    keterangan  :$('#tambahKeteranganBlacklist').val(),
                    bukti       :$('#tambahBuktiBlacklist').val(),

                    //submit_by:"{{ Cookie::get('email') }}",
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

        async function getBlacklist() {
            // Check if input's length more than 5 character, then autosearch is on
            // This make the server not heavy query if the input is very short for auto search

            // Make HTML Element using Javascript for blacklist
            let html2 = "";

            console.log($("#cariNamaBlacklist").val());
            if ($("#cariNamaBlacklist").val().length > 5) {
                // Make a async funtion for this fecth function from server
                await $.ajax({
                    type: "GET",
                    url: "{{ url('/api/getBlacklist') }}",
                    dataType: "json",
                    headers: {
                        Authorization: "Bearer {{ Cookie::get('api_token') }}"
                    },
                    data: {
                        jenis: $('#cariJenisBlacklist').val(),
                        cari: $("#cariNamaBlacklist").val()
                    },
                    success: function(response) {
                        let data = response.data;
                        if (response.status) {
                            // Make sure the data of blacklist minimal 1
                            if (data.length !== 0) {
                                for (let i = 0; i < data.length; i++) {
                                    html2 += `<tr>
                                                <td class="dashboard_propert_wrapper">
                                                    <img src="https://via.placeholder.com/1400x720" alt="">
                                                    <div class="title">
                                                        <h3 id="spannama">${data[i].nama}</h3>
                                                        <h4><a href="#">${data[i].identitas}</a></h4>
                                                        <span>Telp : ${data[i].telp}</span>
                                                        <span>Keterangan : ${data[i].keterangan}</span>
                                                    </div>
                                                </td>
                                            </tr>`;
                                }
                            } else {
                                // Give a feedback for user if doesnt exist data with input
                                html2 =
                                    "<h4>Nama atau NIK tidak ditemukan di daftar blacklist.</h4>";
                            }
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(err) {
                        alert("Error, hubungi admin");
                    }
                });
            }

            $("#dtblacklist2").html(html2);
        }
	</script>
@stop