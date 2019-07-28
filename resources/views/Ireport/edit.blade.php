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
        @Component('components.structure.page-title',['title'=>'Report'])@endcomponent

        @Component('components.form-inputs.link',['title'=>'Delete','href'=>'#','toolTip'=>'Delete report','icon'=>'fas fa-warning','classes'=>'btn btn-default btn-xs pull-right mr-1','click'=>'confirm_modal("deleteReportConfirmModal")'])@endcomponent

        @Component('components.form-inputs.link',['title'=>'Print','href'=>route('ireport.download',$ireport->id),'toolTip'=>'print quote','icon'=>'fas fa-download','classes'=>'btn btn-default btn-xs pull-right mr-1'])@endcomponent

        @Component('components.form-inputs.link',['title'=>'Share','href'=>'#','toolTip'=>'share quote','icon'=>'fas fa-share-alt','classes'=>'btn btn-default btn-xs pull-right mr-1','click'=>'share_modal("shareModal")'])@endcomponent


        @Component('components.structure.breadcrump',['home'=>route('home'),'specifiedText'=>'Reports','specifiedLinked'=>route('report.index'),'specified'=>'Report-'.$ireport->id])
        @endcomponent

				<div class="graphs">



			<!-- switches -->
        <!--invoice template-->
          <div class="invoice-panel">

            <p class="title-1"> <span><strong>Halal</strong></span> </p>
            <p class="title-2"> <span><strong>Report</strong></span> </p>

            <div class="heading">
              <h1>Ledamcha Multsuppliers</h1>
              <p>Dealers in: Whole Chicken, Wings, Drumsticks, Boneless, Legs, Gizzard, Eggs, Fish Fillet, Beef, Mutton and Pishori Rice</p>
            </div>

            <div class="contacts">
              <ul>
                <li>Cell: 0731 610 776</li>
                <li><span class="text-white">Cell: </span>0733 205 300</li>
              </ul>
            </div>

            <div class="row">

              <div class="col-xs-6">
                <div class="addresse">
                  <p>M/s </p>
                  <p class="mt-2"></p>
                  <p class="mt-2"></p>
                </div>
              </div>

              <div class="col-xs-6">
                <div class="doc-ids">
                  <span>Email: ledamchamultsuppliers@yahoo.com</span>
                  <p>Date {{date('d / M / Y')}}</p>
                  <p>Report No. </p>
                  <p>Report</p>
                </div>
              </div>

            </div>

            <div class="row">
              <div class="col-xs-12">
                <div class="invoice-table table-responsive">
                  <table class="table table-bodered">
                    <thead>
                      <tr>
                        <td>Invoice no.</td>
                        <td>Date</td>
                        <td>customer</td>
                        <td>Value</td>
                        <td>Sale total</td>
                      </tr>
                    </thead>
                    <tbody id="invoices-table-body">

                      @foreach( $ireport->IreportInvoices as $invoice )
                      <tr data-sale="{{$invoice->totalAmount}}" data-value="{{$invoice->amount}}" id="invoices-table-body-row-{{$invoice->id}}">
                        <td>{{$invoice->invoice_id}}</td>
                        <td>{{date('d-M-Y',strtotime($invoice->created_at))}}</td>
                        <td>{{$invoice->recipient}}</td>
                        <td>{{$invoice->amount}}</td>
                        <td class="table-highlight">{{$invoice->totalAmount}}</td>
                      </tr>
                      @endforeach

                    </tbody>
                    <tfoot>
                      <tr>
                        <td></td>
                        <td colspan="2">TOTAL</td>
                        <td  id="invoices-table-body-value-total" style="text-align:left">00</td>
                        <td class="text-left" id="invoices-table-body-sale-total" class="table-highlight" style="text-align:left">00</td>
                      </tr>
                    </tfoot>
                  </table>
                </div>

              </div>
            </div>


          </div>
        <!--end invoice template-->
        <div class="row mt-2">
          <div class="col-md-12">
            @Component('components.form-inputs.link',['title'=>'Delete','href'=>'#','toolTip'=>'Delete report','icon'=>'fas fa-warning','classes'=>'btn btn-default btn-xs pull-right mr-1','click'=>'confirm_modal("deleteReportConfirmModal")'])@endcomponent

            @Component('components.form-inputs.link',['title'=>'Print','href'=>route('ireport.download',$ireport->id),'toolTip'=>'print quote','icon'=>'fas fa-download','classes'=>'btn btn-default btn-xs pull-right mr-1'])@endcomponent

            @Component('components.form-inputs.link',['title'=>'Share','href'=>'#','toolTip'=>'share report','icon'=>'fas fa-share-alt','classes'=>'btn btn-default btn-xs pull-right mr-1','click'=>'share_modal("shareModal")'])@endcomponent

          </div>
        </div>

        <form class="d-none hidden" id="delete-report-form" action="{{route('report.destroy',$ireport->id)}}" method="post">
          @csrf
          @method('DELETE')
        </form>

				</div>
			<!--body wrapper start-->
			</div>
			 <!--body wrapper end-->
		</div>
    <!--modals-->
    @Component('components.modals.confirm',['title'=>'Delete report','question'=>'Are you sure you want to delete report?','modalID'=>'deleteReportConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm delete','formID'=>'delete-report-form'])@endcomponent
    @Component('components.modals.share',['title'=>'Share report','docId'=>$ireport->id,'docType'=>'ireport','modalID'=>'shareModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'share'])@endcomponent


    <script type="text/javascript">
      var value = 0;
      var sales_total = 0;
      $('#invoices-table-body tr').each(function () {
        value += parseFloat($(this).data('value'));
        sales_total += parseFloat($(this).data('sale'));
      });
      $("#invoices-table-body-value-total").text(value.toLocaleString("en-GB", {style: "currency", currency: "KES", minimumFractionDigits: 2}));
      $("#invoices-table-body-sale-total").text(sales_total.toLocaleString("en-GB", {style: "currency", currency: "KES", minimumFractionDigits: 2}));
    </script>
@endsection
