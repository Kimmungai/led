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

        <div class="row">
          <div class="col-md-12">
        @Component('components.form-inputs.link',['title'=>'Print','href'=>route('quote.download',$quote->id),'toolTip'=>'print quote','icon'=>'fas fa-download','classes'=>'btn btn-default btn-xs pull-right mr-1'])@endcomponent

        @Component('components.form-inputs.link',['title'=>'Share','href'=>'#','toolTip'=>'share quote','icon'=>'fas fa-share-alt','classes'=>'btn btn-default btn-xs pull-right mr-1','click'=>'share_modal("shareModal")'])@endcomponent

        @Component('components.form-inputs.link',['title'=>'Delete','href'=>'#','toolTip'=>'Delete quote','icon'=>'fas fa-warning','classes'=>'btn btn-default btn-xs pull-right mr-1','click'=>'confirm_modal("deleteQuoteConfirmModal")'])@endcomponent

        @Component('components.form-inputs.link',['title'=>'Update','href'=>'#','toolTip'=>'Update quote','icon'=>'fas fa-save','classes'=>'btn btn-default btn-xs pull-right mr-1','click'=>'confirm_modal("quoteSaveConfirmModal")'])@endcomponent
        </div>
      </div>
        @Component('components.structure.breadcrump',['home'=>route('home'),'invoices'=>route('invoices.index'),'newInvoice'=>''])
        @endcomponent

				<div class="graphs">

          <!--invoice template-->
          <form id="edit-quote-form" action="{{route('quotation.update',$quote->id)}}" method="post">
            @csrf
            @method('PUT')
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

              @Component('components.form-inputs.link',['title'=>'Print','href'=>route('quote.download',$quote->id),'toolTip'=>'print quote','icon'=>'fas fa-download','classes'=>'btn btn-default btn-xs pull-right mr-1'])@endcomponent

              @Component('components.form-inputs.link',['title'=>'Share','href'=>'#','toolTip'=>'share quote','icon'=>'fas fa-share-alt','classes'=>'btn btn-default btn-xs pull-right mr-1','click'=>'share_modal("shareModal")'])@endcomponent

              @Component('components.form-inputs.link',['title'=>'Delete','href'=>'#','toolTip'=>'Delete quote','icon'=>'fas fa-warning','classes'=>'btn btn-default btn-xs pull-right mr-1','click'=>'confirm_modal("deleteQuoteConfirmModal")'])@endcomponent

              @Component('components.form-inputs.link',['title'=>'Update','href'=>'#','toolTip'=>'Save quote','icon'=>'fas fa-save','classes'=>'btn btn-default btn-xs pull-right mr-1','click'=>'confirm_modal("quoteSaveConfirmModal")'])@endcomponent

            </div>

        <!--end invoice template-->
        <form class="d-none hidden" id="delete-quote-form" action="{{route('quotation.destroy',$quote->id)}}" method="post">
          @csrf
          @method('DELETE')
        </form>


				</div>
			<!--body wrapper start-->
			</div>
			 <!--body wrapper end-->

		</div>
    <!--modals-->
    @Component('components.modals.confirm',['title'=>'Save user','question'=>'Are you sure you want to save quote?','modalID'=>'quoteSaveConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm save','formID'=>'edit-quote-form'])@endcomponent
    @Component('components.modals.confirm',['title'=>'Delete quote','question'=>'Are you sure you want to delete quote?','modalID'=>'deleteQuoteConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm delete','formID'=>'delete-quote-form'])@endcomponent
    @Component('components.modals.share',['title'=>'Share quote','docId'=>$quote->id,'docType'=>'quote','modalID'=>'shareModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'share'])@endcomponent

@endsection
