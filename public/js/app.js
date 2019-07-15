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
