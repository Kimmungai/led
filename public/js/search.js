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

      $("#"+tableID).append(row);
      hide_search_results();

    });
}

function hide_search_results()
{
  $(".results-panel").addClass('hidden');
  $(".search-input").val('');
}

function remove_row(id)
{
  $("#"+id).remove();
}

function get_specific_table_row(data,tableID)
{
  if( tableID == 'purchased-prods')
  {
    var row = '<tr data-id="'+data.id+'" id="purchased-product-'+data.id+'">';
    row += '<td data-name="'+data.name+'" id="name-prod-'+data.id+'" ><span class="fas fa-times-circle pointer" onclick="remove_row(\'purchased-product-'+data.id+'\')"></span> '+data.name+'</td>';
    row += '<td data-cost="'+data.cost+'" id="cost-prod-'+data.id+'">'+data.cost+'</td>';
    row += '<td><input id="qty-prod-'+data.id+'" type="number" value="1" onchange="save_product_list(\'purchased-prods\')"/></td>';
    row += '</tr>';
    return row;
  }
}
