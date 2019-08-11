<div class="hidden" id="prod-id-holder">
  @if(isset($quote))
    @foreach( $quote->quoteProds as $quoteProd )
      <input id="prod-id-field-{{$quoteProd->product_id}}" type="hidden" name="product_id[]" value="{{$quoteProd->product_id}}">
    @endforeach
  @endif
</div>
  <div class="invoice-panel">

    <div class="row">
      <div class="col-xs-12" >
        <p class="title-1">
          <span>
            <strong id="{{$docId}}-title-1" class="" onclick="edit_doc_field(this.id)">@if(isset($quote)) {{$quote->title_1}}  @else Halal @endif</strong>
            <input id="{{$docId}}-title-1-input" type="text" class="hidden" name="title_1" value="@if(isset($quote)) {{$quote->title_1}}  @else Halal @endif" onfocusout="save_doc_field('{{$docId}}-title-1',this.value)">
          </span>
        </p>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <p class="title-2">
          <span>
            <strong id="{{$docId}}-title-2" class="" onclick="edit_doc_field(this.id)">@if(isset($quote)) {{$quote->title_2}}  @else Sales quotation @endif</strong>
            <input id="{{$docId}}-title-2-input" type="text" class="hidden" name="title_2" value="@if(isset($quote)) {{$quote->title_2}}  @else Sales quotation @endif" onfocusout="save_doc_field('{{$docId}}-title-2',this.value)">
          </span>
        </p>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <div class="heading">
          <h1>
            <strong id="{{$docId}}-heading" onclick="edit_doc_field(this.id)">@if(isset($quote)) {{$quote->heading}}  @else Ledamcha Multsuppliers @endif</strong>
            <input id="{{$docId}}-heading-input" type="text" class="hidden" name="heading" value="@if(isset($quote)) {{$quote->heading}}  @else Ledamcha Multsuppliers @endif" onfocusout="save_doc_field('{{$docId}}-heading',this.value)">
          </h1>
          <p>
            <strong id="{{$docId}}-sub-heading" onclick="edit_doc_field(this.id)">@if(isset($quote)) {{$quote->sub_heading}}  @else Dealers in: Whole Chicken, Wings, Drumsticks, Boneless, Legs, Gizzard, Eggs, Fish Fillet, Beef, Mutton and Pishori Rice @endif</strong>
            <textarea id="{{$docId}}-sub-heading-input" class="form-control hidden" name="sub_heading" onfocusout="save_doc_field('{{$docId}}-sub-heading',this.value)">@if(isset($quote)) {{$quote->sub_heading}}  @else Dealers in: Whole Chicken, Wings, Drumsticks, Boneless, Legs, Gizzard, Eggs, Fish Fillet, Beef, Mutton and Pishori Rice @endif</textarea>
          </p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <div class="contacts">
          <ul>
            <li>
              Cell: <strong id="{{$docId}}-phone-1" onclick="edit_doc_field(this.id)">@if(isset($quote)) {{$quote->phone_1}}  @else 0731 610 776  @endif</strong>
              <input id="{{$docId}}-phone-1-input" type="text" class="hidden" name="phone_1" value="@if(isset($quote)) {{$quote->phone_1}}  @else 0731 610 776  @endif" onfocusout="save_doc_field('{{$docId}}-phone-1',this.value)">
            </li>
            <li class="pl-2">
              <strong id="{{$docId}}-phone-2" onclick="edit_doc_field(this.id)">@if(isset($quote)) {{$quote->phone_2}}  @else 0733 205 300  @endif</strong>
              <input id="{{$docId}}-phone-2-input" type="text" class="hidden" name="phone_2" value="@if(isset($quote)) {{$quote->phone_2}}  @else 0733 205 300  @endif" onfocusout="save_doc_field('{{$docId}}-phone-2',this.value)">
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="row">

      <div class="col-xs-6">
        <div class="addresse" onclick="edit_doc_field('{{$docId}}-addresse')">
          <p>
            <strong id="{{$docId}}-addresse">@if(isset($quote)) {{$quote->addresse}}  @else M/s  @endif</strong>
            <textarea id="{{$docId}}-addresse-input" class="form-control hidden" name="addresse" onfocusout="save_doc_field('{{$docId}}-addresse',this.value)">@if(isset($quote)) {{$quote->addresse}}  @else M/s  @endif</textarea>
          </p>
          <!--<p class="mt-2"></p>
          <p class="mt-2"></p>-->
        </div>
      </div>

      <div class="col-xs-6">
        <div class="doc-ids">

          <p onclick="edit_doc_field('{{$docId}}-doc-id-date')">
            Date
            <strong id="{{$docId}}-doc-id-date" >@if(isset($quote)) {{$quote->date}}  @else {{date('d / M / Y')}}  @endif</strong>
            <input id="{{$docId}}-doc-id-date-input" type="text" class="hidden" name="date" value="@if(isset($quote)) {{$quote->date}}  @else {{date('d / M / Y')}}  @endif" onfocusout="save_doc_field('{{$docId}}-doc-id-date',this.value)">
          </p>

          <p onclick="edit_doc_field('{{$docId}}-doc-id-note')">
            <strong id="{{$docId}}-doc-id-note" >@if(isset($quote)) {{$quote->note}}  @else Sales quotation  @endif</strong>
            <input id="{{$docId}}-doc-id-note-input" type="text" class="hidden" name="note" value="@if(isset($quote)) {{$quote->note}}  @else Sales quotation  @endif" onfocusout="save_doc_field('{{$docId}}-doc-id-note',this.value)">
          </p>
        </div>
      </div>

    </div>

    <div class="row mt-1">
      <div class="col-md-6">
        <!--search form-->
        @Component('components.forms.search-1',['action'=>'','method'=>'','placeholder'=>'Product code...','keyup' => 'search_product(this.value,\''.$docId.'-table-body\')'])@endcomponent
        @Component('components.search.results-panel',['action'=>'','method'=>'','placeholder'=>'Product code...'])@endcomponent
        <!--end search form-->
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <div class="invoice-table">
          <table id="{{$docId}}-table" class="table-bodered">
            <thead id="{{$docId}}-table-head">
              <tr>
                <td>Item code</td>
                <td>Description</td>
                <td>Unit cost</td>
              </tr>
            </thead>

            <tbody id="{{$docId}}-table-body">

              @if(isset($quote))

                @foreach( $quote->quoteProds as $quoteProd )

                <tr data-id="{{$quoteProd->product_id}}" id="{{$docId}}-table-body-row-{{$quoteProd->product_id}}">
                  <td data-label="Item code"><span class="fas fa-times-circle" onclick="remove_table_row('{{$docId}}-table-body-row-{{$quoteProd->product_id}}','quote-table-body')"></span>
                    <strong id="{{$docId}}-table-body-row-{{$quoteProd->product_id}}-td-1" onclick="">{{$quoteProd->product_id}}</strong>
                    <input id="{{$docId}}-table-body-row-{{$quoteProd->product_id}}-td-1-input" type="text" class="hidden" name="prod_id[]" value="{{$quoteProd->product_id}}" onfocusout="save_doc_field('{{$docId}}-table-body-row-{{$quoteProd->product_id}}-td-1',this.value)">
                  </td>
                  <td data-label="Description">
                    <strong id="{{$docId}}-table-body-row-{{$quoteProd->product_id}}-td-2" onclick="">{{$quoteProd->name}}</strong>
                    <input id="{{$docId}}-table-body-row-{{$quoteProd->product_id}}-td-2-input" type="text" class="hidden" name="prod_name[]" value="{{$quoteProd->name}}" onfocusout="save_doc_field('{{$docId}}-table-body-row-{{$quoteProd->product_id}}-td-2',this.value)">
                  </td>
                  <td data-label="Unit cost">
                    <strong id="{{$docId}}-table-body-row-{{$quoteProd->product_id}}-td-3" onclick="edit_doc_field('{{$docId}}-table-body-row-{{$quoteProd->product_id}}-td-3')">{{$quoteProd->salePrice}}</strong>
                    <input id="{{$docId}}-table-body-row-{{$quoteProd->product_id}}-td-3-input" type="text" class="hidden" name="sale_price[]" value="{{$quoteProd->salePrice}}" onfocusout="save_doc_field('{{$docId}}-table-body-row-{{$quoteProd->product_id}}-td-3',this.value)">
                  </td>

                </tr>

                @endforeach

              @endif

            </tbody>

            <tfoot id="{{$docId}}-table-foot">

            </tfoot>
          </table>
        </div>



        <div class="footnote">

          <p style="text-align:left;font-style:normal" onclick="edit_doc_field('{{$docId}}-foot-note-p-1')">
            <strong id="{{$docId}}-foot-note-p-1" >@if(isset($quote)) {{$quote->foot_note_1}}  @else NB: Prices are subject to change  @endif</strong>
            <textarea id="{{$docId}}-foot-note-p-1-input" class="form-control hidden" name="foot_note_1" onfocusout="save_doc_field('{{$docId}}-foot-note-p-1',this.value)">@if(isset($quote)) {{$quote->foot_note_1}}  @else NB: Prices are subject to change  @endif</textarea>
          </p>


          <p style="text-align:left;font-style:normal" class="mt-2" onclick="edit_doc_field('{{$docId}}-foot-note-p-4')">
            <strong id="{{$docId}}-foot-note-p-4" >@if(isset($quote)) {{$quote->foot_note_4}}  @else Warm regards  @endif</strong>
            <textarea id="{{$docId}}-foot-note-p-4-input" class="form-control hidden" name="foot_note_4" onfocusout="save_doc_field('{{$docId}}-foot-note-p-4',this.value)">@if(isset($quote)) {{$quote->foot_note_4}}  @else Warm regards  @endif</textarea>
          </p>
        </div>
      </div>
    </div>



  </div>
