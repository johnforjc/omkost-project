@extends('layouts.master')

@section('konten')
	@include('layouts.partial.navbar')
    <section class="gray p-0">
        <div class="container-fluid p-0">
            <div class="row">
                @include('layouts.partial.sidebar')
                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div class="dashboard-body">

                        
                        <!-- Bookmark Property -->
                        <div class="frm_submit_block mb-3">	
                            <h4>My Property</h4>
                        </div>
                            
                        <div class="row">
                            
                            <!-- Single Property -->
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="dashboard_property_list">
                                    <div class="dashboard_property_list_thumb">
                                        <img src="https://via.placeholder.com/1400x720" class="img-fluid" alt="" />
                                        <span class="dashboard_pr_status published">Published</span>
                                    </div>
                                    <div class="dashboard_property_list_content">
                                        <h4>Sargun Aprtment</h4>
                                        <span><i class="ti-location-pin"></i>Liverpool, London</span>
                                    </div>
                                    <div class="dashboard_property_list_footer">
                                        <a href="#" class="text-featured" data-toggle="tooltip" title="Make Featured"><i class="ti-star"></i></a>
                                        <a href="#" data-toggle="tooltip" title="Edit Property"><i class="ti-pencil"></i></a>
                                        <a href="#" data-toggle="tooltip" title="302 Views"><i class="ti-eye"></i></a>
                                        <a href="#" data-toggle="tooltip" title="Delete Property"><i class="ti-close"></i></a>
                                        <a href="#" data-toggle="tooltip" title="Pause"><i class="ti-control-pause"></i></a>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Single Property -->
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="dashboard_property_list">
                                    <div class="dashboard_property_list_thumb">
                                        <img src="https://via.placeholder.com/1400x720" class="img-fluid" alt="" />
                                        <span class="dashboard_pr_status published">Published</span>
                                    </div>
                                    <div class="dashboard_property_list_content">
                                        <h4>Daisy Rose Villa</h4>
                                        <span><i class="ti-location-pin"></i>Montreal, Canada</span>
                                    </div>
                                    <div class="dashboard_property_list_footer">
                                        <a href="#" class="featured" data-toggle="tooltip" title="Featured Property"><i class="ti-star"></i></a>
                                        <a href="#" data-toggle="tooltip" title="Edit Property"><i class="ti-pencil"></i></a>
                                        <a href="#" data-toggle="tooltip" title="302 Views"><i class="ti-eye"></i></a>
                                        <a href="#" data-toggle="tooltip" title="Delete Property"><i class="ti-close"></i></a>
                                        <a href="#" data-toggle="tooltip" title="Running"><i class="ti-control-play"></i></a>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Single Property -->
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="dashboard_property_list">
                                    <div class="dashboard_property_list_thumb">
                                        <img src="https://via.placeholder.com/1400x720" class="img-fluid" alt="" />
                                        <span class="dashboard_pr_status expire">10 days remain</span>
                                    </div>
                                    <div class="dashboard_property_list_content">
                                        <h4>Sangam Aprtment</h4>
                                        <span><i class="ti-location-pin"></i>California, USA</span>
                                    </div>
                                    <div class="dashboard_property_list_footer">
                                        <a href="#" class="text-featured" data-toggle="tooltip" title="Make Featured"><i class="ti-star"></i></a>
                                        <a href="#" data-toggle="tooltip" title="Edit Property"><i class="ti-pencil"></i></a>
                                        <a href="#" data-toggle="tooltip" title="302 Views"><i class="ti-eye"></i></a>
                                        <a href="#" data-toggle="tooltip" title="Delete Property"><i class="ti-close"></i></a>
                                        <a href="#" data-toggle="tooltip" title="Pause"><i class="ti-control-pause"></i></a>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Single Property -->
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="dashboard_property_list">
                                    <div class="dashboard_property_list_thumb">
                                        <img src="https://via.placeholder.com/1400x720" class="img-fluid" alt="" />
                                        <span class="dashboard_pr_status">Paused</span>
                                    </div>
                                    <div class="dashboard_property_list_content">
                                        <h4>Silver City</h4>
                                        <span><i class="ti-location-pin"></i>Liverpool, London</span>
                                    </div>
                                    <div class="dashboard_property_list_footer">
                                        <a href="#" class="upgrade" data-toggle="tooltip" title="Upgrade"><i class="ti-star"></i></a>
                                        <a href="#" data-toggle="tooltip" title="Edit Property"><i class="ti-pencil"></i></a>
                                        <a href="#" data-toggle="tooltip" title="302 Views"><i class="ti-eye"></i></a>
                                        <a href="#" data-toggle="tooltip" title="Delete Property"><i class="ti-close"></i></a>
                                        <a href="#" data-toggle="tooltip" title="Running"><i class="ti-control-play"></i></a>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Single Property -->
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="dashboard_property_list">
                                    <div class="dashboard_property_list_thumb">
                                        <img src="https://via.placeholder.com/1400x720" class="img-fluid" alt="" />
                                        <span class="dashboard_pr_status published">Published</span>
                                    </div>
                                    <div class="dashboard_property_list_content">
                                        <h4>Haro Om House</h4>
                                        <span><i class="ti-location-pin"></i>Housten, USA</span>
                                    </div>
                                    <div class="dashboard_property_list_footer">
                                        <a href="#" class="text-featured" data-toggle="tooltip" title="Make Featured"><i class="ti-star"></i></a>
                                        <a href="#" data-toggle="tooltip" title="Edit Property"><i class="ti-pencil"></i></a>
                                        <a href="#" data-toggle="tooltip" title="302 Views"><i class="ti-eye"></i></a>
                                        <a href="#" data-toggle="tooltip" title="Delete Property"><i class="ti-close"></i></a>
                                        <a href="#" data-toggle="tooltip" title="Pause"><i class="ti-control-pause"></i></a>
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
        $("#sbiklan").addClass("active");
	</script>
@stop