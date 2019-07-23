function submit_form(id) {
  event.preventDefault();
  $("#"+id).submit();
}
function calculator_calculate()
{
  event.preventDefault();
  $("#equalsButton").click();
}

/*Click an element*/
function click_element(file_input_id,array_pos='')
{
  if( array_pos === '' ){
    $("#"+file_input_id).click()
  }
  else{
    $("#"+file_input_id)[array_pos].click()
  }
}
/*Ajax loading icons*/
$(document).ajaxStart(function(){
  $('.profile-img-loading-preview ').removeClass('hidden').removeClass('d-none');
});

$(document).ajaxStop(function(){
  $('.profile-img-loading-preview ').addClass('hidden').addClass('d-none');
});

/*Open product category*/
function open_prod_cat(type)
{
  var page = window.location.pathname;
  var host = window.location.origin;


    if( page == '/stock')
    {
      open_url(host+'/stock-type/'+type);
    }
    else
    {
      open_url(host+'/sale-stock-type/'+type);
    }



}

/*Open url*/
function open_url(url)
{
  window.open(url,'_self');
}

/*Show confrim modal*/
function confirm_modal(modalID)
{
  event.preventDefault();
  $("#"+modalID).modal();
}
/**Cards**/
$(function() {
        $('.material-card > .mc-btn-action').click(function () {
            var card = $(this).parent('.material-card');
            var icon = $(this).children('i');
            icon.addClass('fa-spin-fast');

            if (card.hasClass('mc-active')) {
                card.removeClass('mc-active');

                window.setTimeout(function() {
                    icon
                        .removeClass('fa-arrow-left')
                        .removeClass('fa-spin-fast')
                        .addClass('fa-bars');

                }, 800);
            } else {
                card.addClass('mc-active');

                window.setTimeout(function() {
                    icon
                        .removeClass('fa-bars')
                        .removeClass('fa-spin-fast')
                        .addClass('fa-arrow-left');

                }, 800);
            }
        });
    });
/*Ajax CSRF*/
$.ajaxSetup({

headers: {

  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

}

});

function calculate_balance( due )
{
  event.preventDefault();
  var received = $("#display").val();
  if( received == '' ){ received = 0;}

  var balance = parseFloat(received) - parseFloat(due);

  $("#calculator-info").removeClass();

  if( balance == 0 ){
    //no balance to give back
    $("#calculator-info").html("Amount exact!");
    $("#calculator-info").addClass('text-success');
  }else if ( balance < 0 ) {
    //debit balance to customer account
    $("#calculator-info").html("Under payment. <strong>Ksh. "+Math.abs(balance).toLocaleString()+" </strong> will be debited to customer account!");
    $("#calculator-info").addClass('text-danger');
  }else if ( balance > 0 ) {
    //credit balance to customer account
    $("#calculator-info").html("BALANCE: <strong>Ksh. "+balance.toLocaleString()+" </strong>");
    $("#calculator-info").addClass('text-success');
  }

  $("#saleBalance").val(balance);
  if( received > due )
  {
    $("#amountReceived").val(due);
  }else{
    $("#amountReceived").val(balance);
  }
  $("#save-payment-btn").attr('disabled',false);
  $(".save-payment-btn").attr('disabled',false);

}
/*Addition during selling & receiving*/
function calc_table_sum(tableID)
{
  var sum = 0;

  $("#"+tableID+" tr").each(function() {

    var prodID = $(this).data('id');
    var sub_total = parseFloat($("#cost-prod-"+prodID).val());
    sum += sub_total;
  });

  $("#total-cost").val(sum);
  $(".total-cost").html('<strong>Total:</strong> '+sum.toLocaleString("en-GB", {style: "currency", currency: "KES", minimumFractionDigits: 2}));

}

function set_payment_option(method)
{
  $('#pos-calculator').addClass('hidden');
  $('#cheque_no').addClass('hidden');
  $('#transacion_code').addClass('hidden');
  $('#user_acc').addClass('hidden');
  $('#amountReceivedField').removeClass('hidden');
  $("#save-payment-btn").attr('disabled',false);
  $(".save-payment-btn").attr('disabled',false);

  if ( method == 1 )
  {
    $('#pos-calculator').removeClass('hidden');
    $("#save-payment-btn").attr('disabled',true);
    $(".save-payment-btn").attr('disabled',true);
    $('#amountReceivedField').addClass('hidden');
  }
  else if ( method == 2 )
  {
    $('#cheque_no').removeClass('hidden');
  }
  else if ( method == 3 )
  {
    $('#transacion_code').removeClass('hidden');
  }
  else if ( method == 4 )
  {
    $('#user_acc').removeClass('hidden');
    $('#amountReceivedField').addClass('hidden');
  }
}
