@extends('layouts.master')

@section('konten')
	@include('layouts.partial.navbar')
    <section class="gray p-0">
        <div class="container-fluid p-0">
            <div class="row">
                @include('layouts.partial.sidebar')
                <div class="col-lg-9 col-md-8 p-0">
                    <div class="dashboard-body">
                        
                        <div class="row">
                
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="dashboard_stats_wrap widget-1">
                                    <div class="dashboard_stats_wrap_content"><h4>607</h4> <span>Iklan Kos Dilihat</span></div>
                                    <div class="dashboard_stats_wrap-icon"><i class="ti-eye"></i></div>
                                </div>	
                            </div>
                            
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="dashboard_stats_wrap widget-2">
                                    <div class="dashboard_stats_wrap_content"><h4>102</h4> <span>Iklan Kos Disimpan</span></div>
                                    <div class="dashboard_stats_wrap-icon"><i class="ti-heart"></i></div>
                                </div>	
                            </div>
                            
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="dashboard_stats_wrap widget-4">
                                    <div class="dashboard_stats_wrap_content"><h4>70</h4> <span>Pencari Kos Menghubungi</span></div>
                                    <div class="dashboard_stats_wrap-icon"><i class="ti-user"></i></div>
                                </div>	
                            </div>

                        </div>
                        <!--  row -->
                        
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="mb-0">Kondisi Kos (Periode 01/04/2021 - 30/04/2021)</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
											
											<!-- Single Package -->
											<div class="col-lg-4 col-md-4 c-l-sm-12">
												<div class="package-box">
													<h4 class="packages-features-title">Kos A</h4>
													<ul class="packages-lists-list">
														<li><a href="#">Kamar Terisi : 30/30</a></li>
                                                        <li><a href="#">Bayar : 30/30</a></li>
														<li><a href="#">Komplain : 10</a></li>
                                                        <li><a href="#">Rencana Keluar : 2/30</a></li>
													</ul>
												</div>
											</div>
											
											<!-- Single Package -->
											<div class="col-lg-4 col-md-4 c-l-sm-12">
												<div class="package-box">
													<h4 class="packages-features-title">Kos B</h4>
													<ul class="packages-lists-list">
														<li><a href="#">Kamar Terisi : 16/20</a></li>
                                                        <li><a href="#">Bayar : 10/20</a></li>
														<li><a href="#">Komplain : 2</a></li>
                                                        <li><a href="#">Rencana Keluar : 1/20</a></li>
													</ul>
												</div>
											</div>
											
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        $("#sbdashboard").addClass("active");
	</script>
@stop