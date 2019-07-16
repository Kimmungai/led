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
        @Component('components.structure.page-title',['title'=>$user->name])@endcomponent

        @Component('components.form-inputs.link',['title'=>'Restore','href'=>route('users.create'),'toolTip'=>'Restore '.$user->name.'','icon'=>'fas fa-trash-restore','classes'=>'btn btn-default btn-xs pull-right','click'=>'confirm_modal("userEditConfirmModal")'])@endcomponent

        @if(Route::is('trash.supplier.show'))
          @Component('components.structure.breadcrump',['home'=>route('home'),'specifiedText'=>'Deleted suppliers','specifiedLinked'=>route('trash.suppliers'),'specified'=>$user->name])@endcomponent
        @else
          @Component('components.structure.breadcrump',['home'=>route('home'),'suppliers'=>route('suppliers.index'),'specified'=>$user->name])@endcomponent
        @endif

        <div class="row">
          <form id="edit-user-form" action="{{route('supplier.restore',$user->id)}}" method="post" onsubmit="confirm_modal('userEditConfirmModal')">
            @csrf
          <div class="col-md-8">
            <?php //if($user->type == 1){} ?>
            <?php $userTypes=[
              'staff' => ['name'=>'Staff','value'=>env('STAFF',1)],
              'admin' => ['name'=>'Admin','value'=>env('ADMIN',3)],
              'supplier' => ['name'=>'Supplier','value'=>env('SUPPLIER',4)],
            ]; ?>
            @Component('components.form-inputs.select',['title' => 'Type','name'=>'type','icon'=>'fas fa-user-tag','options'=>$userTypes,'required'=>false,'selected' => $user->type,'disabled'=>true])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Name','name'=>'name','type'=>'text','icon'=>'fas fa-user','placeholder' => 'Enter name','required'=>true,'value' =>$user->name,'disabled'=>true])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Email','name'=>'email','type'=>'email','icon'=>'fas fa-envelope','placeholder' => 'Enter email','required'=>true,'value' =>$user->email,'disabled'=>true])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Phone','name'=>'phoneNumber','type'=>'number','icon'=>'fas fa-phone','placeholder' => 'Enter phone number','required'=>true,'value' =>$user->phoneNumber,'disabled'=>true])@endcomponent
            @Component('components.form-inputs.textarea',['title' => 'Address','name'=>'address','icon'=>'fas fa-map-marker-alt','placeholder' => 'Enter address','rows'=>3,'cols'=>'','required'=>true,'value' =>$user->address,'disabled'=>true])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Password','name'=>'password','type'=>'text','icon'=>'fas fa-key','placeholder' => 'Enter new password','required'=>false,'disabled'=>true])@endcomponent

            @Component('components.form-inputs.submit',['value' => 'Restore','icon'=>'fas fa-trash-restore','classes'=>'btn btn-success btn-block btn-lg pay-btn','toolTip'=>'Restore user'])@endcomponent
            @Component('components.form-inputs.button',['value' => 'Permanently delete','icon'=>'fas fa-warning','classes'=>'btn btn-block btn-danger mt-2','type'=>'button','toolTip'=>'Delete user','click'=>'confirm_modal("deleteUserConfirmModal")'])@endcomponent

          </div>

          <div class="col-md-4">
            <div class="avatar-preview">
              <div class="profile-img-loading-preview hidden"><img class="loader" src="/placeholders/img-loader-green.gif"></div>
              <img id="user-avatar" class="" src="@if( old('avatar') ) {{url(old('avatar'))}} @elseif( $user->avatar ) {{url($user->avatar)}} @else /placeholders/avatar-male.png @endif" alt="" >
              <input id="user-avatar-url" type="hidden" name="avatar" value="@if( old('avatar') ) {{old('avatar')}} @elseif( $user->avatar ) {{$user->avatar}} @else /placeholders/avatar-male.png @endif">
            </div>
            @Component('components.form-inputs.button',['value' => 'add image','type'=>'button','icon'=>'fas fa-upload','classes'=>'btn btn-default btn-sm','click' => 'click_element("user-avtar-file",0)','disabled'=>true ])@endcomponent
            @Component('components.form-inputs.model-select',['title' => 'Org','name'=>'org_id','icon'=>'fas fa-building','options'=>$orgs,'required'=>false,'noLabel'=>true,'selected' => $user->org_id,'disabled'=>true])@endcomponent
            @Component('components.form-inputs.side-textarea',['title' => 'Remarks','name'=>'remarks','icon'=>'fas fa-info-circle','placeholder' => 'Enter any remarks about this user','rows'=>3,'cols'=>'','required'=>false,'value' =>$user->remarks,'disabled'=>true])@endcomponent

          </div>
        </form>
        <!--hidden forms-->
        <form id="user-avatar-form" action="/img-tmp" enctype="multipart/form-data">
          <input class="hidden d-none"  type="file" name="image" id="user-avtar-file" onchange="upload_image(this.value,this.id,'user-avatar',{required:0,min:0,max:255,type:'image',size:1},'user-avatar-url','staff')">
        </form>

        <form class="d-none hidden" id="delete-user-form" action="{{route('supplier.remove',$user->id)}}" method="post">
          @csrf
          @method('DELETE')
        </form>

        </div>
        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
    <!--modals-->
    @Component('components.modals.confirm',['title'=>'Update user','question'=>'Are you sure you want to restore '.$user->name.'?','modalID'=>'userEditConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm save','formID'=>'edit-user-form'])@endcomponent
    @Component('components.modals.confirm',['title'=>'Restore user','question'=>'Are you sure you want to permanently delete '.$user->name.'?','modalID'=>'deleteUserConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm delete','formID'=>'delete-user-form'])@endcomponent

@endsection
