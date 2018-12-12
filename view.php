<?php
  include_once 'database/db.php';
  $query ="SELECT * FROM uploading";  
  $result = mysqli_query($db, $query);  
?> 

 <!DOCTYPE html>  
 <html>  
      <head>  
           <link rel="icon" href="asset/images/perodua.ico">
           <title>Senarai Pelanggan</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
      </head>  
      <body>  
           <br /><br />  
           <div class="container">  
                <h3 align="center">Senarai Pelanggan MyPerodua</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="customer_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>
                                    <td>No</td>   
                                    <td>Name</td>  
                                    <td>Email</td> 
                                    <td>Telefon</td> 
                                    <td>Alamat</td>
                                    <td>Model</td> 
                                    <td>Color</td>
                                    <td>Mesej</td>
                                    <td>Status Permohonan</td>
                                    <td>Copy IC</td>
                                    <td>Copy Lesen</td>
                                    <td>Payslip1</td>
                                    <td>Payslip2</td>
                                    <td>Payslip3</td>
                                    <td>Payslip4</td>
                                    <td>Payslip5</td>
                                    <td>Payslip6</td>
                                    <td>Bank Statement</td>
                                    <td>Penyata KWSP</td>
                                    <td>Surat Tawaran Kerja</td>
                                    <td>Skrol</td>
                                    <td>Kad Pelajar</td>
                                    <td>Status Penjamin</td>
                                    <td>Copy IC Penjamin</td>
                                    <td>Copy Lesen Penjamin</td>
                                    <td>Payslip1 Penjamin</td>
                                    <td>Payslip2 Penjamin</td>
                                    <td>Payslip3 Penjamin</td>
                                    <td>Payslip4 Penjamin</td>
                                    <td>Payslip5 Penjamin</td>
                                    <td>Payslip6 Penjamin</td>
                                    <td>Bank Statement Penjamin</td>
                                    <td>Penyata KWSP Penjamin</td>
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr> 
                                    <td>'.$row["id"].'</td> 
                                    <td>'.$row["name"].'</td>  
                                    <td>'.$row["email"].'</td>  
                                    <td>'.$row["phone"].'</td> 
                                    <td>'.$row["address"].'</td>
                                    <td>'.$row["car_model"].'</td>
                                    <td>'.$row["car_color"].'</td>
                                    <td>'.$row["mesej"].'</td>
                                    <td>'.$row["status_permohonan"].'</td>
                                    <td>'."<a href='database/copy_ic/". $row["copy_ic"] ."' target='_blank'>" . 'view' ."</a>".'</td>
                                    <td>'."<a href='database/copy_lesen/". $row["copy_lesen"] ."' target='_blank'>" . 'view' ."</a>".'</td>
                                    <td>'."<a href='database/payslip1/". $row["payslip1"] ."' target='_blank'>" . ($row["payslip1"] == '-' ? '' : 'view') ."</a>".'</td>
                                    <td>'."<a href='database/payslip2/". $row["payslip2"] ."' target='_blank'>" . ($row["payslip2"] == '-' ? '' : 'view') ."</a>".'</td>
                                    <td>'."<a href='database/payslip3/". $row["payslip3"] ."' target='_blank'>" . ($row["payslip3"] == '-' ? '' : 'view') ."</a>".'</td>
                                    <td>'."<a href='database/payslip4/". $row["payslip4"] ."' target='_blank'>" . ($row["payslip4"] == '-' ? '' : 'view') ."</a>".'</td>
                                    <td>'."<a href='database/payslip5/". $row["payslip5"] ."' target='_blank'>" . ($row["payslip5"] == '-' ? '' : 'view') ."</a>".'</td>
                                    <td>'."<a href='database/payslip6/". $row["payslip6"] ."' target='_blank'>" . ($row["payslip6"] == '-' ? '' : 'view') ."</a>".'</td>
                                    <td>'."<a href='database/bank_statement/". $row["bank_statement"] ."' target='_blank'>" . ($row["bank_statement"] == '-' ? '' : 'view') ."</a>".'</td>
                                    <td>'."<a href='database/penyata_kwsp/". $row["penyata_kwsp"] ."' target='_blank'>" . ($row["penyata_kwsp"] == '-' ? '' : 'view') ."</a>".'</td>
                                    <td>'."<a href='database/surat_tawaran_kerja/". $row["surat_tawaran_kerja"] ."' target='_blank'>" . ($row["surat_tawaran_kerja"] == '-' ? '' : 'view') ."</a>".'</td>
                                    <td>'."<a href='database/skrol/". $row["skrol"] ."' target='_blank'>" . ($row["skrol"] == '-' ? '' : 'view') ."</a>".'</td>
                                    <td>'."<a href='database/kad_pelajar/". $row["kad_pelajar"] ."' target='_blank'>" . ($row["kad_pelajar"] == '-' ? '' : 'view') ."</a>".'</td>
                                    <td>'.$row["status_penjamin"].'</td>
                                    <td>'."<a href='database/penjamin_copy_ic/". $row["copy_ic_penjamin"] ."' target='_blank'>" . ($row["copy_ic_penjamin"] == '-' ? '' : 'view') ."</a>".'</td>
                                    <td>'."<a href='database/penjamin_copy_lesen/". $row["copy_lesen_penjamin"] ."' target='_blank'>" . ($row["copy_lesen_penjamin"] == '-' ? '' : 'view') ."</a>".'</td>
                                    <td>'."<a href='database/penjamin_payslip1/". $row["payslip1_penjamin"] ."' target='_blank'>" . ($row["payslip1_penjamin"] == '-' ? '' : 'view') ."</a>".'</td>
                                    <td>'."<a href='database/penjamin_payslip2/". $row["payslip2_penjamin"] ."' target='_blank'>" . ($row["payslip2_penjamin"] == '-' ? '' : 'view') ."</a>".'</td>
                                    <td>'."<a href='database/penjamin_payslip3/". $row["payslip3_penjamin"] ."' target='_blank'>" . ($row["payslip3_penjamin"] == '-' ? '' : 'view') ."</a>".'</td>
                                    <td>'."<a href='database/penjamin_payslip4/". $row["payslip4_penjamin"] ."' target='_blank'>" . ($row["payslip4_penjamin"] == '-' ? '' : 'view') ."</a>".'</td>
                                    <td>'."<a href='database/penjamin_payslip5/". $row["payslip5_penjamin"] ."' target='_blank'>" . ($row["payslip5_penjamin"] == '-' ? '' : 'view') ."</a>".'</td>
                                    <td>'."<a href='database/penjamin_payslip6/". $row["payslip6_penjamin"] ."' target='_blank'>" . ($row["payslip6_penjamin"] == '-' ? '' : 'view') ."</a>".'</td>
                                    <td>'."<a href='database/penjamin_bank_statement/". $row["bank_statement_penjamin"] ."' target='_blank'>" . ($row["bank_statement_penjamin"] == '-' ? '' : 'view') ."</a>".'</td>

                                    <td>'."<a href='database/penjamin_penyata_kwsp/". $row["penyata_kwsp_penjamin"] ."' target='_blank'>" . ($row["penyata_kwsp_penjamin"] == '-' ? '' : 'view') ."</a>".'</td>
                               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#customer_data').DataTable();  
 });  
 </script>  