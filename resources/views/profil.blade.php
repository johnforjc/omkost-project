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
                                <h3 class="mb-2">Profil Saya</h3>
                                <div class="frm_submit_wrap pl-4">

                                    <div class="row">
                                        <div class="col-md-4"><h5>Nama</h5></div>
                                        <div class="col-md-8">{{ $user["name"] }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4"><h5>Telpon</h5></div>
                                        <div class="col-md-8">{{ $user["telp"] }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4"><h5>Email</h5></div>
                                        <div class="col-md-8">{{ $user["email"] }}</div>
                                    </div>

                                </div>
                            </div>
                            
                            <div class="frm_submit_block">	
                                <h4>Ubah Password</h4>
                                <div class="frm_submit_wrap">
                                    <div class="form-group">

                                        <div class="row mb-3">
                                            <div class="col-md-6 mb-2">
                                                <label>Password Lama</label>
                                                <input type="password" class="form-control" value="">
                                            </div>
                                            
                                            <div class="col-md-6 mb-2">
                                                <label>Password Baru</label>
                                                <input type="password" class="form-control" value="">
                                            </div>
                                            
                                            <div class="col-md-6 mb-2">
                                                <label>Konfirmasi Password Baru</label>
                                                <input type="password" class="form-control" value="">
                                            </div>
                                        </div>

                                        <button class="btn btn-theme bg-2 col" type="submit">Save Changes</button>
                                        
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