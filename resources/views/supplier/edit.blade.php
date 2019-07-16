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

        @Component('components.structure.breadcrump',['home'=>route('home'),'suppliers'=>route('suppliers.index'),'specified'=>$user->name])
        @endcomponent

        <div class="row">
          <form id="edit-user-form" action="{{route('users.update',$user->id)}}" method="post" onsubmit="confirm_modal('userEditConfirmModal')">
            @csrf
            @method('PUT')
          <div class="col-md-8">
            <?php $userTypes=[
              'staff' => ['name'=>'Staff','value'=>env('STAFF',1)],
              'admin' => ['name'=>'Admin','value'=>env('ADMIN',3)],
              'supplier' => ['name'=>'Supplier','value'=>env('SUPPLIER',4)],
            ]; ?>
            @Component('components.form-inputs.select',['title' => 'Type','name'=>'type','icon'=>'fas fa-user-tag','options'=>$userTypes,'required'=>false,'selected' => $user->type])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Name','name'=>'name','type'=>'text','icon'=>'fas fa-user','placeholder' => 'Enter name','required'=>true,'value' =>$user->name])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Email','name'=>'email','type'=>'email','icon'=>'fas fa-envelope','placeholder' => 'Enter email','required'=>true,'value' =>$user->email])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Phone','name'=>'phoneNumber','type'=>'number','icon'=>'fas fa-phone','placeholder' => 'Enter phone number','required'=>true,'value' =>$user->phoneNumber])@endcomponent
            @Component('components.form-inputs.textarea',['title' => 'Address','name'=>'address','icon'=>'fas fa-map-marker-alt','placeholder' => 'Enter address','rows'=>3,'cols'=>'','required'=>true,'value' =>$user->address])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Password','name'=>'password','type'=>'text','icon'=>'fas fa-key','placeholder' => 'Enter new password','required'=>false])@endcomponent

            @Component('components.form-inputs.submit',['value' => 'Update','icon'=>'fas fa-save','classes'=>'btn btn-success btn-block btn-lg pay-btn','toolTip'=>'Update user'])@endcomponent
            @Component('components.form-inputs.button',['value' => 'Delete','icon'=>'fas fa-warning','classes'=>'btn btn-block btn-danger mt-2','type'=>'button','toolTip'=>'Delete user','click'=>'confirm_modal("deleteUserConfirmModal")'])@endcomponent

          </div>

          <div class="col-md-4">
            <?php $paymentTypes=[
              'cheque' => ['name'=>'Cheque','value'=>1],
              'mpesa' => ['name'=>'MPESA','value'=>2],
              'bank' => ['name'=>'Bank trasnfer','value'=>3],
            ]; ?>
            <h4>Account</h4>
            <?php $wallet = 0; ?>
            @foreach ($user->UserTransactions as $transaction) <?php $wallet += $transaction->credit;  ?> @endforeach
            @Component('components.form-inputs.input',['title' => 'Name','name'=>'','type'=>'text','icon'=>'fas fa-wallet','placeholder' => 'Enter name','required'=>false,'value' =>'Ksh. '.number_format($wallet,2).'','noLabel'=>true,'disabled'=>true])@endcomponent
            @Component('components.form-inputs.select',['title' => 'Method','name'=>'paymentMethod','icon'=>'fas fa-dollar','options'=>$paymentTypes,'required'=>false])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Amount','name'=>'credit','type'=>'number','icon'=>'fas fa-money-bill','placeholder' => 'Enter amount','required'=>false,'value' =>0,'min'=>0])@endcomponent


            <div class="avatar-preview mt-2">

              <div class="profile-img-loading-preview hidden"><img class="loader" src="/placeholders/img-loader-green.gif"></div>
              <img id="user-avatar" class="" src="@if( old('avatar') ) {{url(old('avatar'))}} @elseif( $user->avatar ) {{url($user->avatar)}} @else /placeholders/avatar-male.png @endif" alt="" >
              <input id="user-avatar-url" type="hidden" name="avatar" value="@if( old('avatar') ) {{old('avatar')}} @elseif( $user->avatar ) {{$user->avatar}} @else /placeholders/avatar-male.png @endif">
            </div>
            @Component('components.form-inputs.button',['value' => 'add image','type'=>'button','icon'=>'fas fa-upload','classes'=>'btn btn-default btn-sm','click' => 'click_element("user-avtar-file",0)' ])@endcomponent
            @Component('components.form-inputs.model-select',['title' => 'Org','name'=>'org_id','icon'=>'fas fa-building','options'=>$orgs,'required'=>false,'noLabel'=>true,'selected' => $user->org_id])@endcomponent
            @Component('components.form-inputs.side-textarea',['title' => 'Remarks','name'=>'remarks','icon'=>'fas fa-info-circle','placeholder' => 'Enter any remarks about this user','rows'=>3,'cols'=>'','required'=>false,'value' =>$user->remarks])@endcomponent
            @Component('components.form-inputs.submit',['value' => 'Update','icon'=>'fas fa-save','classes'=>'btn btn-success btn-sm pay-btn','toolTip'=>'Update user'])@endcomponent

          </div>
        </form>
        <!--hidden forms-->
        <form id="user-avatar-form" action="/img-tmp" enctype="multipart/form-data">
          <input class="hidden d-none"  type="file" name="image" id="user-avtar-file" onchange="upload_image(this.value,this.id,'user-avatar',{required:0,min:0,max:255,type:'image',size:1},'user-avatar-url','staff')">
        </form>

        <form class="d-none hidden" id="delete-user-form" action="{{route('users.destroy',$user->id)}}" method="post">
          @csrf
          @method('DELETE')
        </form>

        </div>
        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
    <!--modals-->
    @Component('components.modals.confirm',['title'=>'Update user','question'=>'Are you sure you want to update user details?','modalID'=>'userEditConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm save','formID'=>'edit-user-form'])@endcomponent
    @Component('components.modals.confirm',['title'=>'Delete user','question'=>'Are you sure you want to delete '.$user->name.'?','modalID'=>'deleteUserConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm delete','formID'=>'delete-user-form'])@endcomponent

@endsection
