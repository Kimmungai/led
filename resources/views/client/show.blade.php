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
        @Component('components.structure.page-title',['title'=>'Edit client'])@endcomponent

        <div class="row">
          <div class="col-xs-12">
            @Component('components.form-inputs.link',['title'=>'New client','href'=>route('client.create'),'toolTip'=>'Create a new client','icon'=>'fas fa-user','classes'=>'btn btn-default btn-xs pull-right mr-1'])@endcomponent
          </div>
        </div>

        @Component('components.structure.breadcrump',['home'=>route('home'),'specifiedLinked'=>route('client.index'),'specifiedText'=>'All clients','specified'=>$client->firstName.' '.$client->lastName])
        @endcomponent

        <div class="row">
          <form id="edit-user-form" action="{{route('client.update',$client->id)}}" method="post" onsubmit="confirm_modal('userEditConfirmModal')">
            @csrf
            @method('PUT')
          <div class="col-md-8">
            <?php //if($client->id == 1){} ?>
            <?php $genderTypes=[
              'male' => ['name'=>'Male','value'=>1],
              'female' => ['name'=>'Female','value'=>2],
            ]; ?>
            @Component('components.form-inputs.input',['title' => 'Username','name'=>'username','type'=>'text','icon'=>'fas fa-user','placeholder' => 'Enter username','required'=>true,'value' =>$client->username])@endcomponent
            @Component('components.form-inputs.input',['title' => 'First Name','name'=>'firstName','type'=>'text','icon'=>'fas fa-user','placeholder' => 'Enter first name','required'=>true,'value' =>$client->firstName])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Middle Name','name'=>'middleName','type'=>'text','icon'=>'fas fa-user','placeholder' => 'Enter middle name','required'=>false,'value' =>$client->middleName])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Last Name','name'=>'lastName','type'=>'text','icon'=>'fas fa-user','placeholder' => 'Enter last name','required'=>true,'value' =>$client->lastName])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Email','name'=>'email','type'=>'email','icon'=>'fas fa-envelope','placeholder' => 'Enter email','required'=>true,'value' =>$client->email])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Phone','name'=>'phone','type'=>'number','icon'=>'fas fa-phone','placeholder' => 'Enter phone number','required'=>true,'value' =>$client->phone])@endcomponent
            @Component('components.form-inputs.textarea',['title' => 'Address','name'=>'address','icon'=>'fas fa-map-marker-alt','placeholder' => 'Enter address','rows'=>3,'cols'=>'','required'=>false,'value' =>$client->address])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Password','name'=>'password','type'=>'text','icon'=>'fas fa-key','placeholder' => 'Enter new password','required'=>false])@endcomponent
            @Component('components.form-inputs.submit',['value' => 'Update','icon'=>'fas fa-save','classes'=>'btn btn-success btn-block btn-lg pay-btn','toolTip'=>'Update user'])@endcomponent
            @Component('components.form-inputs.button',['value' => 'Delete','icon'=>'fas fa-warning','classes'=>'btn btn-block btn-danger mt-2','type'=>'button','toolTip'=>'Delete user','click'=>'confirm_modal("deleteUserConfirmModal")'])@endcomponent

          </div>

          <div class="col-md-4">
            <div class="avatar-preview">
              <div class="profile-img-loading-preview hidden"><img class="loader" src="/placeholders/img-loader-green.gif"></div>
              <img id="user-avatar" class="" src="@if( old('avatar') ) {{url(old('avatar'))}}  @else /placeholders/avatar-male.png @endif" alt="" >
              <input id="user-avatar-url" type="hidden" name="" value="@if( old('avatar') ) {{old('avatar')}}  @else /placeholders/avatar-male.png @endif">
            </div>
            @Component('components.form-inputs.select',['title' => 'Gender','name'=>'gender','icon'=>'fas fa-user-tag','options'=>$genderTypes,'required'=>false,'selected' => $client->gender])@endcomponent
            @Component('components.form-inputs.input',['title' => 'DOB','name'=>'dob','type'=>'text','icon'=>'fas fa-calendar','placeholder' => 'dd/mm/yyyy','required'=>false,'value' =>date('d M Y',strtotime($client->dob))])@endcomponent
            @Component('components.form-inputs.input',['title' => 'ID no','name'=>'idNo','type'=>'text','icon'=>'fas fa-address-card','placeholder' => 'National ID','required'=>false,'value' =>$client->idNo])@endcomponent
            @Component('components.form-inputs.input',['title' => 'County','name'=>'county','type'=>'text','icon'=>'fas fa-map-marker','placeholder' => 'County','required'=>false,'value' =>$client->county])@endcomponent

            @Component('components.form-inputs.submit',['value' => 'Update','icon'=>'fas fa-save','classes'=>'btn btn-success btn-sm pay-btn','toolTip'=>'Update user'])@endcomponent

          </div>
        </form>
        <!--hidden forms-->
        <form id="user-avatar-form" action="/img-tmp" enctype="multipart/form-data">
          <input class="hidden d-none"  type="file" name="image" id="user-avtar-file" onchange="upload_image(this.value,this.id,'user-avatar',{required:0,min:0,max:255,type:'image',size:1},'user-avatar-url','staff')">
        </form>

        <form class="d-none hidden" id="delete-user-form" action="{{route('client.destroy',$client->id)}}" method="post">
          @csrf
          @method('DELETE')
        </form>

        </div>
        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
    <!--modals-->
    @Component('components.modals.confirm',['title'=>'Update client','question'=>'Are you sure you want to update '.$client->firstName.' '.$client->lastName.'\'s details?','modalID'=>'userEditConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm save','formID'=>'edit-user-form'])@endcomponent
    @Component('components.modals.confirm',['title'=>'Delete client','question'=>'Are you sure you want to delete '.$client->firstName.' '.$client->lastName.'?','modalID'=>'deleteUserConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm delete','formID'=>'delete-user-form'])@endcomponent

@endsection
