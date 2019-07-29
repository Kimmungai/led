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

			<div id="page-wrapper">
        @Component('components.structure.page-title',['title'=>'Create new quotation'])@endcomponent


        <div class="row">
          <div class="col-md-12">
            @Component('components.form-inputs.link',['title'=>'Save','href'=>'#','toolTip'=>'Save quote','icon'=>'fas fa-save','classes'=>'btn btn-default btn-xs pull-right mr-1','click'=>'confirm_modal("quoteSaveConfirmModal")'])@endcomponent
          </div>
        </div>


        @Component('components.structure.breadcrump',['home'=>route('home'),'invoices'=>route('invoices.index'),'newInvoice'=>''])
        @endcomponent

				<div class="graphs">

          <!--invoice template-->
          <form id="new-quote-form" action="{{route('quotation.store')}}" method="post">
            @csrf
            <div class="row">

              <div class="col-md-12">



                @Component('components.docs.quotation-template',['docId'=>'quote'])@endcomponent

              </div>

            </div>
          </form>

          <div class="row mt-1 mb-1">
            <div class="col-md-12">


              @Component('components.form-inputs.link',['title'=>'Save','href'=>'#','toolTip'=>'Save quote','icon'=>'fas fa-save','classes'=>'btn btn-default btn-xs pull-right mr-1','click'=>'confirm_modal("quoteSaveConfirmModal")'])@endcomponent

            </div>

        <!--end invoice template-->



				</div>
			<!--body wrapper start-->
			</div>
			 <!--body wrapper end-->

		</div>
    <!--modals-->
    @Component('components.modals.confirm',['title'=>'Save user','question'=>'Are you sure you want to save quote?','modalID'=>'quoteSaveConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm save','formID'=>'new-quote-form'])@endcomponent

@endsection
