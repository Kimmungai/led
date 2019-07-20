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
        @Component('components.structure.page-title',['title'=>'Create user'])@endcomponent

        @Component('components.structure.breadcrump',['home'=>route('home'),'newUser'=>''])
        @endcomponent

        <!--custom page design starts-->

        <div class="row">
          <form id="new-user-form" action="{{route('users.store')}}" method="post" onsubmit="confirm_modal('newUserConfirmModal')">
            @csrf

          <div class="col-md-8">
            <?php $selected = 1; ?>
            <?php if(isset($_GET['type'])){$selected = $_GET['type'];} ?>
            <?php $userTypes=[
              'staff' => ['name'=>'Staff','value'=>env('STAFF',1),'selected'=>$selected],
              'admin' => ['name'=>'Admin','value'=>env('ADMIN',3),'selected'=>$selected],
            ]; ?>
            @Component('components.form-inputs.select',['title' => 'Type','name'=>'type','icon'=>'fas fa-user-tag','options'=>$userTypes,'required'=>false])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Name','name'=>'name','type'=>'text','icon'=>'fas fa-user','placeholder' => 'Enter name','required'=>true])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Email','name'=>'email','type'=>'email','icon'=>'fas fa-envelope','placeholder' => 'Enter email','required'=>true])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Phone','name'=>'phoneNumber','type'=>'number','icon'=>'fas fa-phone','placeholder' => 'Enter phone number','required'=>true])@endcomponent
            @Component('components.form-inputs.textarea',['title' => 'Address','name'=>'address','icon'=>'fas fa-map-marker-alt','placeholder' => 'Enter address','rows'=>3,'cols'=>'','required'=>true])@endcomponent
            @Component('components.form-inputs.submit',['value' => 'Save','icon'=>'fas fa-save','classes'=>'btn btn-success btn-block btn-lg pay-btn'])@endcomponent

          </div>

          <div class="col-md-4">
            <div class="avatar-preview">
              <div class="profile-img-loading-preview hidden"><img class="loader" src="/placeholders/img-loader-green.gif"></div>
              <img id="user-avatar" class="" src="@if( old('avatar') ) {{url(old('avatar'))}} @else /placeholders/avatar-male.png @endif" alt="" >
              <input id="user-avatar-url" type="hidden" name="avatar" value="{{old('avatar')}}">
            </div>
            @Component('components.form-inputs.button',['value' => 'add image','type'=>'button','icon'=>'fas fa-upload','classes'=>'btn btn-default btn-sm','click' => 'click_element("user-avtar-file",0)' ])@endcomponent
            @Component('components.form-inputs.model-select',['title' => 'Org','name'=>'org_id','icon'=>'fas fa-building','options'=>$orgs,'required'=>false,'noLabel'=>true])@endcomponent
            @Component('components.form-inputs.side-textarea',['title' => 'Remarks','name'=>'remarks','icon'=>'fas fa-info-circle','placeholder' => 'Enter any remarks about this user','rows'=>3,'cols'=>'','required'=>false])@endcomponent
            @Component('components.form-inputs.submit',['value' => 'Save','icon'=>'fas fa-save','classes'=>'btn btn-success btn-sm pay-btn'])@endcomponent
          </div>
        </form>
        <form id="user-avatar-form" action="/img-tmp" enctype="multipart/form-data">
          <input class="hidden d-none"  type="file" name="image" id="user-avtar-file" onchange="upload_image(this.value,this.id,'user-avatar',{required:0,min:0,max:255,type:'image',size:1},'user-avatar-url','staff')">
        </form>
        </div>
        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
    <!--modals-->
    @Component('components.modals.confirm',['title'=>'Save new user','question'=>'Are you sure you want to save user?','modalID'=>'newUserConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm save','formID'=>'new-user-form'])@endcomponent

@endsection
