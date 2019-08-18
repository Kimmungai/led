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
        <div class="row">
          <div class="col-md-12">
        @Component('components.form-inputs.link',['title'=>'Delete','href'=>'#','toolTip'=>'Delete report','icon'=>'fas fa-warning','classes'=>'btn btn-default btn-xs pull-right mr-1','click'=>'confirm_modal("deleteReportConfirmModal")'])@endcomponent

        @Component('components.form-inputs.link',['title'=>'Print','href'=>route('ireport.download',$ireport->id),'toolTip'=>'print quote','icon'=>'fas fa-download','classes'=>'btn btn-default btn-xs pull-right mr-1'])@endcomponent

        @Component('components.form-inputs.link',['title'=>'Share','href'=>'#','toolTip'=>'share quote','icon'=>'fas fa-share-alt','classes'=>'btn btn-default btn-xs pull-right mr-1','click'=>'share_modal("shareModal")'])@endcomponent
      </div>
    </div>

        @Component('components.structure.breadcrump',['home'=>route('home'),'specifiedText'=>'Reports','specifiedLinked'=>route('report.index'),'specified'=>'Report-'.$ireport->id])
        @endcomponent

				<div class="graphs">



			<!-- switches -->
        <!--invoice template-->
          <div class="invoice-panel">

            <p class="title-1">
              <span>
                <strong id="{{$ireport->id}}-title-1" class="" onclick="edit_ireport_field(this.id)">@if($ireport->title_1) {{$ireport->title_1}} @else Halal @endif</strong>
                <input id="{{$ireport->id}}-title-1-input" type="text" class="hidden" name="" value="" onfocusout="save_ireport_field('{{$ireport->id}}-title-1',this.value,'title_1',{{$ireport->id}})">
              </span>
             </p>

             <p class="title-2">
               <span>
                 <strong id="{{$ireport->id}}-title-2" class="" onclick="edit_ireport_field(this.id)">@if($ireport->title_2) {{$ireport->title_2}} @else Report @endif</strong>
                 <input id="{{$ireport->id}}-title-2-input" type="text" class="hidden" name="" value="" onfocusout="save_ireport_field('{{$ireport->id}}-title-2',this.value,'title_2',{{$ireport->id}})">
               </span>
             </p>

            <div class="heading">
              <h1>
                <strong id="{{$ireport->id}}-heading" onclick="edit_ireport_field(this.id)">@if($ireport->heading) {{$ireport->heading}} @else Ledamcha Multsuppliers @endif</strong>
                <input id="{{$ireport->id}}-heading-input" type="text" class="hidden" name="" value="" onfocusout="save_ireport_field('{{$ireport->id}}-heading',this.value,'heading',{{$ireport->id}})">
              </h1>
              <p>
                <strong id="{{$ireport->id}}-sub-heading" onclick="edit_ireport_field(this.id)">@if($ireport->sub_heading) {{$ireport->sub_heading}} @else Dealers in: Whole Chicken, Wings, Drumsticks, Boneless, Legs, Gizzard, Eggs, Fish Fillet, Beef, Mutton and Pishori Rice @endif</strong>
                <textarea id="{{$ireport->id}}-sub-heading-input" class="form-control hidden" name="" onfocusout="save_ireport_field('{{$ireport->id}}-sub-heading',this.value,'sub_heading',{{$ireport->id}})"></textarea>
              </p>
            </div>

            <div class="contacts">
              <ul>
                <li>
                  Cell: <strong id="{{$ireport->id}}-phone-1" onclick="edit_ireport_field(this.id)">@if($ireport->phone_1) {{$ireport->phone_1}} @else 0731 610 776 @endif</strong>
                  <input id="{{$ireport->id}}-phone-1-input" type="text" class="hidden" name="" value="" onfocusout="save_ireport_field('{{$ireport->id}}-phone-1',this.value,'phone_1',{{$ireport->id}})">
                </li>
                <li class="pl-2">
                  <strong id="{{$ireport->id}}-phone-2" onclick="edit_ireport_field(this.id)">@if($ireport->phone_2) {{$ireport->phone_2}} @else 0733 205 300 @endif</strong>
                  <input id="{{$ireport->id}}-phone-2-input" type="text" class="hidden" name="" value="" onfocusout="save_ireport_field('{{$ireport->id}}-phone-2',this.value,'phone_2',{{$ireport->id}})">
                </li>
              </ul>
            </div>

            <div class="row">

              <div class="col-xs-6">
                <div class="addresse" onclick="edit_ireport_field('{{$ireport->id}}-addresse')">
                  <p>
                    <strong id="{{$ireport->id}}-addresse">@if($ireport->addresse) {{$ireport->addresse}} @else M/s {{$ireport->recipient}} @endif</strong>
                    <textarea id="{{$ireport->id}}-addresse-input" class="form-control hidden" name="" onfocusout="save_ireport_field('{{$ireport->id}}-addresse',this.value,'addresse',{{$ireport->id}})"></textarea>
                  </p>
                </div>
              </div>

              <div class="col-xs-6">
                <div class="doc-ids">
                  <span onclick="edit_ireport_field('{{$ireport->id}}-doc-id-email')">
                    Email:
                    <strong id="{{$ireport->id}}-doc-id-email">@if($ireport->email) {{$ireport->email}} @else ledamchamultsuppliers@yahoo.com @endif</strong>
                    <input id="{{$ireport->id}}-doc-id-email-input" type="text" class="hidden" name="" value="" onfocusout="save_ireport_field('{{$ireport->id}}-doc-id-email',this.value,'email',{{$ireport->id}})">
                  </span>
                  <p >
                    Date:
                    <strong id="{{$ireport->id}}-doc-id-date" onclick="edit_ireport_field(this.id)">@if($ireport->date) {{$ireport->date}}  @else {{date('d / M / Y',strtotime($ireport->created_at))}} @endif</strong>
                    <input id="{{$ireport->id}}-doc-id-date-input" type="text" class="hidden" name="" value="" onfocusout="save_ireport_field('{{$ireport->id}}-doc-id-date',this.value,'date',{{$ireport->id}})">
                  </p>
                  <p>Report No. {{$ireport->id}}</p>
                  <p >
                    <strong id="{{$ireport->id}}-doc-id-note" onclick="edit_ireport_field(this.id)">@if($ireport->note) {{$ireport->note}}  @else Report @endif</strong>
                    <input id="{{$ireport->id}}-doc-id-note-input" type="text" class="hidden" name="" value="" onfocusout="save_ireport_field('{{$ireport->id}}-doc-id-note',this.value,'note',{{$ireport->id}})">
                  </p>
                </div>
              </div>

            </div>

            <div class="row">
              <div class="col-xs-12">
                <div class="invoice-table table-responsive">
                  <table class="table-bodered">
                    <thead>
                      <tr>
                        <td>Invoice no.</td>
                        <td>Date</td>
                        <td>Customer</td>
                        <td>Value</td>
                        <td>Sale total</td>
                      </tr>
                    </thead>
                    <tbody id="invoices-table-body">

                      @foreach( $ireport->IreportInvoices as $invoice )
                      <tr data-sale="{{$invoice->totalAmount}}" data-value="{{$invoice->amount}}" id="invoices-table-body-row-{{$invoice->id}}">
                        <td data-label="Invoice no.">{{$invoice->invoice_id}}</td>
                        @if($invoice->invoice_date_1)
                        <td data-label="Date">{{$invoice->invoice_date_1}}</td>
                        @else
                        <td data-label="Date">{{date('d-M-Y',strtotime($invoice->invoice_date))}}</td>
                        @endif
                        <td data-label="Customer">{{$invoice->recipient}}</td>
                        <td data-label="Value">{{$invoice->amount}}</td>
                        <td data-label="Sale total" class="table-highlight">{{$invoice->totalAmount}}</td>
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
