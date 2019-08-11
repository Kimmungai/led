  <div class="invoice-panel">

    <div class="row">
      <div class="col-xs-12">
        <p class="title-1">
          <span>
            <strong id="{{$docId}}-title-1" class="" onclick="edit_doc_field(this.id)">Halal</strong>
            <input id="{{$docId}}-title-1-input" type="text" class="hidden" name="" value="" onfocusout="save_doc_field('{{$docId}}-title-1',this.value)">
          </span>
        </p>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <p class="title-2">
          <span>
            <strong id="{{$docId}}-title-2" class="" onclick="edit_doc_field(this.id)">Delivery / Invoice</strong>
            <input id="{{$docId}}-title-2-input" type="text" class="hidden" name="" value="" onfocusout="save_doc_field('{{$docId}}-title-2',this.value)">
          </span>
        </p>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <div class="heading">
          <h1>
            <strong id="{{$docId}}-heading" onclick="edit_doc_field(this.id)">Ledamcha Multsuppliers</strong>
            <input id="{{$docId}}-heading-input" type="text" class="hidden" name="" value="" onfocusout="save_doc_field('{{$docId}}-heading',this.value)">
          </h1>
          <p>
            <strong id="{{$docId}}-sub-heading" onclick="edit_doc_field(this.id)">Dealers in: Whole Chicken, Wings, Drumsticks, Boneless, Legs, Gizzard, Eggs, Fish Fillet, Beef, Mutton and Pishori Rice</strong>
            <textarea id="{{$docId}}-sub-heading-input" class="form-control hidden" name="" onfocusout="save_doc_field('{{$docId}}-sub-heading',this.value)"></textarea>
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
              <input id="{{$docId}}-phone-1-input" type="text" class="hidden" name="" value="" onfocusout="save_doc_field('{{$docId}}-phone-1',this.value)">
            </li>
            <li class="pl-2">
              <strong id="{{$docId}}-phone-2" onclick="edit_doc_field(this.id)">0733 205 300</strong>
              <input id="{{$docId}}-phone-2-input" type="text" class="hidden" name="" value="" onfocusout="save_doc_field('{{$docId}}-phone-2',this.value)">
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
            <textarea id="{{$docId}}-addresse-input" class="form-control hidden" name="" onfocusout="save_doc_field('{{$docId}}-addresse',this.value)"></textarea>
          </p>
          <!--<p class="mt-2"></p>
          <p class="mt-2"></p>-->
        </div>
      </div>

      <div class="col-xs-6">
        <div class="doc-ids">
          <span onclick="edit_doc_field('{{$docId}}-doc-id-email')">
            Email:
            <strong id="{{$docId}}-doc-id-email" >ledamchamultsuppliers@yahoo.com</strong>
            <input id="{{$docId}}-doc-id-email-input" type="text" class="hidden" name="" value="" onfocusout="save_doc_field('{{$docId}}-doc-id-email',this.value)">
          </span>
          <p onclick="edit_doc_field('{{$docId}}-doc-id-date')">
            Date
            <strong id="{{$docId}}-doc-id-date" >{{date('d / M / Y')}}</strong>
            <input id="{{$docId}}-doc-id-date-input" type="text" class="hidden" name="" value="" onfocusout="save_doc_field('{{$docId}}-doc-id-date',this.value)">
          </p>
          <p onclick="edit_doc_field('{{$docId}}-doc-id-invoice-no')">
            Invoice No.
            <strong id="{{$docId}}-doc-id-invoice-no" >1</strong>
            <input id="{{$docId}}-doc-id-invoice-no-input" type="text" class="hidden" name="" value="" onfocusout="save_doc_field('{{$docId}}-doc-id-invoice-no',this.value)">
          </p>
          <p onclick="edit_doc_field('{{$docId}}-doc-id-note')">
            <strong id="{{$docId}}-doc-id-note" >Delivery Note</strong>
            <input id="{{$docId}}-doc-id-note-input" type="text" class="hidden" name="" value="" onfocusout="save_doc_field('{{$docId}}-doc-id-note',this.value)">
          </p>
        </div>
      </div>

    </div>

    <div class="row">
      <div class="col-md-12">
        <a href="#" class="btn btn-xs btn-default" onclick="add_table_row('{{$docId}}-table-body')"><span class="fas fa-plus-circle"></span> Row</a>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <div class="invoice-table table-responsive">
          <table id="{{$docId}}-table" class="table-bodered">
            <thead id="{{$docId}}-table-head">
              <tr>
                <td>Qty.</td>
                <td>Description</td>
                <td>@</td>
                <td>Shs.</td>
                <td>Cts</td>
              </tr>
            </thead>

            <tbody id="{{$docId}}-table-body">

              <tr id="{{$docId}}-table-body-row-1">
                <td data-label="Qty."><span class="fas fa-times-circle" onclick="remove_table_row('{{$docId}}-table-body-row-1','{{$docId}}-table-body')"></span>
                  <strong id="{{$docId}}-table-body-row-1-td-1" onclick="edit_doc_field(this.id)">Managu</strong>
                  <input id="{{$docId}}-table-body-row-1-td-1-input" type="text" class="hidden" name="" value="" onfocusout="save_doc_field('{{$docId}}-table-body-row-1-td-1',this.value)">
                </td>
                <td data-label="Description">
                  <strong id="{{$docId}}-table-body-row-1-td-2" onclick="edit_doc_field(this.id)">Nyau</strong>
                  <input id="{{$docId}}-table-body-row-1-td-2-input" type="text" class="hidden" name="" value="" onfocusout="save_doc_field('{{$docId}}-table-body-row-1-td-2',this.value)">
                </td>
                <td data-label="@">
                  <strong id="{{$docId}}-table-body-row-1-td-3" onclick="edit_doc_field(this.id)">100</strong>
                  <input id="{{$docId}}-table-body-row-1-td-3-input" type="text" class="hidden" name="" value="" onfocusout="save_doc_field('{{$docId}}-table-body-row-1-td-3',this.value)">
                </td>
                <td data-label="Shs.">
                  <strong id="{{$docId}}-table-body-row-1-td-4" onclick="edit_doc_field(this.id)">100</strong>
                  <input id="{{$docId}}-table-body-row-1-td-4-input" type="text" class="hidden" name="" value="" onfocusout="save_doc_field('{{$docId}}-table-body-row-1-td-4',this.value)">
                </td>
                <td data-label="Cts" class="table-highlight">
                  <strong id="{{$docId}}-table-body-row-1-td-5" onclick="edit_doc_field(this.id)">00</strong>
                  <input id="{{$docId}}-table-body-row-1-td-5-input" type="text" class="hidden" name="" value="" onfocusout="save_doc_field('{{$docId}}-table-body-row-1-td-5',this.value)">
                </td>
              </tr>

            </tbody>

            <tfoot id="{{$docId}}-table-foot">
              <tr>
                <td></td>
                <td colspan="2">TOTAL</td>
                <td  id="grand-total-shs" class="text-left">100</td>
                <td id="grand-total-cts" class="table-highlight text-left">00</td>
              </tr>
              <tr>
                <th></th>
                <th  colspan="3" >
                  <strong id="{{$docId}}-table-foot-note" onclick="edit_doc_field(this.id)">Accounts are due on demand</strong>
                  <input id="{{$docId}}-table-foot-note-input" type="text" class="form-control hidden" name="" value="" onfocusout="save_doc_field('{{$docId}}-table-foot-note',this.value)">
                </th>
                <th></th>
              </tr>
            </tfoot>
          </table>
        </div>

        <div class="row">
          <div class="col-md-12">
            <a href="#" class="btn btn-xs btn-default" onclick="add_table_row('{{$docId}}-table-body')"><span class="fas fa-plus-circle"></span> Row</a>
          </div>
        </div>

        <div class="footnote">

          <p onclick="edit_doc_field('{{$docId}}-foot-note-p-1')">
            <strong id="{{$docId}}-foot-note-p-1" >Prices are subject to change without prior notice.</strong>
            <textarea id="{{$docId}}-foot-note-p-1-input" class="form-control hidden" name="" onfocusout="save_doc_field('{{$docId}}-foot-note-p-1',this.value)"></textarea>
          </p>

          <div class="row inspector mt-2">
            <div class="col-xs-6">
              <p onclick="edit_doc_field('{{$docId}}-foot-note-p-2')">
                <strong id="{{$docId}}-foot-note-p-2" >Checked by:</strong>
                <input id="{{$docId}}-foot-note-p-2-input" class="form-control hidden" name="" onfocusout="save_doc_field('{{$docId}}-foot-note-p-2',this.value)"/>
              </p>
            </div>
            <div class="col-xs-6">
              <p onclick="edit_doc_field('{{$docId}}-foot-note-p-3')">
                <strong id="{{$docId}}-foot-note-p-3" >Date received:</strong>
                <input id="{{$docId}}-foot-note-p-3-input" class="form-control hidden" name="" onfocusout="save_doc_field('{{$docId}}-foot-note-p-3',this.value)"/>
              </p>
            </div>
          </div>

          <p class="mt-2" onclick="edit_doc_field('{{$docId}}-foot-note-p-4')">
            <strong id="{{$docId}}-foot-note-p-4" >Your premium supplier. Only the best</strong>
            <textarea id="{{$docId}}-foot-note-p-4-input" class="form-control hidden" name="" onfocusout="save_doc_field('{{$docId}}-foot-note-p-4',this.value)"></textarea>
          </p>
        </div>
      </div>
    </div>



  </div>
