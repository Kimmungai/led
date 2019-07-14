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
        @Component('components.structure.page-title',['title'=>'Add a new organisation'])@endcomponent

        @Component('components.structure.breadcrump',['home'=>route('home'),'organisations'=>route('org.index'),'newOrganisation'=>''])
        @endcomponent

        <!--custom page design starts-->
        <div class="row">
          <form class="" action="{{route('org.store')}}" method="post">
            @csrf

          <div class="col-md-8">
            @Component('components.form-inputs.input',['title' => 'Name','name'=>'name','type'=>'text','icon'=>'fas fa-building','placeholder' => 'Enter name','required'=>true])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Email','name'=>'email','type'=>'email','icon'=>'fas fa-envelope','placeholder' => 'Enter email','required'=>false])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Phone','name'=>'phoneNumber','type'=>'number','icon'=>'fas fa-phone','placeholder' => 'Enter phone number','required'=>false])@endcomponent
            @Component('components.form-inputs.textarea',['title' => 'Address','name'=>'address','icon'=>'fas fa-map-marker-alt','placeholder' => 'Enter phone number','rows'=>3,'cols'=>'','required'=>true])@endcomponent
            @Component('components.form-inputs.submit',['value' => 'Save','icon'=>'fas fa-save','classes'=>'btn btn-success btn-block btn-lg pay-btn'])@endcomponent

          </div>

          <div class="col-md-4">
            <div class="avatar-preview">
              <div class="profile-img-loading-preview hidden"><img class="loader" src="/placeholders/img-loader-green.gif"></div>
              <img id="org-img" class="" src="@if( old('image') ) {{old('image')}} @else /placeholders/avatar-male.png @endif" alt="" >
              <input id="org-img-url" type="hidden" name="image" value="{{old('image')}}">
            </div>
            @Component('components.form-inputs.button',['value' => 'add image','type'=>'button','icon'=>'fas fa-upload','classes'=>'btn btn-default btn-sm','click' => 'click_element("org-image",0)' ])@endcomponent
            @Component('components.form-inputs.side-textarea',['title' => 'Remarks','name'=>'remarks','icon'=>'fas fa-info-circle','placeholder' => 'Enter a brief description','rows'=>3,'cols'=>'','required'=>false])@endcomponent
            @Component('components.form-inputs.submit',['value' => 'Save','icon'=>'fas fa-save','classes'=>'btn btn-success btn-sm pay-btn'])@endcomponent
          </div>

        </form>
        <form id="org-image-form" action="/img-tmp" enctype="multipart/form-data">
          <input class="hidden d-none"  type="file" name="image" id="org-image" onchange="upload_image(this.value,this.id,'org-img',{required:0,min:0,max:255,type:'image',size:1},'org-img-url')">
        </form>

        </div>
        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
@endsection
