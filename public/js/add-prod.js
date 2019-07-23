/*function add_prod(prodID,tableID)
{
  event.preventDefault();

  $.post('/get-product',//send details to server
    {
      id:prodID,
      "_token": $('meta[name="csrf-token"]').attr('content'),
    },
    function(data,status){
      update_table(tableID,data);
    });
}

function update_table(tableID,product)
{
  if( !$("#purchased-product-"+product.id).length )
  {
    var host_url = window.location.origin + '/';
    var tr = '<tr data-id="'+product.id+'" id="purchased-product-'+product.id+'"><td data-name="'+product.name+'" id="name-prod-'+product.id+'" ><span class="fas fa-times-circle pointer" onclick="remove_row(\'purchased-product-'+product.id+'\')"></span> '+product.name+'</td><td data-cost="'+product.cost+'" id="cost-prod-'+product.id+'">'+product.cost+'</td><td><input id="qty-prod-'+product.id+'" type="number" value="1" onchange="save_product_list(\''+tableID+'\')"/></td></tr>';
    $("#"+tableID).append(tr);
    //update amount owed
    calc_table_sum(tableID);
    //totalOwed += product.cost;

    save_product_list(tableID);

  }else{
    alert("item already in list");
  }
}
*/
function save_product_list(tableID)
{
    var list = [];
    var errors = 0;

    $("#"+tableID+" tr").each(function() {
      var id = $(this).data('id');
      var name = $('#name-prod-'+id).data('name');
      var cost = $('#cost-prod-'+id).val();
      var qty = $('#qty-prod-'+id).val();
      if( isNaN(cost) || isNaN(qty) ){ errors += 1; }
      list.push({id:id,qty:qty,name:name,cost:cost});
    });

    if( errors ){alert("Invalid data input!");return;}

    calc_table_sum(tableID)
    var totalCost = $("#total-cost").val();

    $.post('/save-purchase-list',//send details to server
      {
        suppliedProds:list,
        purchaseCost:totalCost,
        "_token": $('meta[name="csrf-token"]').attr('content'),
      },
      function(data,status){
        //alert(data);
      });
}
