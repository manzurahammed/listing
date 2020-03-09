<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>Listing</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700" rel="stylesheet">
		<link href="{{ asset('css/vendors.bundle.css') }}" rel="stylesheet">
		<link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet">
		<link href="{{ asset('css/custom.css') }}" rel="stylesheet">
	</head>
	<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
		
		<div class="m-grid m-grid--hor m-grid--root m-page">
			@include('layouts.header')
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
				<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
					<i class="la la-close"></i>
				</button>
				@include('layouts.nav')
				
				<div class="m-grid__item m-grid__item--fluid m-wrapper">
					<!-- BEGIN: Subheader -->
					<div class="m-subheader ">
						<div class="d-flex align-items-center">
							<div class="mr-auto">
								<h3 class="m-subheader__title m-subheader__title--separator">
									{{title_case(substr(strrchr(url()->current(),"/"),1))}}
								</h3>
								@if (Session::has('status'))
									@php ($status = Session::get('status'))
									@component('components.alert')
										@slot('type')
										{{$status['type']}}
										@endslot
										@slot('title')
										{{$status['title']}}
										@endslot
									@endcomponent
								@endif
								@if ($errors->any())
									@component('components.errors')
										
									@endcomponent
								@endif
								
							</div>
						</div>
					</div>
					<!-- END: Subheader -->
					@yield('content')
				</div>
			</div>
			@include('layouts.footer')
		</div>
			<!-- end:: Page -->
		<div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
			<i class="la la-arrow-up"></i>
		</div>

		<script src="{{ asset('js/vendors.bundle.js') }}"></script>
		<script src="{{ asset('js/scripts.bundle.js') }}"></script>
		<script src="{{ asset('js/custom.js') }}"></script>
	</body>
</html>