<!DOCTYPE HTML>
<html>
<head>
<title>{{Route::currentRouteName()}} | {{env('APP_NAME','ledamcha')}}</title>
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
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link rel="stylesheet" href="{{url('css/app.css')}}">
<link rel="stylesheet" href="{{url('css/user-profile.css')}}">
<link rel="stylesheet" href="{{url('css/reg-form.css')}}">
<link rel="stylesheet" href="{{url('css/pos-design.css')}}">
<link rel="stylesheet" href="{{url('css/search.css')}}">
<link rel="stylesheet" href="{{url('css/jquery-ui.min.css')}}">

@if(Route::is('payments.create'))
<link rel="stylesheet" href="{{url('css/payment-design.css')}}">
@endif
@if(Route::is('invoice*') || Route::is('quotation*') || Route::is('report*'))
<link rel="stylesheet" href="{{url('css/invoice-template.css')}}">
@endif
@if(Route::is('purchases.create'))
<link rel="stylesheet" href="{{url('css/image-carousel.css')}}">
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
 <p>&copy {{date('Y')}} {{env('APP_NAME','Ledamcha')}}. All Rights Reserved </p>
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
</body>
</html>
