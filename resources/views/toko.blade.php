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
                                            <a class="nav-link active" id="tabcektoko" data-toggle="pill" href="#pills-rent" role="tab" aria-controls="pills-rent" aria-selected="true" onclick="tabcek()">
                                                Cari Toko
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="tabtambahtoko" data-toggle="pill" href="#pills-buy" role="tab" aria-controls="pills-buy" aria-selected="false" onclick="tabtambah()">
                                                Rekomendasikan toko
                                            </a>
                                            
                                        </li>
                                    </ul>
                                </div>
                                </br></br>

                                <div class="align-items-left collapse show" id="cariTukangSection">

                                    <div class="row d-flex justify-content-between form-group">

                                        <div class="col-lg-6  mb-2">
                                            <h6>Jenis toko</h6>
                                            <div class="simple-input">
                                                <select id="cariJenisToko" class="form-control">
                                                    <option value="ac">AC</option>
                                                    <option value="bangunan">Bangunan</option>
                                                    <option value="listrik">Listrik</option>
                                                    <option value="mebel">Mebel/Furniture</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6  mb-2">
                                            <h6>Nama</h6>
                                            <input type="text" class="form-control" placeholder="Sumber Jaya" id="cariNamaToko">
                                        </div>

                                        <div class="col-lg-6  mb-2">
                                            <h6>Kota</h6>
                                            <input type="text" class="form-control" placeholder="Surabaya" id="cariKotaToko">
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

                                    <div id="allToko" class="pagination-box"></div>
                                </div>

                                <div id = "tambahTokoSection" class = "align-items-left collapse">
                                    <div class="row d-flex justify-content-between form-group">
                                        <div class="col-lg-6  mb-2">
                                            <h6>Jenis toko</h6>
                                            <div class="simple-input">
                                                <select id="tambahJenisToko" class="form-control">
                                                    <option value="ac">AC</option>
                                                    <option value="bangunan">Bangunan</option>
                                                    <option value="listrik">Listrik</option>
                                                    <option value="mebel">Mebel/Furniture</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6  mb-2">
                                            <h6>Nama</h6>
                                            <input type="text" class="form-control" placeholder="Sumber Jaya" id="tambahNamaToko">
                                        </div>

                                        <div class="col-lg-6  mb-2">
                                            <h6>Kota</h6>
                                            <input type="text" class="form-control" placeholder="Surabaya" id="tambahKotaToko">
                                        </div>

                                        <div class="col-lg-6  mb-2">
                                            <h6>Telp</h6>
                                            <input type="text" class="form-control" placeholder="081xxxxxxxxx" id="tambahTelponToko">
                                        </div>

                                        <div class="col-lg-6  mb-2">
                                            <h6>Alamat</h6>
                                            <input type="text" class="form-control" placeholder="Jl. Pahlawan No.xx" id="tambahAlamatToko">
                                        </div>

                                        <div class="col-lg-6  mb-2">
                                            <h6>Keterangan</h6>
                                            <input type="text" class="form-control" placeholder="Harga sesuai kualitas" id="tambahKeteranganToko">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <button id="btnsimpan" type="button" class="btn btn-theme full-width bg-2" onclick="setToko()">Simpan</button>
                                    </div>

                                    <h3>Daftar Toko Anda</h3>
                                    <table class="property-table-wrap responsive-table bkmark">
                                        <tbody id="toko">
                                            
                                        </tbody>
                                    </table>

                                    <div id="ownerToko" class="pagination-box"></div>
                                </div>

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
        $("#sbtoko").addClass("active");
        function tabcek()
        {
            $("#cariTukangSection").collapse('show');
            $("#tambahTokoSection").collapse('hide');
            clearinput();
        }
        function tabtambah()
        {
            $("#cariTukangSection").collapse('hide');
            $("#tambahTokoSection").collapse('show');
            getMyToko();
            clearinput();
        }
        function clearinput()
        {
            $('#tambahAlamatToko').val("");
            $('#tambahNamaToko').val("");
            $('#tambahKotaToko').val("");
            $('#tambahTelponToko').val("");
            $('#tambahKeteranganToko').val("");
            $('#cariNamaToko').val("");
            $('#cariKotaToko').val("");
        }

        function deleteToko(id){
            $.ajax({
                type  : 'DELETE',
                url   : "{{ url('/api/deleteToko') }}",
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
                        getMyToko();
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

        function updateToko(id)
		{
            $.ajax({
                type  : 'PUT',
                url   : "{{ url('/api/updateToko') }}",
                dataType : 'json',
                headers: {
                    "Authorization" : "Bearer {{ Cookie::get('api_token') }}"
                },
                data : {
                    id          :id,
                    kota        :$('#updateKota').val(), 
                    nama        :$('#updateNama').val(), 
                    telp        :$('#updateTelpon').val(),
                    alamat      :$('#updateAlamat').val(),
                    keterangan  :$('#updateKeterangan').val()
                },
                success : function(response){
                    //let data = response.data;
                    if(response.status)
                    {
                        alert(response.message);
                        getMyToko();
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

        function setToko()
		{
            $.ajax({
                type  : 'POST',
                url   : "{{ url('/api/setToko') }}",
                dataType : 'json',
                headers: {
                    "Authorization" : "Bearer {{ Cookie::get('api_token') }}"
                },
                data : {
                    jenis       :$('#tambahJenisToko').val(), 
                    kota        :$('#tambahKotaToko').val(), 
                    nama        :$('#tambahNamaToko').val(), 
                    telp        :$('#tambahTelponToko').val(),
                    alamat      :$('#tambahAlamatToko').val(),
                    keterangan  :$('#tambahKeteranganToko').val()
                    //submit_by:"{{ Cookie::get('email') }}",
                },
                success : function(response){
                    //let data = response.data;
                    if(response.status)
                    {
                        alert(response.message);
                        getMyToko();
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

        function getToko(page=1)
		{
            $.ajax({
                type  : 'GET',
                url   : `{{ url('/api/getToko?page=${page}') }}`,
                dataType : 'json',
                headers: {
                    "Authorization" : "Bearer {{ Cookie::get('api_token') }}"
                },
                data : {
                   jenis    :$('#cariJenisToko').val(),
                   nama     :$('#cariNamaToko').val(),
                   kota     :$('#cariKotaToko').val(),
                },
                success : function(response){
                    let data = response.data;
                    if(response.status)
                    {
                        //alert(response.message);
                        let html = '';
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
                                                    <span>${data[i].validate_at ? "Sudah Validasi" : "Belum Tervalidasi"}</span>
                                                </div>
                                            </td>
                                        </tr>`;
                            }
                        }
                        
                        $('#dttoko2').html(html);

                        makePagination(result.current_page, result.last_page, 'getToko', "#allToko");
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

        async function getMyToko(page=1) {
            // Check if input's length more than 5 character, then autosearch is on
            // This make the server not heavy query if the input is very short for auto search

            // Make HTML Element using Javascript for blacklist
            let html2 = "";
            let email = "{{Cookie::get('email')}}";

            console.log(email)
            await $.ajax({
                type: "GET",
                url: `{{ url('/api/getToko?page=${page}') }}`,
                dataType: "json",
                headers: {
                    Authorization: "Bearer {{ Cookie::get('api_token') }}"
                },
                data: {
                    email       : email
                },
                success: function(response) {
                    let result = response.data;
                    if (response.status) {
                        // Make sure the data of blacklist minimal 1
                        let data = result.data;
                        if (data.length !== 0) {
                            for (let i = 0; i < data.length; i++) {
                                html2 += `<tr>
                                            <td class="dashboard_propert_wrapper" class="row">
                                                <img class="col-md-3" src="https://via.placeholder.com/1400x720" alt="">
                                                <div class="title col-md-6">
                                                    <h3 id="spannama">${data[i].nama}</h3>
                                                    <h4><a href="#">${data[i].telp}</a></h4>
                                                    <span>${data[i].alamat},${data[i].kota}</span>
                                                    <span>Keterangan :${data[i].keterangan}</span>
                                                    <span>${data[i].validate_at ? "Sudah Validasi" : "Belum Tervalidasi"}</span>
                                                </div>
                                                <div class="col-md-3">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-mode="update" data-nama="${data[i].nama}"
                                                    data-id="${data[i].id}" data-keterangan="${data[i].keterangan}" data-telpon="${data[i].telp}" data-alamat="${data[i].alamat}" data-kota="${data[i].kota}">
                                                    Update
                                                    </button>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-mode="delete" data-id="${data[i].id}">
                                                    Delete
                                                    </button>
                                                </div>
                                            
                                                
                                            </td>
                                        </tr>`;
                            }
                            makePagination(result.current_page, result.last_page, 'getMyToko', "#ownerToko");
                        } else {
                            // Give a feedback for user if doesnt exist data with input
                            html2 =
                                "<h4>Anda belum memasukkan data toko</h4>";
                        }
                    } else {
                        alert(response.message);
                    }
                },
                error: function(err) {
                    alert("Error, hubungi admin");
                }
            });

            $("#toko").html(html2);
        }

        $('#exampleModal').on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget);
            let mode = button.data('mode');

            if(mode == "delete"){
                let modal = $(this);
                modal.find('.modal-title').text('Konfirmasi Penghapusan Data');
                $('#modal-body-data').html(`
                    <p>Apakah anda yakin menghapus data toko ini?</p>
                `);
                $('#modal-action-data').html(`
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="deleteToko(${button.data('id')})">Hapus</button>
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
                    alamat      : button.data('alamat'),
                    kota        : button.data('kota'),
                }
                $('#modal-body-data').html(`
                    <form enctype="multipart/form-data" id="updateToko">
                        <div class="row d-flex justify-content-between form-group">
                            <div class="col-12 mb-2">
                                <h6>Kota</h6>
                                <input type="text" class="form-control" placeholder="Surabaya" id="updateKota" value=${data["kota"]}>
                            </div>
                            
                            <div class="col-12 mb-2">
                                <h6>Alamat</h6>
                                <input type="text" class="form-control" id="updateAlamat" value=${data["alamat"]}>
                            </div>
                            
                            <div class="col-12 mb-2">
                                <h6>Nama</h6>
                                <input type="text" class="form-control" placeholder="Rudy" id="updateNama" value=${data["nama"]}>
                            </div>
                            
                            <div class="col-12 mb-2">
                                <h6>Telp</h6>
                                <input type="text" class="form-control" placeholder="081xxxxxxxxx" id="updateTelpon" value=${data["telpon"]}>
                            </div>
                            
                            <div class="col-12 mb-2">
                                <h6>Keterangan</h6>
                                <input type="text" class="form-control" placeholder="Kabur tidak bayar kos" id="updateKeterangan" value=${data["keterangan"]}>
                            </div>
                        </div>
                    </form>
                `);
                $('#modal-action-data').html(`
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="updateToko(${data['id']})">Simpan</button>
                `);
            }
            
            })
            
	</script>
@stop