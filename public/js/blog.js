
function add_post_attribute(action)
{
  inputVal = $("#"+action).val().toLowerCase().trim().replace(/ /g,'-').replace(/[^\w-]+/g,'');;

  if( !inputVal )
    return 0;

  newItemCount = $("#"+action+"-list li").length + 1;
  newItemId = action+'-'+newItemCount;


  var html = '<li id="'+newItemId+'">';
  html += inputVal+' ';
  html += '<span class="fa fa-times-circle" onclick="remove_post_attribute(\''+action+'\',\''+newItemId+'\')"></span>';
  html += '</li>';



  $('#blog-post-form').append('<input id="'+newItemId+'-input" type="hidden" name="'+action+'[]" value="'+inputVal+'" />');



  $("#"+action+"-list").append(html);
  $("#"+action).val('');

}

function remove_post_attribute(action, itemID)
{
  $("#"+itemID).remove();
  $("#"+itemID+"-input").remove();
}

function check_if_recored_attribute(event,action)
{
  if( event.key === "Enter" )
    add_post_attribute(action)
}
