function search_product(prod_cod,tableID)
{
  if( prod_cod.length > 2 )
  {
    get_prods_from_server(prod_cod,tableID);
  }
}
function get_prods_from_server(prod_cod,tableID)
{
  $.post('/search-products',//send details to server
    {
      prod_cod:prod_cod,
      "_token": $('meta[name="csrf-token"]').attr('content'),
    },
    function(data,status){

      update_results_box(data,tableID);

    });
}

function update_results_box(data,tableID)
{
  $("#results-panel-list").html('');

  if(data.length){

    for(var x = 0; x < data.length; x++)
    {
      $("#results-panel-list").append('<li onclick="update_a_table('+data[x].id+',\''+tableID+'\')" >'+data[x].name+'</li>');
    }

  }else {

    $("#results-panel-list").append('<li>No results found</li>');

  }


  $(".results-panel").removeClass('hidden');
}

function update_a_table(prodID,tableID)
{
  $.post('/get-product',//send details to server
    {
      id:prodID,
      "_token": $('meta[name="csrf-token"]').attr('content'),
    },
    function(data,status){

      var row = get_specific_table_row(data,tableID);

      if( !row ){ alert("Item already in list!");return; }

      $("#"+tableID).append(row);
      calc_table_sum(tableID);
      hide_search_results();
      save_product_list(tableID)

    });
}

function hide_search_results()
{
  $(".results-panel").addClass('hidden');
  $(".search-input").val('');
}

function remove_row(id,tableID)
{
  $("#"+id).remove();
  calc_table_sum(tableID);
  save_product_list(tableID)
}
function remove_row_and_submit(id,formID)
{
  var con = confirm("Are you sure you want to proceed?")
  if(con)
  {
    $("#"+id).remove();
    $("#"+formID).submit();
  }
}

function get_specific_table_row(data,tableID)
{
  if( tableID == 'purchased-prods')
  {
    if( !$("#purchased-product-"+data.id).length ){
      var row = '<tr data-id="'+data.id+'" id="purchased-product-'+data.id+'">';
      row += '<td data-name="'+data.name+'" id="name-prod-'+data.id+'" ><span class="fas fa-times-circle pointer" onclick="remove_row(\'purchased-product-'+data.id+'\',\''+tableID+'\')"></span> '+data.name+'</td>';
      row += '<td ><input  id="cost-prod-'+data.id+'" type="number" value="'+data.salePrice+'" onchange="save_product_list(\'purchased-prods\')"/></td>';
      row += '<td><input id="qty-prod-'+data.id+'" type="number" value="1" onchange="save_product_list(\'purchased-prods\')"/></td>';
      row += '</tr>';
      return row;
    }
    return 0;
  }
  else if( tableID == 'sold-prods' )
  {
    if( !$("#sold-product-"+data.id).length ){
      var row = '<tr data-id="'+data.id+'" id="sold-product-'+data.id+'">';
      row += '<td data-name="'+data.name+'" id="name-prod-'+data.id+'" ><span class="fas fa-times-circle pointer" onclick="remove_row(\'sold-product-'+data.id+'\',\''+tableID+'\')"></span> '+data.name+'</td>';
      row += '<td ><input  id="cost-prod-'+data.id+'" type="number" value="'+data.salePrice+'" onchange="save_product_list(\'sold-prods\')"/></td>';
      row += '<td><input id="qty-prod-'+data.id+'" type="number" value="1" onchange="save_product_list(\'sold-prods\')"/></td>';
      row += '</tr>';
      return row;
    }
  }
  else if( tableID == 'quote-table-body' )
  {
    if( !$("#quote-table-body-row-"+data.id).length ){

      var row = '<tr id="quote-table-body-row-'+data.id+'">';
        row += '<td><span class="fas fa-times-circle" onclick="remove_table_row(\'quote-table-body-row-'+data.id+'\',\'quote-table-body\')"></span>';
        row += '<strong id="quote-table-body-row-'+data.id+'-td-1" onclick="edit_doc_field(this.id)">'+data.name+'</strong>';
        row += '<input id="quote-table-body-row-'+data.id+'-td-1-input" type="text" class="hidden" name="" value="" onfocusout="save_doc_field(\'quote-table-body-row-'+data.id+'-td-1\',this.value)">';
        row += '</td>';
        row += '<td>';
        row += '<strong id="quote-table-body-row-'+data.id+'-td-2" onclick="edit_doc_field(this.id)">'+data.description+'</strong>';
        row += '<input id="quote-table-body-row-'+data.id+'-td-2-input" type="text" class="hidden" name="" value="" onfocusout="save_doc_field(\'quote-table-body-row-'+data.id+'-td-2\',this.value)">';
        row += '</td>';
        row += '<td>';
        row += '<strong id="quote-table-body-row-'+data.id+'-td-3" onclick="edit_doc_field(this.id)">'+data.salePrice+'</strong>';
        row += '<input id="quote-table-body-row-'+data.id+'-td-3-input" type="text" class="hidden" name="" value="" onfocusout="save_doc_field(\'quote-table-body-row-'+data.id+'-td-3\',this.value)">';
        row += '</td>';
      row += '</tr>';

      return row;
    }
    else if( tableID == 'stock-prods' )
    {
    }
    return 0;
  }
}
