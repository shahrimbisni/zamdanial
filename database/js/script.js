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
        } else if (data=='payslip1_required') {
          $("#message").html("Payslip 1 Diperlukan !").fadeIn();
        } else if (data=='payslip2_required') {
          $("#message").html("Payslip 2 Diperlukan !").fadeIn();
        } else if (data=='payslip3_required') {
          $("#message").html("Payslip 3 Diperlukan !").fadeIn();
        } else if (data=='payslip4_required') {
          $("#message").html("Payslip 4 Diperlukan !").fadeIn();
        } else if (data=='payslip5_required') {
          $("#message").html("Payslip 5 Diperlukan !").fadeIn();
        } else if (data=='payslip6_required') {
          $("#message").html("Payslip 6 Diperlukan !").fadeIn();
        } else if (data=='bank_statement') {
          $("#message").html("Bank Statement Diperlukan !").fadeIn();
        } else if (data=='penyata_kwsp') {
          $("#message").html("Penyata KWSP Diperlukan !").fadeIn();
        } else if (data=='surat_tawaran_kerja_required') {
          $("#message").html("Surat Tawaran Kerja Diperlukan !").fadeIn();
        } else if (data=='skrol_required') {
          $("#message").html("Skrol Sijil/Diploma/Ijazah Diperlukan !").fadeIn();
        } else if (data=='kad_pelajar_required') {
          $("#message").html("Kad Pelajar Diperlukan !").fadeIn();
        } else if (data=='status_penjamin_required') {
          $("#message").html("Status Penjamin Diperlukan !").fadeIn();
        } else if (data=='copy_ic_penjamin_required') {
          $("#message").html("Copy IC Penjamin Diperlukan !").fadeIn();
        } else if (data=='copy_lesen_penjamin_required') {
          $("#message").html("Copy Lesen Penjamin Diperlukan !").fadeIn();
        } else if (data=='payslip1_penjamin_required') {
          $("#message").html("Payslip 1 Penjamin Diperlukan !").fadeIn();
        } else if (data=='payslip2_penjamin_required') {
          $("#message").html("Payslip 2 Penjamin Diperlukan !").fadeIn();
        } else if (data=='payslip3_penjamin_required') {
          $("#message").html("Payslip 3 Penjamin Diperlukan !").fadeIn();
        } else if (data=='bank_statement_penjamin_required') {
          $("#message").html("Bank Statement Penjamin Diperlukan !").fadeIn();
        } else if (data=='penyata_kwsp_penjamin_required') {
          $("#message").html("Penyata KWSP Penjamin Diperlukan !").fadeIn();
        } else if (data=='payslip4_penjamin_required') {
          $("#message").html("Payslip 4 Penjamin Diperlukan !").fadeIn();
        } else if (data=='payslip5_penjamin_required') {
          $("#message").html("Payslip 5 Penjamin Diperlukan !").fadeIn();
        } else if (data=='payslip6_penjamin_required') {
          $("#message").html("Payslip 6 Penjamin Diperlukan !").fadeIn();
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