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
                            <h5>Notifikasi</h5>

                            <div id="notification" class="ml-4">

                            </div>

                            <div id="notificationPagination" class="pagination-box"></div>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="reject-container" id="overlay-box">
        <div class="reject-content-box px-5">
            <div id="overlay-content"></div> 

        </div>
    </div>
	@include('layouts.partial.footer')
@endsection		

@section('script')
    @parent

	<script>
        $("#sbnotifikasi").addClass("active");

        getNotifikasi();
            
        async function getNotifikasi(page = 1) {
            // Check if input's length more than 5 character, then autosearch is on
            // This make the server not heavy query if the input is very short for auto search

            // Make HTML Element using Javascript for blacklist
            let html2 = "";
            let email = "{{Cookie::get('email')}}";

            await $.ajax({
                type: "GET",
                url: `{{ url('/api/getNotification?page=${page}') }}`,
                dataType: "json",
                headers: {
                    Authorization: "Bearer {{ Cookie::get('api_token') }}"
                },
                data: {
                    email       : email
                },
                success: function(response) {
                    let result = response.data;
                    // Make sure the data of blacklist minimal 1
                    let data = result.data;
                    if (data.length !== 0) {
                        for (let i = 0; i < data.length; i++) {
                            html2 += `
                                <div class="col ${data[i].validation_status.toLowerCase() == "diterima"? "notifikasi-accepted" : "notifikasi-declined"} py-1 mb-2" onclick="readData('${data[i].jenis_validation}', ${data[i].id_item_rekomendasi})">
                                    <h3>Data ${data[i].jenis_validation} anda ${data[i].validation_status}</h3>
                                    <p>View data...</p>
                                </div>
                            `;
                        }

                        makePagination(result.current_page, result.last_page, 'getNotifikasi', "#notificationPagination");
                    } else {
                        alert(response.message);
                    }
                },
                error: function(err) {
                    alert("Error, hubungi admin");
                }
            });

            $("#notification").html(html2);
        }

        function readData(jenis, id){
            let url, html;
            jenis = jenis.toLowerCase()
            if(jenis == "blacklist") url = `{{ url('/api/readBlacklist') }}`;
            else if(jenis == "tukang") url = `{{ url('/api/readTukang') }}`;
            else if(jenis == "toko") url = `{{ url('/api/readToko') }}`;

            $.ajax({
                type: "GET",
                url: url,
                dataType: "json",
                headers: {
                    Authorization: "Bearer {{ Cookie::get('api_token') }}"
                },
                data: {
                    id       : id
                },
                success: function(response) {
                    let data = response.data;

                    $("#overlay-box").toggleClass("active");

                    if(jenis == "blacklist"){
                        html = `
                            <div class="row mb-3">
                                <h6>Data ${jenis}</h6>
                            </div>
                            <div class="simple-input mb-3 row">
                                <div class="col-md-6">
                                    <h5>Nama</h5>
                                    <p>${data.nama}</p>
                                </div>
                                <div class="col-md-6">
                                    <h5>Identitas</h5>
                                    <p>${data.identitas}</p>
                                </div>
                                <div class="col-md-6">
                                    <h5>Kota</h5>
                                    <p>${data.kota}</p>
                                </div>
                                <div class="col-md-6">
                                    <h5>Telpon</h5>
                                    <p>${data.telp}</p>
                                </div>
                                <div class="col-md-6">
                                    <h5>Keterangan</h5>
                                    <p>${data.keterangan}</p>
                                </div>
                            </div>

                            <div class="row d-flex align-content-center justify-content-end">
                                <div class="col-sm-3 btn-danger p-2 mr-2 text-center" onclick="closeBox()">
                                    Tutup
                                </div>

                                <div class="col-sm-3 bg-blue button-primary p-2 text-center" style="color:white"onclick="tolakToko(${id})">
                                    Update
                                </div>
                            </div>
                        `;
                    } else if(jenis == "tukang") {
                        html = `
                            <div class="row mb-3">
                                <h6>Data ${jenis}</h6>
                            </div>
                            <div class="simple-input mb-3 row">
                                <div class="col-md-6">
                                    <h5>Nama</h5>
                                    <p>${data.nama}</p>
                                </div>
                                <div class="col-md-6">
                                    <h5>Jenis</h5>
                                    <p>${data.jenis}</p>
                                </div>
                                <div class="col-md-6">
                                    <h5>Kota</h5>
                                    <p>${data.kota}</p>
                                </div>
                                <div class="col-md-6">
                                    <h5>Telpon</h5>
                                    <p>${data.telp}</p>
                                </div>
                                <div class="col-md-6">
                                    <h5>Keterangan</h5>
                                    <p>${data.keterangan}</p>
                                </div>
                            </div>

                            <div class="row d-flex align-content-center justify-content-end">
                                <div class="col-sm-3 btn-danger p-2 mr-2 text-center" onclick="closeBox()">
                                    Tutup
                                </div>

                                <div class="col-sm-3 bg-blue button-primary p-2 text-center" style="color:white"onclick="tolakToko(${id})">
                                    Update
                                </div>
                            </div>
                        `;
                    } else if(jenis == "toko"){
                        html = `
                            <div class="row mb-3">
                                <h6>Data ${jenis}</h6>
                            </div>
                            <div class="simple-input mb-3 row">
                                <div class="col-md-6">
                                    <h5>Nama</h5>
                                    <p>${data.nama}</p>
                                </div>
                                <div class="col-md-6">
                                    <h5>Jenis</h5>
                                    <p>${data.jenis}</p>
                                </div>
                                <div class="col-md-6">
                                    <h5>Kota</h5>
                                    <p>${data.kota}</p>
                                </div>
                                <div class="col-md-6">
                                    <h5>Kota</h5>
                                    <p>${data.alamat}</p>
                                </div>
                                <div class="col-md-6">
                                    <h5>Telpon</h5>
                                    <p>${data.telp}</p>
                                </div>
                                <div class="col-md-6">
                                    <h5>Keterangan</h5>
                                    <p>${data.keterangan}</p>
                                </div>
                            </div>

                            <div class="row d-flex align-content-center justify-content-end">
                                <div class="col-sm-3 btn-danger p-2 mr-2 text-center" onclick="closeBox()">
                                    Tutup
                                </div>

                                <div class="col-sm-3 bg-blue button-primary p-2 text-center" style="color:white"onclick="tolakToko(${id})">
                                    Update
                                </div>
                            </div>
                        `;
                    }

                    

                    $("#overlay-content").html(html);
                },
                error: function(err) {
                    alert("Error, hubungi admin");
                }
            });
       }

       function closeBox(event){
            if($("#overlay-box").hasClass("active")){
                $("#overlay-box").toggleClass("active");
            }
        }
	</script>
@stop