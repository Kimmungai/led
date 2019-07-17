function upload_image(value,input_id,img_id,validationRules,img_url_field,image_field='image')
{
  //$("#"+img_id).addClass('border-red')
  var validatedImage = validateImage(input_id,validationRules,value);
  if( validatedImage ){
    //send to server
    var fd = new FormData();
    var files = $('#'+input_id)[0].files[0];
    fd.append(image_field,files);
    var existing_file_url = $('#'+img_url_field).val();
    fd.append('existing_file_url',existing_file_url);
    send_post_data('/img-tmp',fd,img_id,img_url_field);
    $("#"+img_id).removeClass('border-red');

  }else {
    //report error
    $("#"+img_id).addClass('border-red');
    alert("Invalid image file! Only jpeg and png of less than 1MB allowed!")
  }
}

function send_post_data(route,fd,img_id,img_url_field)
{
   var host_url = window.location.origin + '/';
    $.ajax({
          url: route,
          type: 'post',
          data: fd,
          contentType: false,
          processData: false,
          success: function(response){
            
              if(response != 0){
                  $("#"+img_id).attr("src",host_url+response);
                  $("#"+img_url_field).val(response);
              }else{
                  alert('file not uploaded!');
              }
          },
      });

}
