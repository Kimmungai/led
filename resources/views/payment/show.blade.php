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
        @Component('components.structure.page-title',['title'=>'Edit sale'])@endcomponent

        <div class="row">
          <div class="col-xs-12">
            @Component('components.form-inputs.link',['title'=>'New sale','href'=>route('payment.create'),'toolTip'=>'Create a new sale','icon'=>'fas fa-money-bill','classes'=>'btn btn-default btn-xs pull-right mr-1'])@endcomponent
          </div>
        </div>

        @Component('components.structure.breadcrump',['home'=>route('home'),'specifiedLinked'=>route('payment.index'),'specifiedText'=>'All payments','specified'=>'Sale-'.$payment->id])
        @endcomponent

        <div class="row">
          <form id="edit-user-form" action="{{route('payment.update',$payment->id)}}" method="post" onsubmit="confirm_modal('userEditConfirmModal')">
            @csrf
            @method('PUT')
          <div class="col-md-8">

            @Component('components.form-inputs.input',['title' => 'Method','name'=>'method','type'=>'text','icon'=>'fas fa-tag','placeholder' => 'Enter method','required'=>true,'value' =>$payment->method])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Due','name'=>'totalDue','type'=>'number','icon'=>'fas fa-money-bill','placeholder' => 'Enter due amount','required'=>true,'value' =>$payment->totalDue])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Receivable','name'=>'totalPayable','type'=>'number','icon'=>'fas fa-money-bill','placeholder' => 'Enter receivable amount','required'=>true,'value' =>$payment->totalPayable])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Status','name'=>'status','type'=>'text','icon'=>'fas fa-circle','placeholder' => 'Enter status','required'=>true,'value' =>$payment->status])@endcomponent
            @Component('components.form-inputs.submit',['value' => 'Update','icon'=>'fas fa-save','classes'=>'btn btn-success btn-block btn-lg pay-btn','toolTip'=>'Update user'])@endcomponent
            @Component('components.form-inputs.button',['value' => 'Delete','icon'=>'fas fa-warning','classes'=>'btn btn-block btn-danger mt-2','type'=>'button','toolTip'=>'Delete user','click'=>'confirm_modal("deleteUserConfirmModal")'])@endcomponent

          </div>

          <div class="col-md-4">
            @Component('components.form-inputs.input',['title' => 'Discount','name'=>'discount','type'=>'number','icon'=>'fas fa-gift','placeholder' => 'Discount','required'=>false,'value' =>$payment->discount])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Coupon','name'=>'couponCode','type'=>'number','icon'=>'fas fa-gift','placeholder' => 'Coupon code','required'=>false,'value' =>$payment->couponCode])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Currency','name'=>'currency','type'=>'text','icon'=>'fas fa-money','placeholder' => 'Currency code','required'=>false,'value' =>$payment->currency])@endcomponent

            @Component('components.form-inputs.submit',['value' => 'Update','icon'=>'fas fa-save','classes'=>'btn btn-success btn-sm pay-btn','toolTip'=>'Update user'])@endcomponent

          </div>
        </form>
        <!--hidden forms-->
        <form id="user-avatar-form" action="/img-tmp" enctype="multipart/form-data">
          <input class="hidden d-none"  type="file" name="image" id="user-avtar-file" onchange="upload_image(this.value,this.id,'user-avatar',{required:0,min:0,max:255,type:'image',size:1},'user-avatar-url','staff')">
        </form>

        <form class="d-none hidden" id="delete-user-form" action="{{route('payment.destroy',$payment->id)}}" method="post">
          @csrf
          @method('DELETE')
        </form>

        </div>
        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
    <!--modals-->
    @Component('components.modals.confirm',['title'=>'Update client','question'=>'Are you sure you want to update record?','modalID'=>'userEditConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm save','formID'=>'edit-user-form'])@endcomponent
    @Component('components.modals.confirm',['title'=>'Delete client','question'=>'Are you sure you want to delete record?','modalID'=>'deleteUserConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm delete','formID'=>'delete-user-form'])@endcomponent

@endsection
