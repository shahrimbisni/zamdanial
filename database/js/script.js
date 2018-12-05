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
        } else if (data=='payslip1_3bulan_required') {
          $("#message").html("Payslip 1 Diperlukan !").fadeIn();
        } else if (data=='payslip2_3bulan_required') {
          $("#message").html("Payslip 2 Diperlukan !").fadeIn();
        } else if (data=='payslip3_3bulan_required') {
          $("#message").html("Payslip 3 Diperlukan !").fadeIn();
        } else if (data=='bank_statement_3bulan_required') {
          $("#message").html("Bank Statement Diperlukan !").fadeIn();
        } else if (data=='penyata_kwsp_3bulan_required') {
          $("#message").html("Penyata KWSP Diperlukan !").fadeIn();
        } else if (data=='success') {
          $("#message").html("Pendaftaran Anda Berjaya. Kami Akan Menyemak Dokumen Anda. Terima Kasih !").fadeIn();
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