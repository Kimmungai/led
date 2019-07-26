//function to validate image
function validateImage(id,rules,val)
{
  var reg = /(.*?)\.(jpg|bmp|jpeg|png)$/;
  var uploadedFile = document.getElementById(id);
  var fileSize = uploadedFile.files[0].size / 1024 / 1024; //size in mb

  if( val.match(reg) )
  {
    return 1;
  }

  if( fileSize > rules.size )
  {
    return 1;
  }

  return 0;
}

//function to validate email
function testEmail(val)
{
  var pattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if(!pattern.test(val))
  {

    return 0;
  }

  return 1;
}
