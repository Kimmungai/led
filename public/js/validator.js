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
