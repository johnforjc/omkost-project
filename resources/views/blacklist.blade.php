@extends('layouts.master')

@section('konten')
	@include('layouts.partial.navbar')
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

                                    <div id="allBlacklist" class="pagination-box"></div>
                                </div>


                                <div class="align-items-left collapse" id="tambahBlacklistSection">
                                        <form enctype="multipart/form-data" onsubmit="setBlacklist()" id="formAddBlacklist">
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

                                        <h3>Daftar Blacklist Anda</h3>
                                        <table class="property-table-wrap responsive-table bkmark">
                                            <tbody id="blacklist">
                                                
                                            </tbody>
                                            <!-- Button trigger modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body" id="modal-body-data">
                                                                
                                                            </div>
                                                            <div class="modal-footer" id="modal-action-data">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                    </div>    
                                                </div>
                                            </div>
                                            
                                        </table>

                                        <div id="ownerBlacklist" class="pagination-box"></div>

                                    </div>
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

    <div class="image-preview-container" id="toggle-image-preview" onclick="closeImage()">
        <div class="close-btn" onclick="closeImage()">
            X
        </div>
        <div id="image-element" class="image-preview-box">

        </div>
    </div>
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
            getMyBlacklist();
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

        function deleteBlacklist(id){
            $.ajax({
                type  : 'DELETE',
                url   : "{{ url('/api/deleteBlacklist') }}",
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
                        getMyBlacklist();
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

        function updateBlacklist(id){
            let formData = new FormData();

            let file = $('#updateBuktiBlacklist')[0].files[0];

            console.log(file);
            if(file) formData.append('bukti', file);

            formData.append('id', `${id}`);
            formData.append('kota', $('#updateKotaBlacklist').val());
            formData.append('identitas', $('#updateIdentitasBlacklist').val());
            formData.append('nama', $('#updateNamaBlacklist').val());
            formData.append('telp', $('#updateTelponBlacklist').val());
            formData.append('keterangan', $('#updateKeteranganBlacklist').val());

            for (let pair of formData.entries()) {
                console.log(pair[0]+ ', ' + pair[1]); 
            }  
            
            $.ajax({
                type  : 'POST',
                url   : "{{ url('/api/updateBlacklist') }}",
                dataType : 'json',
                headers: {
                    "Authorization" : "Bearer {{ Cookie::get('api_token') }}",
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data    : formData,
                cache: false,
                processData: false,  // tell jQuery not to process the data
                contentType: false,  // tell jQuery not to set contentType
                async: false,
                success : function(response){
                    let data = response.data;
                    if(response.status)
                    {
                        alert(response.message);
                        getMyBlacklist();
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

        function setBlacklist(){
            event.preventDefault();

            let formData = new FormData();

            let file = $('#tambahBuktiBlacklist')[0].files[0];
            formData.append('bukti', file);
            formData.append('jenis', $('#tambahJenisBlacklist').val());
            formData.append('kota', $('#tambahKotaBlacklist').val());
            formData.append('identitas', $('#tambahIdentitasBlacklist').val());
            formData.append('nama', $('#tambahNamaBlacklist').val());
            formData.append('telp', $('#tambahTelponBlacklist').val());
            formData.append('keterangan', $('#tambahKeteranganBlacklist').val());

            $.ajax({
                type  : 'POST',
                url   : "{{ url('/api/setBlacklist') }}",
                dataType : 'json',
                headers: {
                    "Authorization" : "Bearer {{ Cookie::get('api_token') }}",
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data    : formData,
                cache: false,
                processData: false,  // tell jQuery not to process the data
                contentType: false,  // tell jQuery not to set contentType
                async: false,
                success : function(response){
                    let data = response.data;
                    if(response.status)
                    {
                        alert(response.message);
                        getMyBlacklist();
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

        async function getBlacklist(page = 1) {
            // Check if input's length more than 5 character, then autosearch is on
            // This make the server not heavy query if the input is very short for auto search

            // Make HTML Element using Javascript for blacklist
            let html2 = "";

            if ($("#cariNamaBlacklist").val().length > 5) {
                // Make a async funtion for this fecth function from server
                await $.ajax({
                    type: "GET",
                    url: `{{ url('/api/getBlacklist?page=${page}') }}`,
                    dataType: "json",
                    headers: {
                        Authorization: "Bearer {{ Cookie::get('api_token') }}"
                    },
                    data: {
                        jenis: $('#cariJenisBlacklist').val(),
                        cari: $("#cariNamaBlacklist").val()
                    },
                    success: function(response) {
                        let result = response.data;
                        if (response.status) {
                            // Make sure the data of blacklist minimal 1
                            let data = result.data;
                            if (data.length !== 0) {
                                for (let i = 0; i < data.length; i++) {
                                    html2 += `<tr>
                                                <td class="dashboard_propert_wrapper">
                                                    <img src="storage/${data[i].bukti}" alt="" onclick="showImage('${data[i].bukti}')" class="image-icon">
                                                    <div class="title">
                                                        <h3 id="spannama">${data[i].nama}</h3>
                                                        <h4><a href="#">${data[i].identitas}</a></h4>
                                                        <span>Telp : ${data[i].telp}</span>
                                                        <span>Keterangan : ${data[i].keterangan}</span>
                                                    </div>
                                                </td>
                                            </tr>`;
                                }
                                makePagination(result.current_page, result.last_page, 'getBlacklist', "#allBlacklist");
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

        async function getMyBlacklist(page = 1) {
            // Check if input's length more than 5 character, then autosearch is on
            // This make the server not heavy query if the input is very short for auto search

            // Make HTML Element using Javascript for blacklist
            let html2 = "";
            let email = "{{Cookie::get('email')}}";

            await $.ajax({
                type: "GET",
                url: `{{ url('/api/getBlacklist?page=${page}') }}`,
                dataType: "json",
                headers: {
                    Authorization: "Bearer {{ Cookie::get('api_token') }}"
                },
                data: {
                    email       : email
                },
                success: function(response) {
                    let result = response.data;
                    console.log(result);
                    if (response.status) {
                        // Make sure the data of blacklist minimal 1
                        let data = result.data;
                        if (data.length !== 0) {
                            for (let i = 0; i < data.length; i++) {
                                html2 += `<tr>
                                            <td class="dashboard_propert_wrapper">
                                                <div class="col">
                                                    <div class="row mb-2 align-content-center">
                                                        <div class="col-md-3">
                                                            <img src="storage/${data[i].bukti}" alt="" onclick="showImage('${data[i].bukti}')" class="image-icon">
                                                        </div>
                                                        <div class="title col-md-9">
                                                            <h3 id="spannama">${data[i].nama}</h3>
                                                            <h4><a href="#">${data[i].identitas}</a></h4>
                                                            <span>Telp : ${data[i].telp}</span>
                                                            <span>Keterangan : ${data[i].keterangan}</span>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="row d-flex justify-content-lg-around align-content-center">
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-mode="update" data-nama="${data[i].nama}"
                                                        data-id="${data[i].id}" data-keterangan="${data[i].keterangan}" data-telpon="${data[i].telp}" data-identitas="${data[i].identitas}" data-kota="${data[i].kota}">
                                                        Update
                                                        </button>
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-mode="delete" data-id="${data[i].id}">
                                                        Delete
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>`;
                            }

                            makePagination(result.current_page, result.last_page, 'getMyBlacklist', "#ownerBlacklist");
                        } else {
                            // Give a feedback for user if doesnt exist data with input
                            html2 =
                                "<h4>Anda belum memasukkan data blacklist</h4>";
                        }
                    } else {
                        alert(response.message);
                    }
                },
                error: function(err) {
                    alert("Error, hubungi admin");
                }
            });

            $("#blacklist").html(html2);
        }

        function showImage(imageSource){
            $("#toggle-image-preview").toggleClass("active");

            let image = `
                <img src="storage/${imageSource}" alt="Bukti">
            `
            $("#image-element").html(image);
        }

        function closeImage(event){
            if($("#toggle-image-preview").hasClass("active")){
                $("#toggle-image-preview").toggleClass("active");
            }
        }

        $('#exampleModal').on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget);
            let mode = button.data('mode');

            if(mode == "delete"){
                let modal = $(this);
                modal.find('.modal-title').text('Konfirmasi Penghapusan Data');
                $('#modal-body-data').html(`
                    <p>Apakah anda yakin menghapus data blacklist ini?</p>
                `);
                $('#modal-action-data').html(`
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="deleteBlacklist(${button.data('id')})">Hapus</button>
                `);
            }

            if(mode == "update"){
                let modal = $(this);
                modal.find('.modal-title').text('Ubah Data');
                let data = {
                    id          : button.data('id'),
                    nama        : button.data('nama'),
                    keterangan  : button.data('keterangan'),
                    telpon      : button.data('telpon'),
                    identitas   : button.data('identitas'),
                    kota        : button.data('kota'),
                }
                $('#modal-body-data').html(`
                    <form enctype="multipart/form-data" onsubmit="updateBlacklist()" id="updateBlacklist">
                        <div class="row d-flex justify-content-between form-group">
                            <div class="col-12 mb-2">
                                <h6>Kota</h6>
                                <input type="text" class="form-control" placeholder="Surabaya" id="updateKotaBlacklist" value=${data["kota"]}>
                            </div>
                            
                            <div class="col-12 mb-2">
                                <h6>No Identitas</h6>
                                <input type="text" class="form-control" placeholder="357xxxxxxxxxx"id="updateIdentitasBlacklist" value=${data["identitas"]}>
                            </div>
                            
                            <div class="col-12 mb-2">
                                <h6>Nama</h6>
                                <input type="text" class="form-control" placeholder="Rudy" id="updateNamaBlacklist" value=${data["nama"]}>
                            </div>
                            
                            <div class="col-12 mb-2">
                                <h6>Telp</h6>
                                <input type="text" class="form-control" placeholder="081xxxxxxxxx" id="updateTelponBlacklist" value=${data["telpon"]}>
                            </div>
                            
                            <div class="col-12 mb-2">
                                <h6>Keterangan</h6>
                                <input type="text" class="form-control" placeholder="Kabur tidak bayar kos" id="updateKeteranganBlacklist" value=${data["keterangan"]}>
                            </div>

                            <div class="col-12 mb-2">
                                <h6>Bukti</h6>
                                <input type="file" class="form-control" id="updateBuktiBlacklist">
                            </div>
                        </div>
                    </form>
                `);
                $('#modal-action-data').html(`
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="updateBlacklist(${data['id']})">Simpan</button>
                `);
            }
            
            })
	</script>
@stop