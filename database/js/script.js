$(document).ready(function (e) {
  $("#form").on('submit',(function(e) {
    e.preventDefault();
    $.ajax({
      url: "ajaxupload.php",
      type: "POST",
      data:  new FormData(this),
      contentType: false,
      cache: false,
      processData:false,
      beforeSend : function()
      {
        //$("#preview").fadeOut();
        $("#message").fadeOut();
      },
      
      success: function(data)
      {
        if(data=='invalid')
        {
          // invalid file format.
          $("#message").html("Invalid File !").fadeIn();
        } else if (data=='success') {
          $("#message").html("Uploaded File Succesfully! !").fadeIn();
          $("#form")[0].reset(); 
        } else {
          // view uploaded file.
          $("#preview").html(data).fadeIn();
          $("#form")[0].reset(); 
        }
      },
      error: function(e) 
      {

        $("#message").html(e).fadeIn();
      }          
    });
 }));
});