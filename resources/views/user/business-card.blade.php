@extends('layouts.app')

@section('content')
 <body class="sticky-header left-side-collapsed">
    <section>

    <!-- left side start-->
    @Component('components.structure.side-menu')
    @endcomponent
    <!-- left side end-->

		<!-- main content start-->
		<div class="main-content">

			<!-- header-starts -->
      @Component('components.structure.header-menu')
      @endcomponent
		 <!-- //header-ends -->

     <!--body wrapper start-->
			<div id="page-wrapper">
        @Component('components.structure.page-title',['title'=>'Business cards'])@endcomponent

        @Component('components.structure.breadcrump',['home'=>route('home'),'specified'=>'Business cards'])
        @endcomponent

        <!--custom page design starts-->
        <div class="row">

          <div class="col-md-12">
            <div class="products-selection-section">

              <!--Business card one-->
              <div class="biz-card-1">

                <div class="row">
                  <div class="col-xs-8">
                    <h1><strong>{{$user->name}}</strong></h1>
                    @if( $user->type == 1 )
                    <h2>Ledamcha Staff</h2>
                    @elseif( $user->type == 2 )
                    <h2>Customer</h2>
                    @elseif( $user->type == 3 )
                    <h2>Managing director</h2>
                    @elseif( $user->type == 4 )
                    <h2>Ledamcha Supplier</h2>
                    @endif
                    <div class="underline"></div>
                  </div>

                  <div class="col-xs-4">
                    <div class="qr">
                      <img src="{{url('placeholders/qr.png')}}" alt="">
                    </div>
                  </div>
                </div>

                <div class="row">

                  <div class="col-xs-8 details">
                  <p><span class="fas fa-map-marker-alt"></span> {{$user->address}}</p>
                  <p><span class="fas fa-phone"></span> {{$user->phoneNumber}}</p>
                  <p><span class="fas fa-envelope"></span> {{$user->email}}</p>
                  </div>

                </div>

                <div class="row">
                  <div class="col-xs-12 brand">
                    <h2><span>Ledamcha</span> Multsupliers</h2>
                  </div>
                </div>


              </div>
              <!--end Business card one-->


            </div>


        </div>
        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
@endsection
