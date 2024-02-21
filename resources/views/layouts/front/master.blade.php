<!-- resources/views/layouts/master.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
   
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="csrf-token" content="{{ csrf_token() }}">


	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

	
<title>@yield('title', 'APP TITLE')</title>

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="{{ asset('frontend-assets/images/favicon.png') }}">
<!-- <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon/favicon.ico') }}"> -->

    
<!-- Include your common CSS files -->
<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/css/bootstrap.min.css')}}">
	<!-- Owl Carousel CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/css/owl.carousel.min.css')}}">
	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/css/style.css')}}">
	<!-- magnific CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/css/magnific-popup.css')}}">
		
    <!-- Allow child views to include additional CSS -->
    @yield('css')
</head>
<body>
<div class="header-space"></div>

 <!-- Your header content goes here -->
    
<header class="site-header">
		<nav class="navbar navbar-expand-lg navbar-light">
			<div class="container">
				<a class="navbar-brand" href="{{route('project.list')}}">
					<img class="logo-img logo-desktop" src="{{asset('frontend-assets/images/logo.svg')}}" alt="Logo" width="53" height="50">
					<img class="logo-img logo-mobile" src="{{asset('frontend-assets/images/mobile-logo.svg')}}" alt="Logo" width="53" height="50">
				</a>

				@php
				$user = Auth::user();
				@endphp
				<!-- @if(isset($user)) -->
				<div class="notification-wrap ms-auto">
					{{--<div class="notification-icon">
						<img class="notification-icon-desktop" src="{{asset('frontend-assets/images/notification.svg')}}" alt="notification" width="20" height="20">
						<img class="notification-icon-mobile" src="{{asset('frontend-assets/images/notification-icon.svg')}}" alt="notification" width="20" height="20">
					</div>--}}
				</div>
				
				<div class="profile-detail-wrap d-none d-lg-flex align-items-center">
					

					<div class="profile-image">
						@if(isset($user->profile_image) && $user->profile_image == "" && $user->profile_image == null)
							<img id="userProfileImage" src="{{ asset($user->profile_image) }}"  alt="Profile Image" width="47" height="47">
							@else
							<img id="userProfileImage" src="{{asset('frontend-assets/images/defaultimage.jpg')}}"  style="height:47px;" alt="Profile Image">
						@endif

					</div>
					<div class="profile-detail">
						<div class="profile-username">Hello, {{$user->name}}</div>
						<div class="viewprofile-link"><a href="#">View profile</a></div>
					</div>
				</div>
				

				<div class="hamburger-menu">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>

				<div class="navbar-collapse header-right">
					<ul id="desktop" class="navbar-nav mainmenu align-items-start align-items-lg-center">
					@php	
					$contractor = auth()->guard('contractor')->user();
					@endphp

						@if($contractor)
						<li class="nav-item">
							<a class="nav-link" href="{{route('contractor.dashboard')}}">Your project</a>
						</li>

					@elseif(isset($user))
						
						{{--<li class="nav-item">
							<a class="nav-link" href="#">General Information</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Design Studio</a>
						</li>--}}
						<li class="nav-item">
							<a class="nav-link" href="{{route('project.list')}}">Your project</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('contractor.list') }}">Contractor</a>
						</li>
						{{--<li class="nav-item">
							<a class="nav-link" href="#">Construction</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Documentation</a>
						</li>--}}
						@endif
						<li class="nav-item">
							<a class="nav-link" href="#">Reviews</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Give feedback</a>
						</li>
					</ul>
					<div class="mobile-menu-btn-wrap">
						<div class="mobile-menu-btn">
							@if(!isset($user))
							<a class="btn btn-primary" href="{{route('login')}}">Sign In</a>
							@else
							<a class="btn btn-primary" href="{{route('logout')}}">Sign Out</a>
							
							@endif
						</div>
						<div class="mobile-menu-btn">
							<a class="btn btn-outline-secondary" href="#">Need help? (Contact us)</a>							
						</div>
					</div>
				</div>
				<!-- @endif -->
			</div>
		</nav>
	</header>
 <!-- End Your header content  -->
    
    <main>
        @yield('content')
    </main>

    <footer>
        <!-- Your footer content goes here -->
    </footer>

    <!-- Include your common script files -->
    <!-- jQuery JS -->
	<script src="{{asset('frontend-assets/js/jquery-3.7.1.min.js')}}"></script>
	{{-- Validation JS  --}}
	<script src="{{asset('frontend-assets/js/jquery.validate.min.js')}}"></script>
	<!-- Bootstrap JS -->
	<script src="{{asset('frontend-assets/js/bootstrap.bundle.min.js')}}"></script>
	<!-- Owl Carousel JS -->
	<script src="{{asset('frontend-assets/js/owl.carousel.min.js')}}"></script>
	<!-- Custom JS -->
	<script src="{{asset('frontend-assets/js/public.js')}}"></script>
	<!-- Allow child views to include additional scripts -->
	<script src="{{asset('frontend-assets/js/jquery.magnific-popup.min.js')}}"></script>
	
    @yield('scripts')
</body>
</html>
