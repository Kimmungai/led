  <div class="invoice-panel">

    <div class="row">
      <div class="col-xs-12" >
        <p class="title-1">
          <span>
            <strong id="{{$docId}}-title-1" class="" onclick="edit_doc_field(this.id)">@if(isset($quote)) {{$quote->title_1}}  @else Halal @endif</strong>
            <input id="{{$docId}}-title-1-input" type="text" class="hidden" name="title_1" value="Halal" onfocusout="save_doc_field('{{$docId}}-title-1',this.value)">
          </span>
        </p>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <p class="title-2">
          <span>
            <strong id="{{$docId}}-title-2" class="" onclick="edit_doc_field(this.id)">Sales quotation</strong>
            <input id="{{$docId}}-title-2-input" type="text" class="hidden" name="title_2" value="Sales quotation" onfocusout="save_doc_field('{{$docId}}-title-2',this.value)">
          </span>
        </p>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <div class="heading">
          <h1>
            <strong id="{{$docId}}-heading" onclick="edit_doc_field(this.id)">Ledamcha Multsuppliers</strong>
            <input id="{{$docId}}-heading-input" type="text" class="hidden" name="heading" value="Ledamcha Multsuppliers" onfocusout="save_doc_field('{{$docId}}-heading',this.value)">
          </h1>
          <p>
            <strong id="{{$docId}}-sub-heading" onclick="edit_doc_field(this.id)">Dealers in: Whole Chicken, Wings, Drumsticks, Boneless, Legs, Gizzard, Eggs, Fish Fillet, Beef, Mutton and Pishori Rice</strong>
            <textarea id="{{$docId}}-sub-heading-input" class="form-control hidden" name="sub_heading" onfocusout="save_doc_field('{{$docId}}-sub-heading',this.value)">Dealers in: Whole Chicken, Wings, Drumsticks, Boneless, Legs, Gizzard, Eggs, Fish Fillet, Beef, Mutton and Pishori Rice</textarea>
          </p>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <div class="contacts">
          <ul>
            <li>
              Cell: <strong id="{{$docId}}-phone-1" onclick="edit_doc_field(this.id)">0731 610 776</strong>
              <input id="{{$docId}}-phone-1-input" type="text" class="hidden" name="phone_1" value="0731 610 776" onfocusout="save_doc_field('{{$docId}}-phone-1',this.value)">
            </li>
            <li class="pl-2">
              <strong id="{{$docId}}-phone-2" onclick="edit_doc_field(this.id)">0733 205 300</strong>
              <input id="{{$docId}}-phone-2-input" type="text" class="hidden" name="phone_2" value="0733 205 300" onfocusout="save_doc_field('{{$docId}}-phone-2',this.value)">
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="row">

      <div class="col-xs-6">
        <div class="addresse" onclick="edit_doc_field('{{$docId}}-addresse')">
          <p>
            <strong id="{{$docId}}-addresse">M/s</strong>
            <textarea id="{{$docId}}-addresse-input" class="form-control hidden" name="addresse" onfocusout="save_doc_field('{{$docId}}-addresse',this.value)"></textarea>
          </p>
          <!--<p class="mt-2"></p>
          <p class="mt-2"></p>-->
        </div>
      </div>

      <div class="col-xs-6">
        <div class="doc-ids">

          <p onclick="edit_doc_field('{{$docId}}-doc-id-date')">
            Date
            <strong id="{{$docId}}-doc-id-date" >{{date('d / M / Y')}}</strong>
            <input id="{{$docId}}-doc-id-date-input" type="text" class="hidden" name="date" value="{{date('d / M / Y')}}" onfocusout="save_doc_field('{{$docId}}-doc-id-date',this.value)">
          </p>

          <p onclick="edit_doc_field('{{$docId}}-doc-id-note')">
            <strong id="{{$docId}}-doc-id-note" >Sales quotation</strong>
            <input id="{{$docId}}-doc-id-note-input" type="text" class="hidden" name="note" value="Sales quotation" onfocusout="save_doc_field('{{$docId}}-doc-id-note',this.value)">
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
        <div class="invoice-table table-responsive">
          <table id="{{$docId}}-table" class="table table-bodered">
            <thead id="{{$docId}}-table-head">
              <tr>
                <td>Item code</td>
                <td>Description</td>
                <td>Unit cost</td>
              </tr>
            </thead>

            <tbody id="{{$docId}}-table-body">

              <!--<tr id="{{$docId}}-table-body-row-1">
                <td><span class="fas fa-times-circle" onclick="remove_table_row('{{$docId}}-table-body-row-1','{{$docId}}-table-body')"></span>
                  <strong id="{{$docId}}-table-body-row-1-td-1" onclick="edit_doc_field(this.id)">Managu</strong>
                  <input id="{{$docId}}-table-body-row-1-td-1-input" type="text" class="hidden" name="" value="" onfocusout="save_doc_field('{{$docId}}-table-body-row-1-td-1',this.value)">
                </td>
                <td>
                  <strong id="{{$docId}}-table-body-row-1-td-2" onclick="edit_doc_field(this.id)">Nyau</strong>
                  <input id="{{$docId}}-table-body-row-1-td-2-input" type="text" class="hidden" name="" value="" onfocusout="save_doc_field('{{$docId}}-table-body-row-1-td-2',this.value)">
                </td>
                <td>
                  <strong id="{{$docId}}-table-body-row-1-td-3" onclick="edit_doc_field(this.id)">100</strong>
                  <input id="{{$docId}}-table-body-row-1-td-3-input" type="text" class="hidden" name="" value="" onfocusout="save_doc_field('{{$docId}}-table-body-row-1-td-3',this.value)">
                </td>

              </tr>-->

            </tbody>

            <tfoot id="{{$docId}}-table-foot">

            </tfoot>
          </table>
        </div>



        <div class="footnote">

          <p style="text-align:left;font-style:normal" onclick="edit_doc_field('{{$docId}}-foot-note-p-1')">
            <strong id="{{$docId}}-foot-note-p-1" >NB: Prices are subject to change</strong>
            <textarea id="{{$docId}}-foot-note-p-1-input" class="form-control hidden" name="foot_note_1" onfocusout="save_doc_field('{{$docId}}-foot-note-p-1',this.value)">NB: Prices are subject to change</textarea>
          </p>


          <p style="text-align:left;font-style:normal" class="mt-2" onclick="edit_doc_field('{{$docId}}-foot-note-p-4')">
            <strong id="{{$docId}}-foot-note-p-4" >Warm regards</strong>
            <textarea id="{{$docId}}-foot-note-p-4-input" class="form-control hidden" name="foot_note_4" onfocusout="save_doc_field('{{$docId}}-foot-note-p-4',this.value)">Warm regards</textarea>
          </p>
        </div>
      </div>
    </div>



  </div>
