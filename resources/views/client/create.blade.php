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
        @Component('components.structure.page-title',['title'=>'Create client'])@endcomponent

        @Component('components.structure.breadcrump',['home'=>route('home'),'specifiedLinked'=>route('agent.index'),'specifiedText'=>'All clients','specified'=>'New client'])
        @endcomponent

        <!--custom page design starts-->

        <div class="row">
          <form id="new-user-form" action="{{route('client.store')}}" method="post" onsubmit="confirm_modal('newUserConfirmModal')">
            @csrf

          <div class="col-md-8">
            <?php $selected = 1; ?>
            <?php if(isset($_GET['type'])){$selected = $_GET['type'];} ?>
            <?php $genderTypes=[
              'male' => ['name'=>'Male','value'=>1],
              'female' => ['name'=>'Female','value'=>2],
            ]; ?>
            @Component('components.form-inputs.input',['title' => 'Username','name'=>'username','type'=>'text','icon'=>'fas fa-user','placeholder' => 'Enter username','required'=>true])@endcomponent
            @Component('components.form-inputs.input',['title' => 'First Name','name'=>'firstName','type'=>'text','icon'=>'fas fa-user','placeholder' => 'Enter first name','required'=>true])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Middle Name','name'=>'middleName','type'=>'text','icon'=>'fas fa-user','placeholder' => 'Enter middle name','required'=>false])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Last Name','name'=>'lastName','type'=>'text','icon'=>'fas fa-user','placeholder' => 'Enter last name','required'=>true])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Email','name'=>'email','type'=>'email','icon'=>'fas fa-envelope','placeholder' => 'Enter email','required'=>true])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Phone','name'=>'phone','type'=>'number','icon'=>'fas fa-phone','placeholder' => 'Enter phone number','required'=>true])@endcomponent
            @Component('components.form-inputs.textarea',['title' => 'Address','name'=>'address','icon'=>'fas fa-map-marker-alt','placeholder' => 'Enter address','rows'=>3,'cols'=>'','required'=>false])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Password','name'=>'password','type'=>'text','icon'=>'fas fa-key','placeholder' => 'Enter new password','required'=>true])@endcomponent
            @Component('components.form-inputs.submit',['value' => 'Save','icon'=>'fas fa-save','classes'=>'btn btn-success btn-block btn-lg pay-btn'])@endcomponent

          </div>

          <div class="col-md-4">
            <div class="avatar-preview">
              <div class="profile-img-loading-preview hidden"><img class="loader" src="/placeholders/img-loader-green.gif"></div>
              <img id="user-avatar" class="" src="@if( old('avatar') ) {{url(old('avatar'))}}  @else /placeholders/avatar-male.png @endif" alt="" >
              <input id="user-avatar-url" type="hidden" name="" value="@if( old('avatar') ) {{old('avatar')}}  @else /placeholders/avatar-male.png @endif">
            </div>
            @Component('components.form-inputs.select',['title' => 'Gender','name'=>'gender','icon'=>'fas fa-user-tag','options'=>$genderTypes,'required'=>false])@endcomponent
            @Component('components.form-inputs.input',['title' => 'DOB','name'=>'dob','type'=>'text','icon'=>'fas fa-calendar','placeholder' => 'dd/mm/yyyy','required'=>false])@endcomponent
            @Component('components.form-inputs.input',['title' => 'ID no','name'=>'idNo','type'=>'text','icon'=>'fas fa-address-card','placeholder' => 'National ID','required'=>false])@endcomponent
            @Component('components.form-inputs.input',['title' => 'County','name'=>'county','type'=>'text','icon'=>'fas fa-map-marker','placeholder' => 'County','required'=>false])@endcomponent

            @Component('components.form-inputs.submit',['value' => 'Save','icon'=>'fas fa-save','classes'=>'btn btn-success btn-sm pay-btn','toolTip'=>'Create agent'])@endcomponent

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
    @Component('components.modals.confirm',['title'=>'Save new user','question'=>'Are you sure you want to save client?','modalID'=>'newUserConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm save','formID'=>'new-user-form'])@endcomponent

@endsection
