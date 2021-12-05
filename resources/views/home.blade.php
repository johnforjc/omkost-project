@extends('layouts.master')

@section('konten')
	@include('layouts.partial.navbar')
	<!--include('layouts.partial.htopbanner')-->
	@include('layouts.partial.hpointexplain')
	@include('layouts.partial.hslidebanner')
	@include('layouts.partial.hgridproperties1')
	<!--include('layouts.partial.hgridproperties2')-->
	@include('layouts.partial.hgridplace')
	<!--include('layouts.partial.hminigridproperties')-->
	<!--include('layouts.partial.hrecentproperties')-->
	@include('layouts.partial.harticle')
	@include('layouts.partial.footer')
	
@endsection		

@section('script')
    @parent

	
@stop