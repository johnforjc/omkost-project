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
                        
                            <!-- Basic Information -->
                            <div class="frm_submit_block">	
                                <h4>Profil Saya</h4>
                                <div class="frm_submit_wrap">
                                    <div class="form-row">
                                    
                                        <div class="form-group col-md-6">
                                            <label>Nama</label>
                                            <input type="text" class="form-control" value="Rudy">
                                        </div>
                                        
                                        <div class="form-group col-md-6">
                                            <label>Email</label>
                                            <input type="email" class="form-control" value="tatak.rudy@gmail.com">
                                        </div>
                                        
                                        <div class="form-group col-md-6">
                                            <label>Telpon</label>
                                            <input type="text" class="form-control" value="087852992277">
                                        </div>
                                        
                                        <div class="form-group col-md-6">
                                            <label>Status</label>
                                            <input type="text" class="form-control" value="AKTIF">
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="frm_submit_block">	
                                <h4>Ubah Password</h4>
                                <div class="frm_submit_wrap">
                                    <div class="form-group col-md-6">
                                        <label>Password Lama</label>
                                        <input type="password" class="form-control" value="">
                                    </div>
                                    <div class="form-row">
                                    
                                        
                                        
                                        <div class="form-group col-md-6">
                                            <label>Password Baru</label>
                                            <input type="password" class="form-control" value="">
                                        </div>
                                        
                                        <div class="form-group col-md-6">
                                            <label>Konfirmasi Password Baru</label>
                                            <input type="password" class="form-control" value="">
                                        </div>
                                        
                                        <div class="form-group col-lg-12 col-md-12">
                                            <button class="btn btn-theme bg-2" type="submit">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
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
        $("#sbprofil").addClass("active");
	</script>
@stop