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
                            <h3>Notifikasi</h3>

                            <div id="notification" class="ml-4">

                            </div>

                            <div id="notificationPagination" class="pagination-box"></div>
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
                    console.log(result);
                    if (response.status) {
                        // Make sure the data of blacklist minimal 1
                        let data = result.data;
                        if (data.length !== 0) {
                            for (let i = 0; i < data.length; i++) {
                                html2 += `<div class="row mb-2">
                                            <div class="col-12 py-2 ${data[i].validation_status.toLowerCase() == "Diterima".toLowerCase()? "notifikasi-accepted" : "notifikasi-declined"}">
                                                <div class="title col-12">
                                                    <h3 id="spannama">Data ${data[i].jenis_validation} anda telah ${data[i].validation_status}</h3>
                                                </div>
                                                <div class="content col-12">
                                                    Lihat Data
                                                </div>
                                            </div>
                                        </div>`;
                            }

                            makePagination(result.current_page, result.last_page, 'getNotifikasi', "#notificationPagination");
                        } else {
                            // Give a feedback for user if doesnt exist data with input
                            html2 =
                                "<h4>Tidak ada notifikasi untuk anda</h4>";
                        }
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
	</script>
@stop