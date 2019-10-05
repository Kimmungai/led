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
        <div class="row">
          <div class="col-md-12">
        @Component('components.form-inputs.link',['title'=>'Delete','href'=>'#','toolTip'=>'Delete invoice','icon'=>'fas fa-warning','classes'=>'btn btn-default btn-xs pull-right mr-1','click'=>'confirm_modal("deleteInvoiceConfirmModal")'])@endcomponent

        @Component('components.form-inputs.link',['title'=>'Print','href'=>route('invoice.download',$invoice->id),'toolTip'=>'download invoice','icon'=>'fas fa-download','classes'=>'btn btn-default btn-xs pull-right mr-1'])@endcomponent

        @Component('components.form-inputs.link',['title'=>'Share','href'=>'#','toolTip'=>'share invoice','icon'=>'fas fa-share-alt','classes'=>'btn btn-default btn-xs pull-right mr-1','click'=>'share_modal("shareModal")'])@endcomponent

        @Component('components.form-inputs.link',['title'=>'Update','href'=>'#','toolTip'=>'Update invoice','icon'=>'fas fa-save','classes'=>'btn btn-default btn-xs pull-right mr-1','click'=>'confirm_modal("quoteSaveConfirmModal")'])@endcomponent

        </div>
      </div>

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

            <p class="title-1">
              <span>
                <strong id="{{$invoice->id}}-title-1" class="" onclick="edit_invoice_field(this.id)">@if($invoice->title_1) {{$invoice->title_1}} @else Halal @endif</strong>
                <input id="{{$invoice->id}}-title-1-input" type="text" class="hidden" name="" value="" onfocusout="save_invoice_field('{{$invoice->id}}-title-1',this.value,'title_1',{{$invoice->id}})">
              </span>
            </p>
            <p class="title-2">
              <span>
                <strong id="{{$invoice->id}}-title-2" class="" onclick="edit_invoice_field(this.id)">@if($invoice->title_2) {{$invoice->title_2}} @else Delivery / Invoice @endif</strong>
                <input id="{{$invoice->id}}-title-2-input" type="text" class="hidden" name="" value="" onfocusout="save_invoice_field('{{$invoice->id}}-title-2',this.value,'title_2',{{$invoice->id}})">
              </span>
            </p>

            <div class="heading">
              <h1>
                <strong id="{{$invoice->id}}-heading" onclick="edit_invoice_field(this.id)">@if($invoice->heading) {{$invoice->heading}} @else Ledamcha Multsuppliers @endif</strong>
                <input id="{{$invoice->id}}-heading-input" type="text" class="hidden" name="" value="" onfocusout="save_invoice_field('{{$invoice->id}}-heading',this.value,'heading',{{$invoice->id}})">
              </h1>
              <p>
                <strong id="{{$invoice->id}}-sub-heading" onclick="edit_invoice_field(this.id)">@if($invoice->sub_heading) {{$invoice->sub_heading}} @else Dealers in: Whole Chicken, Wings, Drumsticks, Boneless, Legs, Gizzard, Eggs, Fish Fillet, Beef, Mutton and Pishori Rice @endif</strong>
                <textarea id="{{$invoice->id}}-sub-heading-input" class="form-control hidden" name="" onfocusout="save_invoice_field('{{$invoice->id}}-sub-heading',this.value,'sub_heading',{{$invoice->id}})"></textarea>
              </p>
            </div>

            <div class="contacts">
              <ul>
                <li>
                  Cell: <strong id="{{$invoice->id}}-phone-1" onclick="edit_invoice_field(this.id)">@if($invoice->phone_1) {{$invoice->phone_1}} @else 0731 610 776 @endif</strong>
                  <input id="{{$invoice->id}}-phone-1-input" type="text" class="hidden" name="" value="" onfocusout="save_invoice_field('{{$invoice->id}}-phone-1',this.value,'phone_1',{{$invoice->id}})">
                </li>
                <li class="pl-2">
                  <strong id="{{$invoice->id}}-phone-2" onclick="edit_invoice_field(this.id)">@if($invoice->phone_2) {{$invoice->phone_2}} @else 0733 205 300 @endif</strong>
                  <input id="{{$invoice->id}}-phone-2-input" type="text" class="hidden" name="" value="" onfocusout="save_invoice_field('{{$invoice->id}}-phone-2',this.value,'phone_2',{{$invoice->id}})">
                </li>
              </ul>
            </div>

            <div class="row">

              <div class="col-xs-6">
                <div class="addresse" onclick="edit_invoice_field('{{$invoice->id}}-addresse')">
                  <p>
                    <strong id="{{$invoice->id}}-addresse">@if($invoice->addresse) {{$invoice->addresse}} @else M/s {{$invoice->recipient}} @endif</strong>
                    <textarea id="{{$invoice->id}}-addresse-input" class="form-control hidden" name="" onfocusout="save_invoice_field('{{$invoice->id}}-addresse',this.value,'addresse',{{$invoice->id}})"></textarea>
                  </p>
                </div>
              </div>

              <div class="col-xs-6">
                <div class="doc-ids">
                  <span onclick="edit_invoice_field('{{$invoice->id}}-doc-id-email')">
                    Email:
                    <strong id="{{$invoice->id}}-doc-id-email">@if($invoice->email) {{$invoice->email}} @else ledamchamultsuppliers@yahoo.com @endif</strong>
                    <input id="{{$invoice->id}}-doc-id-email-input" type="text" class="hidden" name="" value="" onfocusout="save_invoice_field('{{$invoice->id}}-doc-id-email',this.value,'email',{{$invoice->id}})">
                  </span>
                  <p >
                    Date:
                    <strong id="{{$invoice->id}}-doc-id-date" onclick="edit_invoice_field(this.id)">@if($invoice->date) {{$invoice->date}}  @else {{date('d / M / Y',strtotime($invoice->created_at))}} @endif</strong>
                    <input id="{{$invoice->id}}-doc-id-date-input" type="text" class="hidden" name="" value="" onfocusout="save_invoice_field('{{$invoice->id}}-doc-id-date',this.value,'date',{{$invoice->id}})">
                  </p>
                  <p>Order No. {{$invoice->id}}</p>
                  <p >
                    <strong id="{{$invoice->id}}-doc-id-note" onclick="edit_invoice_field(this.id)">@if($invoice->note) {{$invoice->note}}  @else Delivery Note @endif</strong>
                    <input id="{{$invoice->id}}-doc-id-note-input" type="text" class="hidden" name="" value="" onfocusout="save_invoice_field('{{$invoice->id}}-doc-id-note',this.value,'note',{{$invoice->id}})">
                  </p>
                </div>
              </div>

            </div>

            <div class="row">
              <div class="col-xs-12">
                <div class="invoice-table">
                  <table class="">
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
                        <td data-label="Qty.">{{$revenue->soldQuantity}}</td>
                        <td data-label="Description">{{$revenue->description}}</td>
                        <td data-label="@">{{$revenue->unitPrice}}</td>
                        <td data-label="Shs.">{{$revenue->sellingPrice * $revenue->soldQuantity}}</td>
                        <td data-label="Cts" class="table-highlight">00</td>
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
                        <th  colspan="3" >
                          <strong id="{{$invoice->id}}-table-foot-note-1" onclick="edit_invoice_field(this.id)">@if($invoice->foot_note_1) {{$invoice->foot_note_1}}  @else Accounts are due on demand @endif</strong>
                          <input id="{{$invoice->id}}-table-foot-note-1-input" type="text" class="form-control hidden" name="" value="" onfocusout="save_invoice_field('{{$invoice->id}}-table-foot-note-1',this.value,'foot_note_1',{{$invoice->id}})">
                        </th>
                        <th></th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <div class="footnote">
                  <p onclick="edit_invoice_field('{{$invoice->id}}-foot-note-2')">
                    <strong id="{{$invoice->id}}-foot-note-2" >@if($invoice->foot_note_2) {{$invoice->foot_note_2}}  @else Prices are subject to change without prior notice. @endif</strong>
                    <textarea id="{{$invoice->id}}-foot-note-2-input" class="form-control hidden" name="" onfocusout="save_invoice_field('{{$invoice->id}}-foot-note-2',this.value,'foot_note_2',{{$invoice->id}})"></textarea>
                  </p>
                  <div class="row inspector mt-2">
                    <div class="col-xs-6">
                      <p>Checked by: </p>
                    </div>
                    <div class="col-xs-6">
                      <p>Date Received:</p>
                    </div>
                  </div>
                  <p  class="mt-2" onclick="edit_invoice_field('{{$invoice->id}}-foot-note-3')">
                    <strong id="{{$invoice->id}}-foot-note-3" >@if($invoice->foot_note_3) {{$invoice->foot_note_3}}  @else Your premium supplier. Only the best @endif</strong>
                    <input id="{{$invoice->id}}-foot-note-3-input" class="form-control hidden" name="" onfocusout="save_invoice_field('{{$invoice->id}}-foot-note-3',this.value,'foot_note_3',{{$invoice->id}})"/>
                  </p>
                </div>
              </div>
            </div>


          </div>
        <!--end invoice template-->
        <div class="row mt-2">
          <div class="col-md-12">
            @Component('components.form-inputs.link',['title'=>'Delete','href'=>'#','toolTip'=>'Delete invoice','icon'=>'fas fa-warning','classes'=>'btn btn-default btn-xs pull-right mr-1','click'=>'confirm_modal("deleteInvoiceConfirmModal")'])@endcomponent

            @Component('components.form-inputs.link',['title'=>'Print','href'=>route('invoice.download',$invoice->id),'toolTip'=>'download invoice','icon'=>'fas fa-download','classes'=>'btn btn-default btn-xs pull-right mr-1'])@endcomponent

            @Component('components.form-inputs.link',['title'=>'Share','href'=>'#','toolTip'=>'share invoice','icon'=>'fas fa-share-alt','classes'=>'btn btn-default btn-xs pull-right mr-1','click'=>'share_modal("shareModal")'])@endcomponent

          </div>
        </div>

        <form class="d-none hidden" id="delete-invoice-form" action="{{route('invoices.destroy')}}" method="post">
          <input type="hidden" name="id" value="{{$invoice->id}}">
          @csrf
        </form>

        <form id="edit-invoice-form" action="{{url('edit-invoice')}}" method="post">
          @csrf
          @method('PUT')
				</form>
			<!--body wrapper start-->
			</div>
			 <!--body wrapper end-->
		</div>
    <!--modals-->
    @Component('components.modals.confirm',['title'=>'Delete invoice','question'=>'Are you sure you want to delete invoice?','modalID'=>'deleteInvoiceConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm delete','formID'=>'delete-invoice-form'])@endcomponent
    @Component('components.modals.share',['title'=>'Share invoice','docId'=>$invoice->id,'docType'=>'invoice','modalID'=>'shareModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'share'])@endcomponent
    @Component('components.modals.confirm',['title'=>'Save invoice','question'=>'Are you sure you want to save invoice?','modalID'=>'quoteSaveConfirmModal','cancelBtnTitle'=>'Cancel','saveBtnTitle'=>'Confirm save','formID'=>'edit-invoice-form'])@endcomponent <!--Decoy, data saved via ajax. Just here for the usability-->

@endsection
