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

        @Component('components.structure.page-title',['title'=>$org->name])@endcomponent

        @Component('components.structure.breadcrump',['home'=>route('home'),'specifiedText'=>'Deleted organisations','specifiedLinked'=>route('trash.org'),'specified'=>$org->name])
        @endcomponent
        <!--custom page design starts-->
        <div class="row">
          <form id="edit-org-form" action="{{route('org.restore',$org->id)}}" method="post" onsubmit="confirm_modal('editOrgConfirmModal')">
            @csrf
          <div class="col-md-8">
            @Component('components.form-inputs.input',['title' => 'Name','name'=>'name','type'=>'text','icon'=>'fas fa-building','placeholder' => 'Enter name','required'=>true,'value'=>$org->name,'disabled'=>''])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Email','name'=>'email','type'=>'email','icon'=>'fas fa-envelope','placeholder' => 'Enter email','required'=>false,'value'=>$org->email,'disabled'=>''])@endcomponent
            @Component('components.form-inputs.input',['title' => 'Phone','name'=>'phoneNumber','type'=>'number','icon'=>'fas fa-phone','placeholder' => 'Enter phone number','required'=>false,'value'=>$org->phoneNumber,'disabled'=>''])@endcomponent
            @Component('components.form-inputs.textarea',['title' => 'Address','name'=>'address','icon'=>'fas fa-map-marker-alt','placeholder' => 'Enter address','rows'=>3,'cols'=>'','required'=>true,'value'=>$org->address,'disabled'=>''])@endcomponent
            @Component('components.form-inputs.submit',['value' => 'Restore','icon'=>'fas fa-trash-restore','classes'=>'btn btn-success btn-block pay-btn','toolTip'=>'Update organisation','disabled'=>''])@endcomponent
            @Component('components.form-inputs.button',['value' => 'Delete permanently','icon'=>'fas fa-warning','classes'=>'btn btn-block btn-danger mt-2','type'=>'button','toolTip'=>'Delete organisation','click'=>'confirm_modal("deleteOrgConfirmModal")'])@endcomponent

          </div>

          <div class="col-md-4">
            <div class="avatar-preview">
              <div class="profile-img-loading-preview hidden"><img class="loader" src="/placeholders/img-loader-green.gif"></div>
              <img id="org-img" class="" src="@if( old('image') ) {{url(old('image'))}} @elseif($org->image) {{url($org->image)}} @else /placeholders/avatar-male.png @endif" alt="" >
              <input id="org-img-url" type="hidden" name="image" value="@if( old('image') ) {{old('image')}} @elseif($org->image) {{$org->image}} @endif">
            </div>
            @Component('components.form-inputs.button',['value' => 'add image','type'=>'button','icon'=>'fas fa-upload','classes'=>'btn btn-default btn-sm','click' => 'click_element("org-image",0)','disabled'=>'' ])@endcomponent
            @Component('components.form-inputs.side-textarea',['title' => 'Remarks','name'=>'description','icon'=>'fas fa-info-circle','placeholder' => 'Enter a brief description','rows'=>3,'cols'=>'','required'=>false,'value'=>$org->description,'disabled'=>''])@endcomponent
          </div>

        </form>
        <!--hidden forms-->
        <form id="org-image-form" action="/img-tmp" enctype="multipart/form-data">
          <input class="hidden d-none"  type="file" name="image" id="org-image" onchange="upload_image(this.value,this.id,'org-img',{required:0,min:0,max:255,type:'image',size:1},'org-img-url')">
        </form>

        <form class="d-none hidden" id="delete-org-form" action="{{route('org.remove',$org->id)}}" method="post">
          @csrf
          @method('DELETE')
        </form>

        </div>
        <!--custom page design ends-->



			</div>
			 <!--body wrapper end-->
		</div>
    <!--modals-->
    @Component('components.modals.confirm',['title'=>'Restore organisation','question'=>'Are you sure you want to restore organisation?','modalID'=>'editOrgConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm Restore','formID'=>'edit-org-form'])@endcomponent
    @Component('components.modals.confirm',['title'=>'Permanently Delete organisation','question'=>'Are you sure you want to permanently delete organisation?','modalID'=>'deleteOrgConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm permanent delete','formID'=>'delete-org-form'])@endcomponent

@endsection
