function edit_doc_field(id)
{
  var current_val = $("#"+id).text();//grab current value

  $("#"+id+"-input").val(current_val);//display current val on onput field

  //toggle visibility
  $('#'+id).addClass('hidden');
  $('#'+id+'-input').removeClass('hidden');
}

function save_doc_field(id,new_val)
{
  var new_val = $("#"+id+"-input").val();//grab new value

  $("#"+id).text(new_val);//display new val

  //toggle visibility
  $('#'+id).removeClass('hidden');
  $('#'+id+'-input').addClass('hidden');

  //save new val to db

  //recalculate total
  get_table_total()
}

function add_table_row(tableID,type='invoice')
{
  event.preventDefault();
  var rowCount = $('#'+tableID+' tr').length;
  newRow = rowCount + 1;
  var row = row_html(newRow,tableID,type);
  $("#"+tableID).append(row);

  //recalculate total
  get_table_total(tableID);
}

function remove_table_row(rowID,tableID)
{
  prodID = $('#'+rowID).data('id');
  $("#"+rowID).remove();

  //remove id field
  $('#prod-id-field-'+prodID).val('');

  //recalculate total
  get_table_total(tableID);
}

function update_invoice(value,field,id)
{
  $.post('/update-invoice',//send details to server
    {
      value:value,
      field:field,
      id:id,
      "_token": $('meta[name="csrf-token"]').attr('content'),
    },
    function(data,status){

      //alert(data);

    });
}

function get_table_total(tableID='invoice-table-body')
{
  var total = 0;

  $('#'+tableID+' tr').each(function () {
    var shs = parseFloat($('#'+this.id+'-td-4').text());
    var cts = parseFloat($('#'+this.id+'-td-5').text()) / 100;
    var sub_total = shs + cts;
    total += sub_total;
  });

  var deci = (total - Math.floor(total)) * 100;

  $("#grand-total-shs").text(Math.floor(total));
  $("#grand-total-cts").text(deci.toFixed(0));

}

function row_html(rowCount,tableID,type)
{
  var row ='<tr id="'+tableID+'-table-body-row-'+rowCount+'">';
    row +='<td><span class="fas fa-times-circle" onclick="remove_table_row(\''+tableID+'-table-body-row-'+rowCount+'\',\''+tableID+'\')"></span>';
      row +='<strong id="'+tableID+'-table-body-row-'+rowCount+'-td-1" onclick="edit_doc_field(this.id)">Managu</strong>';
      row +='<input id="'+tableID+'-table-body-row-'+rowCount+'-td-1-input" type="text" class="hidden" name="" value="" onfocusout="save_doc_field(\''+tableID+'-table-body-row-'+rowCount+'-td-1\',this.value)">';
    row +='</td>';
    row +='<td>';
      row +='<strong id="'+tableID+'-table-body-row-'+rowCount+'-td-2" onclick="edit_doc_field(this.id)">Nyau</strong>';
      row +='<input id="'+tableID+'-table-body-row-'+rowCount+'-td-2-input" type="text" class="hidden" name="" value="" onfocusout="save_doc_field(\''+tableID+'-table-body-row-'+rowCount+'-td-2\',this.value)">';
    row +='</td>';
    row +='<td>';
      row +='<strong id="'+tableID+'-table-body-row-'+rowCount+'-td-3" onclick="edit_doc_field(this.id)">100</strong>';
      row +='<input id="'+tableID+'-table-body-row-'+rowCount+'-td-3-input" type="text" class="hidden" name="" value="" onfocusout="save_doc_field(\''+tableID+'-table-body-row-'+rowCount+'-td-3\',this.value)">';
    row +='</td>';
    if( type == 'invoice')
    {
      row +='<td>';
        row +='<strong id="'+tableID+'-table-body-row-'+rowCount+'-td-4" onclick="edit_doc_field(this.id)">100</strong>';
        row +='<input id="'+tableID+'-table-body-row-'+rowCount+'-td-4-input" type="text" class="hidden" name="" value="" onfocusout="save_doc_field(\''+tableID+'-table-body-row-'+rowCount+'-td-4\',this.value)">';
      row +='</td>';

      row +='<td class="table-highlight">';
        row +='<strong id="'+tableID+'-table-body-row-'+rowCount+'-td-5" onclick="edit_doc_field(this.id)">00</strong>';
        row +='<input id="'+tableID+'-table-body-row-'+rowCount+'-td-5-input" type="text" class="hidden" name="" value="" onfocusout="save_doc_field(\''+tableID+'-table-body-row-'+rowCount+'-td-5\',this.value)">';
      row +='</td>';
    }


  row +='</tr>';
  return row;
}
