function upload_image(a,e,t,n,l,d="image"){if(validateImage(e,n,a)){var o=new FormData,i=$("#"+e)[0].files[0];o.append(d,i);var s=$("#"+l).val();o.append("existing_file_url",s),send_post_data("/img-tmp",o,t,l),$("#"+t).removeClass("border-red")}else $("#"+t).addClass("border-red"),alert("Invalid image file! Only jpeg and png of less than 1MB allowed!")}function send_post_data(a,e,t,n){var l=window.location.origin+"/";$.ajax({url:a,type:"post",data:e,contentType:!1,processData:!1,success:function(a){0!=a?($("#"+t).attr("src",l+a),$("#"+n).val(a)):alert("file not uploaded!")}})}
