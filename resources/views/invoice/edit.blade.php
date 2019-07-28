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
        @Component('components.structure.page-title',['title'=>$invoice->recipient.' '.$invoice->name])@endcomponent

        @Component('components.form-inputs.link',['title'=>'Delete','href'=>'#','toolTip'=>'Delete invoice','icon'=>'fas fa-warning','classes'=>'btn btn-default btn-xs pull-right mr-1','click'=>'confirm_modal("deleteInvoiceConfirmModal")'])@endcomponent

        @Component('components.form-inputs.link',['title'=>'Print','href'=>route('invoice.download',$invoice->id),'toolTip'=>'download quote','icon'=>'fas fa-download','classes'=>'btn btn-default btn-xs pull-right mr-1'])@endcomponent

        @Component('components.form-inputs.link',['title'=>'Share','href'=>'#','toolTip'=>'share quote','icon'=>'fas fa-share-alt','classes'=>'btn btn-default btn-xs pull-right mr-1','click'=>'share_modal("shareModal")'])@endcomponent


        @Component('components.structure.breadcrump',['home'=>route('home'),'invoices'=>route('invoices.index'),'specified'=>$invoice->name])
        @endcomponent

				<div class="graphs">

          <div class="row">
            <div class="col-sm-12">
              <input type="radio" name="paid" value="1" @if($invoice->status) checked @endif  onchange="update_invoice(this.value,'status',{{$invoice->id}},1)"> <strong>Paid</strong>
              <input type="radio" name="paid" value="0" @if(!$invoice->status) checked @endif onchange="update_invoice(this.value,'status',{{$invoice->id}},1)"> <strong>Unpaid</strong>
            </div>
          </div>

			<!-- switches -->
        <!--invoice template-->
          <div class="invoice-panel">

            <p class="title-1"> <strong>Halal</strong> </p>
            <p class="title-2"> <strong>Delivery / Invoice</strong> </p>

            <div class="heading">
              <h1>Ledamcha Multsuppliers</h1>
              <p>Dealers in: Whole Chicken, Wings, Drumsticks, Boneless, Legs, Gizzard, Eggs, Fish Fillet, Beef, Mutton and Pishori Rice</p>
            </div>

            <div class="contacts">
              <ul>
                <li>Cell: 0731 610 776</li>
                <li class="pl-2">0733 205 300</li>
              </ul>
            </div>

            <div class="row">

              <div class="col-xs-6">
                <div class="addresse">
                  <p>M/s {{$invoice->recipient}}</p>
                  <p class="mt-2"></p>
                  <p class="mt-2"></p>
                </div>
              </div>

              <div class="col-xs-6">
                <div class="doc-ids">
                  <span>Email: ledamchamultsuppliers@yahoo.com</span>
                  <p>Date {{date('d / M / Y',strtotime($invoice->created_at))}}</p>
                  <p>Order No. {{$invoice->id}}</p>
                  <p>Delivery Note</p>
                </div>
              </div>

            </div>

            <div class="row">
              <div class="col-xs-12">
                <div class="invoice-table table-responsive">
                  <table class="table table-bodered">
                    <thead>
                      <tr>
                        <td>Qty.</td>
                        <td>Description</td>
                        <td>@</td>
                        <td>Shs.</td>
                        <td>Cts</td>
                      </tr>
                    </thead>
                    <tbody>

                      @foreach( $revenues as $revenue )
                      <tr>
                        <td>{{$revenue->soldQuantity}}</td>
                        <td>{{$revenue->description}}</td>
                        <td>{{$revenue->unitPrice}}</td>
                        <td>{{$revenue->sellingPrice}}</td>
                        <td class="table-highlight">00</td>
                      </tr>
                      @endforeach


                      <tr>
                        <td></td>
                        <td colspan="2">TOTAL</td>
                        <td>{{number_format($revenue->sale->amountDue,2)}}</td>
                        <td class="table-highlight">00</td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th></th>
                        <th colspan="3">Accounts are due on demand</th>
                        <th></th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <div class="footnote">
                  <p>Prices are subject to change without prior notice.</p>
                  <div class="row inspector mt-2">
                    <div class="col-xs-6">
                      <p>Checked by: </p>
                    </div>
                    <div class="col-xs-6">
                      <p>Date Received:</p>
                    </div>
                  </div>
                  <p class="mt-2">Your premium supplier. Only the best</p>
                </div>
              </div>
            </div>


          </div>
        <!--end invoice template-->
        <div class="row mt-2">
          <div class="col-md-12">
            @Component('components.form-inputs.link',['title'=>'Delete','href'=>'#','toolTip'=>'Delete invoice','icon'=>'fas fa-warning','classes'=>'btn btn-default btn-xs pull-right mr-1','click'=>'confirm_modal("deleteInvoiceConfirmModal")'])@endcomponent

            @Component('components.form-inputs.link',['title'=>'Print','href'=>route('invoice.download',$invoice->id),'toolTip'=>'download quote','icon'=>'fas fa-download','classes'=>'btn btn-default btn-xs pull-right mr-1'])@endcomponent

            @Component('components.form-inputs.link',['title'=>'Share','href'=>'#','toolTip'=>'share quote','icon'=>'fas fa-share-alt','classes'=>'btn btn-default btn-xs pull-right mr-1','click'=>'share_modal("shareModal")'])@endcomponent

          </div>
        </div>

        <form class="d-none hidden" id="delete-invoice-form" action="{{route('invoices.destroy')}}" method="post">
          <input type="hidden" name="id" value="{{$invoice->id}}">
          @csrf
        </form>

				</div>
			<!--body wrapper start-->
			</div>
			 <!--body wrapper end-->
		</div>
    <!--modals-->
    @Component('components.modals.confirm',['title'=>'Delete invoice','question'=>'Are you sure you want to delete invoice?','modalID'=>'deleteInvoiceConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm delete','formID'=>'delete-invoice-form'])@endcomponent
    @Component('components.modals.share',['title'=>'Share invoice','docId'=>$invoice->id,'docType'=>'invoice','modalID'=>'shareModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'share'])@endcomponent

@endsection
