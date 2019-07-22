function add_prod(prodID,tableID)
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
    var tr = '<tr data-id="'+product.id+'" id="purchased-product-'+product.id+'"><td data-name="'+product.name+'" id="name-prod-'+product.id+'" >'+product.name+'</td><td data-cost="'+product.cost+'" id="cost-prod-'+product.id+'">'+product.cost+'</td><td><input id="qty-prod-'+product.id+'" type="number" value="1" onchange="save_product_list(\''+tableID+'\')"/></td></tr>';
    $("#"+tableID).append(tr);
    //update amount owed
    var totalOwed = parseFloat($("#owed-supplier").val());
    totalOwed += product.cost;
    $("#owed-supplier").val(totalOwed);
    $(".owed-supplier").text(totalOwed.toLocaleString());
    save_product_list(tableID);

  }else{
    alert("item already in list");
  }
}

function save_product_list(tableID)
{
  var purchaseCost = $("#owed-supplier").val();
  var suppliedProds = [];

  $("#"+tableID+" tr").each(function() {
    var id = $(this).data('id');
    var image = $('#img-prod-'+id).attr('src');
    var name = $('#name-prod-'+id).data('name');
    var sku = $('#sku-prod-'+id).data('sku');
    var cost = $('#cost-prod-'+id).data('cost');
    var qty = $('#qty-prod-'+id).val();
    suppliedProds.push({id:id,qty:qty,name:name,sku:sku,image:image,cost:cost});
  });

  $.post('/save-purchase-list',//send details to server
    {
      suppliedProds:suppliedProds,
      purchaseCost:purchaseCost,
      "_token": $('meta[name="csrf-token"]').attr('content'),
    },
    function(data,status){
      //alert(data);
    });
}
