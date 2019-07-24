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
        @Component('components.structure.page-title',['title'=>'Quotation-'.$quote->id])@endcomponent



        @Component('components.form-inputs.link',['title'=>'Print','href'=>'#','toolTip'=>'print quote','icon'=>'fas fa-print','classes'=>'btn btn-default btn-xs pull-right mr-1','click'=>'window.print()'])@endcomponent

        @Component('components.form-inputs.link',['title'=>'Share','href'=>'#','toolTip'=>'share quote','icon'=>'fas fa-share-alt','classes'=>'btn btn-default btn-xs pull-right mr-1'])@endcomponent

        @Component('components.form-inputs.link',['title'=>'Update','href'=>'#','toolTip'=>'Update quote','icon'=>'fas fa-save','classes'=>'btn btn-default btn-xs pull-right mr-1','click'=>'confirm_modal("quoteSaveConfirmModal")'])@endcomponent

        @Component('components.structure.breadcrump',['home'=>route('home'),'invoices'=>route('invoices.index'),'newInvoice'=>''])
        @endcomponent

				<div class="graphs">

          <!--invoice template-->
          <form id="new-quote-form" action="{{route('quotation.store')}}" method="post">
            @csrf
            <div class="row">

              <div class="col-md-12">

                <div class="hidden" id="prod-id-holder">
                  <!--<input type="hidden" name="product_id[]" value="1">-->
                </div>

                @Component('components.docs.quotation-template',['docId'=>'quote','quote'=>$quote])@endcomponent

              </div>

            </div>
          </form>

          <div class="row mt-1 mb-1">
            <div class="col-md-12">

              @Component('components.form-inputs.link',['title'=>'Print','href'=>'#','toolTip'=>'print quote','icon'=>'fas fa-print','classes'=>'btn btn-default btn-xs pull-right mr-1','click'=>'window.print()'])@endcomponent

              @Component('components.form-inputs.link',['title'=>'Share','href'=>'#','toolTip'=>'share quote','icon'=>'fas fa-share-alt','classes'=>'btn btn-default btn-xs pull-right mr-1'])@endcomponent

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
