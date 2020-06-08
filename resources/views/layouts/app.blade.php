<!DOCTYPE HTML>
<html>
<head>
<title>{{Route::currentRouteName()}} | {!! env('APP_NAME','Rent and Beyond') !!}</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="{{url('theme-front/css/bootstrap.min.css')}}" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="{{url('theme-front/css/style.css')}}" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="{{url('theme-front/css/font-awesome.css')}}" rel="stylesheet">
<link href="{{url('fontawesome/css/all.css') }}" rel="stylesheet" >
<link rel="stylesheet" href="{{url('css/app.css')}}">
<link rel="stylesheet" href="{{url('css/user-profile.css')}}">
<link rel="stylesheet" href="{{url('css/reg-form.css')}}">
<link rel="stylesheet" href="{{url('css/pos-design.css')}}">
<link rel="stylesheet" href="{{url('css/search.css')}}">
<link rel="stylesheet" href="{{url('css/jquery-ui.min.css')}}">
<link rel="icon" href="{{url('images/icons/favicon.ico')}}" type="image/gif" sizes="16x16">

@if(Route::is('payments.create'))
<link rel="stylesheet" href="{{url('css/payment-design.css')}}">
@endif
@if(Route::is('invoice*') || Route::is('quotation*') || Route::is('report*'))
<link rel="stylesheet" href="{{url('css/invoice-template.css')}}">
@endif
@if(Route::is('purchases.create'))
<link rel="stylesheet" href="{{url('css/image-carousel.css')}}">
@endif
@if(Route::is('business-card*'))
<link rel="stylesheet" href="{{url('css/business-card-1.css')}}">
@endif
@if(Route::is('post.create') || Route::is('post.edit'))
 <script src="https://cdn.tiny.cloud/1/w7ne5sgwzfvt23wsw5gamqfb9k0zu7m4no0kuxmo7xws3c0s/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
@endif
<!-- jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="{{url('theme-front/css/icon-font.min.css')}}" type='text/css' />
<!-- //lined-icons -->
<!-- chart -->
<script src="{{url('theme-front/js/Chart.js')}}"></script>
<!-- //chart -->
<!--animate-->
<link href="{{url('theme-front/css/animate.css')}}" rel="stylesheet" type="text/css" media="all">
<script src="{{url('theme-front/js/wow.min.js')}}"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!--webfonts--->
<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<!---//webfonts--->
 <!-- Meters graphs -->
<script src="{{url('theme-front/js/jquery-1.10.2.min.js')}}"></script>
<!-- Placed js at the end of the document so the pages load faster -->

</head>

@yield('content')
<!--footer section start-->
<footer>
 <p>&copy {{date('Y')}} {!! env('APP_NAME','Ledamcha') !!}. All Rights Reserved </p>
</footer>
<!--footer section end-->

<!-- main content end-->
</section>

<script src="{{url('theme-front/js/jquery.nicescroll.js')}}"></script>
<script src="{{url('theme-front/js/scripts.js')}}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{url('theme-front/js/bootstrap.min.js')}}"></script>
<!--app JS-->
<script src="{{url('js/app.js')}}"></script>
<script src="{{url('js/qty-field.js')}}"></script>
<script src="{{url('js/image-upload.js')}}"></script>
<script src="{{url('js/validator.js')}}"></script>
<script src="{{url('js/edit-doc.js')}}"></script>
<script src="{{url('js/search.js')}}"></script>
<script src="{{url('js/jquery-ui.min.js')}}"></script>

@if(Route::is('purchases.create'))
<script src="{{url('js/image-carousel.js')}}"></script>
<script src="{{url('js/add-prod.js')}}"></script>
@endif
@if(Route::is('sales.create'))
<script src="{{url('js/add-prod-to-register.js')}}"></script>
@endif
@if(Route::is('invoices.*'))
<script src="{{url('js/edit-invoice.js')}}"></script>
@endif
@if(Route::is('report.*'))
<script src="{{url('js/edit-ireport.js')}}"></script>
@endif
@if(Route::is('post.*'))
<script src="{{url('js/blog.js')}}"></script>
@endif
</body>
</html>
