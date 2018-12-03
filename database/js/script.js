$(document).ready(function (e) {
  $("#form").on('submit',(function(e) {
    e.preventDefault();
    $.ajax({
      url: "database/ajaxupload.php",
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
        } else if ((data=='payslip1_3bulan_required') || (data=='payslip1_6bulan_required')) {
          $("#message").html("Payslip1 is Required !").fadeIn();
        } else if ((data=='payslip2_3bulan_required') || (data=='payslip2_6bulan_required')) {
          $("#message").html("Payslip2 is Required !").fadeIn();
        } else if ((data=='payslip3_3bulan_required') || (data=='payslip3_6bulan_required')) {
          $("#message").html("Payslip3 is Required !").fadeIn();
        } else if (data=='payslip4_6bulan_required') {
          $("#message").html("Payslip4 is Required !").fadeIn();
        } else if (data=='payslip5_6bulan_required') {
          $("#message").html("Payslip5 is Required !").fadeIn();
        } else if (data=='payslip6_6bulan_required') {
          $("#message").html("Payslip6 is Required !").fadeIn();
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