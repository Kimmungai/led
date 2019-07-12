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

        @Component('components.structure.breadcrump',['home'=>route('home'),'users'=>route('users.index'),'newUser'=>''])
        @endcomponent

        <!--custom page design starts-->
        <div class="row">

          <div class="col-md-8">
            <?php $userTypes=[
              'staff' => ['name'=>'Staff','value'=>env('STAFF',1)],
              'admin' => ['name'=>'Admin','value'=>env('ADMIN',3)],
            ]; ?>

            @Component('components.form-inputs.select',['title' => 'Type','name'=>'type','icon'=>'fas fa-user-tag','options'=>$userTypes,'required'=>false])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Name','name'=>'name','type'=>'text','icon'=>'fas fa-user','placeholder' => 'Enter name','required'=>true])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Email','name'=>'email','type'=>'email','icon'=>'fas fa-envelope','placeholder' => 'Enter email','required'=>true])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Phone','name'=>'phoneNumber','type'=>'number','icon'=>'fas fa-phone','placeholder' => 'Enter phone number','required'=>true])@endcomponent
            @Component('components.form-inputs.textarea',['title' => 'Address','name'=>'address','icon'=>'fas fa-map-marker-alt','placeholder' => 'Enter phone number','rows'=>3,'cols'=>'','required'=>false])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Password','name'=>'password','type'=>'text','icon'=>'fas fa-key','placeholder' => 'Enter user password','required'=>false])@endcomponent
            @Component('components.form-inputs.submit',['value' => 'Save','icon'=>'fas fa-save','classes'=>'btn btn-success btn-block btn-lg pay-btn'])@endcomponent

          </div>

          <div class="col-md-4">
            <div class="avtar-preview">
              <img src="/placeholders/avatar-male.png" alt="">
            </div>
            @Component('components.form-inputs.button',['value' => 'add image','type'=>'button','icon'=>'fas fa-upload','classes'=>'btn btn-success btn-sm'])@endcomponent
            @Component('components.form-inputs.side-textarea',['title' => 'Remarks','name'=>'remarks','icon'=>'fas fa-user-edit','placeholder' => 'Enter any remarks about this user','rows'=>3,'cols'=>''])@endcomponent
            @Component('components.form-inputs.submit',['value' => 'Save','icon'=>'fas fa-save','classes'=>'btn btn-success btn-sm pay-btn'])@endcomponent
          </div>

        </div>
        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
@endsection
