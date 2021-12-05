<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="author" content="www.frebsite.nl" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	
	<title>Omkost</title>
	 
	@include('layouts.css')
</head>
<body class="goodred-skin">
	<!-- konten -->
	<div id="main-wrapper">
		@yield('konten')
	</div>
	<!-- ============================================================== -->
	<!-- End Wrapper -->
	<!-- ============================================================== -->
	
	@section('script')
        @include('layouts.js')
		@include('layouts.authjs')
	@show
	
</body>
</html>