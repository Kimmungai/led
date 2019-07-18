function add_prod_to_register(id,tableID)
{
  event.preventDefault();
  var prodID = $("#"+id).data('id');

  $.post('/get-product',//send details to server
    {
      id:prodID,
      "_token": $('meta[name="csrf-token"]').attr('content'),
    },
    function(data,status){
      update_register_table(tableID,data);
    });

}

function update_register_table(tableID,product)
{
  if( !$("#sold-product-"+product.id).length )
  {
    var host_url = window.location.origin + '/';
    var tr = '<tr data-price="'+product.cost+'" data-id="'+product.id+'" id="sold-product-'+product.id+'" ><td data-name="'+product.name+'" id="name-prod-'+product.id+'"><span class="fa fa-times-circle" onclick="remove_prod(\'sold-product-'+product.id+'\',\''+tableID+'\')"></span> '+product.name+'</td><td> <input id="qty-prod-'+product.id+'" class="form-control" type="number" name="" value="1" onchange="save_cart_list(\''+tableID+'\')"> </td><td data-price="'+product.cost+'" id="price-prod-'+product.id+'">Ksh. '+product.cost.toLocaleString()+'</td></tr>';
    $("#"+tableID).append(tr);
    sum = sum_cart(tableID);
    $("#totalAmountDue").val(sum);
    $(".totalAmountDue").text(sum.toLocaleString());
    sum = "Ksh. "+sum.toLocaleString();
    $("#"+tableID+"-grand-total").text(sum);

    save_cart_list(tableID);



  }else{
    alert("item already in list");
  }
}

function save_cart_list(tableID)
{
  var salePrice = $("#totalAmountDue").val();
  var soldProds = [];

  $("#"+tableID+" tr").each(function() {
    var id = $(this).data('id');
    var name = $('#name-prod-'+id).data('name');
    var price = $('#price-prod-'+id).data('price');
    var qty = $('#qty-prod-'+id).val();
    soldProds.push({id:id,qty:qty,name:name,price:price});
  });

  $.post('/save-cart-list',//send details to server
    {
      soldProds:soldProds,
      salePrice:salePrice,
      "_token": $('meta[name="csrf-token"]').attr('content'),
    },
    function(data,status){
      //alert(data);
    });
}

function sum_cart(tableID)
{
  var sum = 0;
  $("#"+tableID+" tr").each(function() {
    sum += parseFloat($(this).data('price'));
  });
  $("#totalAmountDue").val(sum);
  return sum;
}

function remove_prod(id,tableID)
{
  $("#"+id).remove();
  sum = sum_cart(tableID);
  $("#totalAmountDue").val(sum);
  $(".totalAmountDue").text(sum.toLocaleString());
  sum = "Ksh. "+sum.toLocaleString();
  $("#"+tableID+"-grand-total").text(sum);
  save_cart_list(tableID);
}
