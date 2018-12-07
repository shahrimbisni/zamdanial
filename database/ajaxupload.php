<?php

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions

$path1 = 'copy_ic/'; // upload directory
$path2 = 'copy_lesen/'; // upload directory
$path3 = 'payslip1/'; // upload directory
$path4 = 'payslip2/'; // upload directory
$path5 = 'payslip3/'; // upload directory
$path6 = 'bank_statement/'; // upload directory
$path7 = 'penyata_kwsp/'; // upload directory
$path8 = 'payslip4/'; // upload directory
$path9 = 'payslip5/'; // upload directory
$path10 = 'payslip6/'; // upload directory
$path11 = 'surat_tawaran_kerja/'; // upload directory
$path12 = 'skrol/'; // upload directory
$path13 = 'kad_pelajar/'; // upload directory
$path14 = 'penjamin_copy_ic/'; // upload directory
$path15 = 'penjamin_copy_lesen/'; // upload directory
$path16 = 'penjamin_payslip1/'; // upload directory
$path17 = 'penjamin_payslip2/'; // upload directory
$path18 = 'penjamin_payslip3/'; // upload directory
$path19 = 'penjamin_bank_statement/'; // upload directory
$path20 = 'penjamin_penyata_kwsp/'; // upload directory
$path21 = 'penjamin_payslip4/'; // upload directory
$path22 = 'penjamin_payslip5/'; // upload directory
$path23 = 'penjamin_payslip6/'; // upload directory

$status_permohonan = $_POST['status_permohonan'];

switch ($status_permohonan) {
    case "gaji_tetap":
        if ($_FILES['payslip1_3bulan']['error'] > 0) { 
	    	echo 'payslip1_required';
		} else if ($_FILES['payslip2_3bulan']['error'] > 0) {
			echo 'payslip2_required';
		} else if ($_FILES['payslip3_3bulan']['error'] > 0) {
			echo 'payslip3_required';
		} else if ($_FILES['bank_statement_3bulan']['error'] > 0) {
			echo 'bank_statement';
		} else if ($_FILES['penyata_kwsp_3bulan']['error'] > 0) {
			echo 'penyata_kwsp';
		} else {
			$copy_ic = $_FILES['copy_ic']['name'];
			$tmp_copy_ic = $_FILES['copy_ic']['tmp_name'];

			$copy_lesen = $_FILES['copy_lesen']['name'];
			$tmp_copy_lesen = $_FILES['copy_lesen']['tmp_name'];

			$payslip1_3bulan = $_FILES['payslip1_3bulan']['name'];
			$tmp_payslip1_3bulan = $_FILES['payslip1_3bulan']['tmp_name'];

			$payslip2_3bulan = $_FILES['payslip2_3bulan']['name'];
			$tmp_payslip2_3bulan = $_FILES['payslip2_3bulan']['tmp_name'];

			$payslip3_3bulan = $_FILES['payslip3_3bulan']['name'];
			$tmp_payslip3_3bulan = $_FILES['payslip3_3bulan']['tmp_name'];

			$bank_statement_3bulan = $_FILES['bank_statement_3bulan']['name'];
			$tmp_bank_statement_3bulan = $_FILES['bank_statement_3bulan']['tmp_name'];

			$penyata_kwsp_3bulan = $_FILES['penyata_kwsp_3bulan']['name'];
			$tmp_penyata_kwsp_3bulan = $_FILES['penyata_kwsp_3bulan']['tmp_name'];


			// get uploaded file's extension
			$ext_copy_ic = strtolower(pathinfo($copy_ic, PATHINFO_EXTENSION));
			$ext_copy_lesen = strtolower(pathinfo($copy_lesen, PATHINFO_EXTENSION));
			$ext_payslip1_3bulan = strtolower(pathinfo($payslip1_3bulan, PATHINFO_EXTENSION));
			$ext_payslip2_3bulan = strtolower(pathinfo($payslip2_3bulan, PATHINFO_EXTENSION));
			$ext_payslip3_3bulan = strtolower(pathinfo($payslip3_3bulan, PATHINFO_EXTENSION));
			$ext_bank_statement_3bulan = strtolower(pathinfo($bank_statement_3bulan, PATHINFO_EXTENSION));
			$ext_penyata_kwsp_3bulan = strtolower(pathinfo($penyata_kwsp_3bulan, PATHINFO_EXTENSION));

			// can upload same image using rand function
			$copy_ic = rand(1000,1000000).$copy_ic;
			$copy_lesen = rand(1000,1000000).$copy_lesen;
			$payslip1_3bulan = rand(1000,1000000).$payslip1_3bulan;
			$payslip2_3bulan = rand(1000,1000000).$payslip2_3bulan;
			$payslip3_3bulan = rand(1000,1000000).$payslip3_3bulan;
			$bank_statement_3bulan = rand(1000,1000000).$bank_statement_3bulan;
			$penyata_kwsp_3bulan = rand(1000,1000000).$penyata_kwsp_3bulan;

			// check's valid format
			if((in_array($ext_copy_ic, $valid_extensions)) && (in_array($ext_copy_lesen, $valid_extensions)) && (in_array($ext_payslip1_3bulan, $valid_extensions)) && (in_array($ext_payslip2_3bulan, $valid_extensions)) && (in_array($ext_payslip3_3bulan, $valid_extensions)) && (in_array($ext_bank_statement_3bulan, $valid_extensions)) && (in_array($ext_penyata_kwsp_3bulan, $valid_extensions)))
			{	 
				$path1 = $path1.strtolower($copy_ic); 
				$path2 = $path2.strtolower($copy_lesen);
				$path3 = $path3.strtolower($payslip1_3bulan);
				$path4 = $path4.strtolower($payslip2_3bulan);
				$path5 = $path5.strtolower($payslip3_3bulan);
				$path6 = $path6.strtolower($bank_statement_3bulan);
				$path7 = $path7.strtolower($penyata_kwsp_3bulan);

				$copy_ic = strtolower($copy_ic); 
				$copy_lesen = strtolower($copy_lesen); 
				$copy_payslip1_3bulan = strtolower($payslip1_3bulan); 
				$copy_payslip2_3bulan = strtolower($payslip2_3bulan); 
				$copy_payslip3_3bulan = strtolower($payslip3_3bulan); 
				$copy_bank_statement_3bulan = strtolower($bank_statement_3bulan); 
				$copy_penyata_kwsp_3bulan = strtolower($penyata_kwsp_3bulan); 

				if((move_uploaded_file($tmp_copy_ic,$path1)) && (move_uploaded_file($tmp_copy_lesen,$path2)) && (move_uploaded_file($tmp_payslip1_3bulan,$path3)) && (move_uploaded_file($tmp_payslip2_3bulan,$path4)) && (move_uploaded_file($tmp_payslip3_3bulan,$path5)) && (move_uploaded_file($tmp_bank_statement_3bulan,$path6)) && (move_uploaded_file($tmp_penyata_kwsp_3bulan,$path7)))
				{
				// echo "Uploaded file Succesfully!";
				$name = $_POST['name'];
				$email = $_POST['email'];
				$phone = $_POST['phone'];
				$address = $_POST['address'];

				if(!empty($_POST['mesej'])) {
					$mesej = $_POST['mesej'];
				} else {
					$mesej = "-";
				}
			
				$car_model = $_POST['car_model'];
				$car_color = $_POST['car_color'];
				$status_permohonan = $_POST['status_permohonan'];

				//sent email notification
				if(isset($_POST['email'])) {

				    $email_to = "shahrimbisni@gmail.com";
				    $email_subject = "New Application Form";
			 
				    function died($error) {
				        // your error code can go here
				        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
				        echo "These errors appear below.<br /><br />";
				        echo $error."<br /><br />";
				        echo "Please go back and fix these errors.<br /><br />";
				        die();
				    }		  
			 
				    $email_message = "Form details below.\n\n";
			     
				    function clean_string($string) {
				      $bad = array("content-type","bcc:","to:","cc:","href");
				      return str_replace($bad,"",$string);
				    }

				    $email_message .= "Name: ".clean_string($name)."\n";
				    $email_message .= "Email: ".clean_string($email)."\n";
				    $email_message .= "Phone: ".clean_string($phone)."\n";
				    $email_message .= "Address: ".clean_string($address)."\n";
				    $email_message .= "Message: ".clean_string($mesej)."\n";
				    $email_message .= "Car Model: ".clean_string($car_model)."\n";
				    $email_message .= "Car Color: ".clean_string($car_color)."\n";
				    $email_message .= "Application Status: ".clean_string($status_permohonan)."\n";
			 
					// create email headers
					$headers = 'From: '.$email."\r\n".
					'Reply-To: '.$email."\r\n" .
					'X-Mailer: PHP/' . phpversion();
					@mail($email_to, $email_subject, $email_message, $headers);
				}

				//include database configuration file
				include_once 'db.php';

				//insert form data in the database
				$insert = $db->query("INSERT uploading (name,email,phone,address,car_model,car_color,mesej,copy_ic,copy_lesen,status_permohonan,payslip1,payslip2,payslip3,payslip4,payslip5,payslip6,bank_statement,penyata_kwsp,surat_tawaran_kerja,skrol,kad_pelajar,status_penjamin,copy_ic_penjamin,copy_lesen_penjamin,payslip1_penjamin,payslip2_penjamin,payslip3_penjamin,payslip4_penjamin,payslip5_penjamin,payslip6_penjamin,bank_statement_penjamin,penyata_kwsp_penjamin) VALUES ('".$name."','".$email."','".$phone."','".$address."','".$car_model."','".$car_color."','".$mesej."','".$copy_ic."','".$copy_lesen."','".$status_permohonan."','".$payslip1_3bulan."','".$payslip2_3bulan."','".$payslip3_3bulan."','-','-','-','".$bank_statement_3bulan."','".$penyata_kwsp_3bulan."','-','-','-','-','-','-','-','-','-','-','-','-','-','-')");

				//echo $insert?'ok':'err';
				echo 'success';
				}
			} 
			else 
			{
				echo 'invalid';
			}
		}
        break;
    case "gaji_tak_tetap":
        if ($_FILES['payslip1_6bulan']['error'] > 0) { 
	    	echo 'payslip1_required';
		} else if ($_FILES['payslip2_6bulan']['error'] > 0) {
			echo 'payslip2_required';
		} else if ($_FILES['payslip3_6bulan']['error'] > 0) {
			echo 'payslip3_required';
		} else if ($_FILES['payslip4_6bulan']['error'] > 0) {
			echo 'payslip4_required';
		} else if ($_FILES['payslip5_6bulan']['error'] > 0) {
			echo 'payslip5_required';
		} else if ($_FILES['payslip6_6bulan']['error'] > 0) {
			echo 'payslip6_required';
		} else if ($_FILES['bank_statement_6bulan']['error'] > 0) {
			echo 'bank_statement';
		} else if ($_FILES['penyata_kwsp_6bulan']['error'] > 0) {
			echo 'penyata_kwsp';
		} else {
			$copy_ic = $_FILES['copy_ic']['name'];
			$tmp_copy_ic = $_FILES['copy_ic']['tmp_name'];

			$copy_lesen = $_FILES['copy_lesen']['name'];
			$tmp_copy_lesen = $_FILES['copy_lesen']['tmp_name'];

			$payslip1_6bulan = $_FILES['payslip1_6bulan']['name'];
			$tmp_payslip1_6bulan = $_FILES['payslip1_6bulan']['tmp_name'];

			$payslip2_6bulan = $_FILES['payslip2_6bulan']['name'];
			$tmp_payslip2_6bulan = $_FILES['payslip2_6bulan']['tmp_name'];

			$payslip3_6bulan = $_FILES['payslip3_6bulan']['name'];
			$tmp_payslip3_6bulan = $_FILES['payslip3_6bulan']['tmp_name'];

			$payslip4_6bulan = $_FILES['payslip4_6bulan']['name'];
			$tmp_payslip4_6bulan = $_FILES['payslip4_6bulan']['tmp_name'];

			$payslip5_6bulan = $_FILES['payslip5_6bulan']['name'];
			$tmp_payslip5_6bulan = $_FILES['payslip5_6bulan']['tmp_name'];

			$payslip6_6bulan = $_FILES['payslip6_6bulan']['name'];
			$tmp_payslip6_6bulan = $_FILES['payslip6_6bulan']['tmp_name'];

			$bank_statement_6bulan = $_FILES['bank_statement_6bulan']['name'];
			$tmp_bank_statement_6bulan = $_FILES['bank_statement_6bulan']['tmp_name'];

			$penyata_kwsp_6bulan = $_FILES['penyata_kwsp_6bulan']['name'];
			$tmp_penyata_kwsp_6bulan = $_FILES['penyata_kwsp_6bulan']['tmp_name'];

			// get uploaded file's extension
			$ext_copy_ic = strtolower(pathinfo($copy_ic, PATHINFO_EXTENSION));
			$ext_copy_lesen = strtolower(pathinfo($copy_lesen, PATHINFO_EXTENSION));
			$ext_payslip1_6bulan = strtolower(pathinfo($payslip1_6bulan, PATHINFO_EXTENSION));
			$ext_payslip2_6bulan = strtolower(pathinfo($payslip2_6bulan, PATHINFO_EXTENSION));
			$ext_payslip3_6bulan = strtolower(pathinfo($payslip3_6bulan, PATHINFO_EXTENSION));
			$ext_payslip4_6bulan = strtolower(pathinfo($payslip4_6bulan, PATHINFO_EXTENSION));
			$ext_payslip5_6bulan = strtolower(pathinfo($payslip5_6bulan, PATHINFO_EXTENSION));
			$ext_payslip6_6bulan = strtolower(pathinfo($payslip6_6bulan, PATHINFO_EXTENSION));
			$ext_bank_statement_6bulan = strtolower(pathinfo($bank_statement_6bulan, PATHINFO_EXTENSION));
			$ext_penyata_kwsp_6bulan = strtolower(pathinfo($penyata_kwsp_6bulan, PATHINFO_EXTENSION));

			// can upload same image using rand function
			$copy_ic = rand(1000,1000000).$copy_ic;
			$copy_lesen = rand(1000,1000000).$copy_lesen;
			$payslip1_6bulan = rand(1000,1000000).$payslip1_6bulan;
			$payslip2_6bulan = rand(1000,1000000).$payslip2_6bulan;
			$payslip3_6bulan = rand(1000,1000000).$payslip3_6bulan;
			$payslip4_6bulan = rand(1000,1000000).$payslip4_6bulan;
			$payslip5_6bulan = rand(1000,1000000).$payslip5_6bulan;
			$payslip6_6bulan = rand(1000,1000000).$payslip6_6bulan;
			$bank_statement_6bulan = rand(1000,1000000).$bank_statement_6bulan;
			$penyata_kwsp_6bulan = rand(1000,1000000).$penyata_kwsp_6bulan;

			// check's valid format
			if((in_array($ext_copy_ic, $valid_extensions)) && (in_array($ext_copy_lesen, $valid_extensions)) && (in_array($ext_payslip1_6bulan, $valid_extensions)) && (in_array($ext_payslip2_6bulan, $valid_extensions)) && (in_array($ext_payslip3_6bulan, $valid_extensions)) && (in_array($ext_payslip4_6bulan, $valid_extensions)) && (in_array($ext_payslip5_6bulan, $valid_extensions)) && (in_array($ext_payslip6_6bulan, $valid_extensions)) && (in_array($ext_bank_statement_6bulan, $valid_extensions)) && (in_array($ext_penyata_kwsp_6bulan, $valid_extensions)))
			{	 
				$path1 = $path1.strtolower($copy_ic); 
				$path2 = $path2.strtolower($copy_lesen);
				$path3 = $path3.strtolower($payslip1_6bulan);
				$path4 = $path4.strtolower($payslip2_6bulan);
				$path5 = $path5.strtolower($payslip3_6bulan);
				$path6 = $path6.strtolower($bank_statement_6bulan);
				$path7 = $path7.strtolower($penyata_kwsp_6bulan);
				$path8 = $path8.strtolower($payslip4_6bulan);
				$path9 = $path9.strtolower($payslip5_6bulan);
				$path10 = $path10.strtolower($payslip6_6bulan);

				$copy_ic = strtolower($copy_ic); 
				$copy_lesen = strtolower($copy_lesen); 
				$copy_payslip1_6bulan = strtolower($payslip1_6bulan); 
				$copy_payslip2_6bulan = strtolower($payslip2_6bulan); 
				$copy_payslip3_6bulan = strtolower($payslip3_6bulan); 
				$copy_bank_statement_6bulan = strtolower($bank_statement_6bulan); 
				$copy_penyata_kwsp_6bulan = strtolower($penyata_kwsp_6bulan);
				$copy_payslip4_6bulan = strtolower($payslip4_6bulan); 
				$copy_payslip5_6bulan = strtolower($payslip5_6bulan); 
				$copy_payslip6_6bulan = strtolower($payslip6_6bulan);

				if((move_uploaded_file($tmp_copy_ic,$path1)) && (move_uploaded_file($tmp_copy_lesen,$path2)) && (move_uploaded_file($tmp_payslip1_6bulan,$path3)) && (move_uploaded_file($tmp_payslip2_6bulan,$path4)) && (move_uploaded_file($tmp_payslip3_6bulan,$path5)) && (move_uploaded_file($tmp_bank_statement_6bulan,$path6)) && (move_uploaded_file($tmp_penyata_kwsp_6bulan,$path7)) && (move_uploaded_file($tmp_payslip4_6bulan,$path8)) && (move_uploaded_file($tmp_payslip5_6bulan,$path9)) && (move_uploaded_file($tmp_payslip6_6bulan,$path10)))
				{
				// echo "Uploaded file Succesfully!";
				$name = $_POST['name'];
				$email = $_POST['email'];
				$phone = $_POST['phone'];
				$address = $_POST['address'];

				if(!empty($_POST['mesej'])) {
					$mesej = $_POST['mesej'];
				} else {
					$mesej = "-";
				}
			
				$car_model = $_POST['car_model'];
				$car_color = $_POST['car_color'];
				$status_permohonan = $_POST['status_permohonan'];

				//sent email notification
				if(isset($_POST['email'])) {

				    $email_to = "shahrimbisni@gmail.com";
				    $email_subject = "New Application Form";
			 
				    function died($error) {
				        // your error code can go here
				        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
				        echo "These errors appear below.<br /><br />";
				        echo $error."<br /><br />";
				        echo "Please go back and fix these errors.<br /><br />";
				        die();
				    }		  
			 
				    $email_message = "Form details below.\n\n";
			     
				    function clean_string($string) {
				      $bad = array("content-type","bcc:","to:","cc:","href");
				      return str_replace($bad,"",$string);
				    }

				    $email_message .= "Name: ".clean_string($name)."\n";
				    $email_message .= "Email: ".clean_string($email)."\n";
				    $email_message .= "Phone: ".clean_string($phone)."\n";
				    $email_message .= "Address: ".clean_string($address)."\n";
				    $email_message .= "Message: ".clean_string($mesej)."\n";
				    $email_message .= "Car Model: ".clean_string($car_model)."\n";
				    $email_message .= "Car Color: ".clean_string($car_color)."\n";
				    $email_message .= "Application Status: ".clean_string($status_permohonan)."\n";
			 
					// create email headers
					$headers = 'From: '.$email."\r\n".
					'Reply-To: '.$email."\r\n" .
					'X-Mailer: PHP/' . phpversion();
					@mail($email_to, $email_subject, $email_message, $headers);
				}

				//include database configuration file
				include_once 'db.php';

				//insert form data in the database
				$insert = $db->query("INSERT uploading (name,email,phone,address,car_model,car_color,mesej,copy_ic,copy_lesen,status_permohonan,payslip1,payslip2,payslip3,payslip4,payslip5,payslip6,bank_statement,penyata_kwsp,surat_tawaran_kerja,skrol,kad_pelajar,status_penjamin,copy_ic_penjamin,copy_lesen_penjamin,payslip1_penjamin,payslip2_penjamin,payslip3_penjamin,payslip4_penjamin,payslip5_penjamin,payslip6_penjamin,bank_statement_penjamin,penyata_kwsp_penjamin) VALUES ('".$name."','".$email."','".$phone."','".$address."','".$car_model."','".$car_color."','".$mesej."','".$copy_ic."','".$copy_lesen."','".$status_permohonan."','".$payslip1_6bulan."','".$payslip2_6bulan."','".$payslip3_6bulan."','".$payslip4_6bulan."','".$payslip5_6bulan."','".$payslip6_6bulan."','".$bank_statement_6bulan."','".$penyata_kwsp_6bulan."','-','-','-','-','-','-','-','-','-','-','-','-','-','-')");

				//echo $insert?'ok':'err';
				echo 'success';
				}
			} 
			else 
			{
				echo 'invalid';
			}
		}
        break;
    case "graduate_baru_kerja":
        if ($_FILES['surat_tawaran_kerja']['error'] > 0) { 
	    	echo 'surat_tawaran_kerja_required';
		} else if ($_FILES['skrol']['error'] > 0) {
			echo 'skrol_required';
		} else {
			$copy_ic = $_FILES['copy_ic']['name'];
			$tmp_copy_ic = $_FILES['copy_ic']['tmp_name'];

			$copy_lesen = $_FILES['copy_lesen']['name'];
			$tmp_copy_lesen = $_FILES['copy_lesen']['tmp_name'];

			$surat_tawaran_kerja = $_FILES['surat_tawaran_kerja']['name'];
			$tmp_surat_tawaran_kerja = $_FILES['surat_tawaran_kerja']['tmp_name'];

			$skrol = $_FILES['skrol']['name'];
			$tmp_skrol = $_FILES['skrol']['tmp_name'];

			// get uploaded file's extension
			$ext_copy_ic = strtolower(pathinfo($copy_ic, PATHINFO_EXTENSION));
			$ext_copy_lesen = strtolower(pathinfo($copy_lesen, PATHINFO_EXTENSION));
			$ext_surat_tawaran_kerja = strtolower(pathinfo($surat_tawaran_kerja, PATHINFO_EXTENSION));
			$ext_skrol = strtolower(pathinfo($skrol, PATHINFO_EXTENSION));

			// can upload same image using rand function
			$copy_ic = rand(1000,1000000).$copy_ic;
			$copy_lesen = rand(1000,1000000).$copy_lesen;
			$surat_tawaran_kerja = rand(1000,1000000).$surat_tawaran_kerja;
			$skrol = rand(1000,1000000).$skrol;

			// check's valid format
			if((in_array($ext_copy_ic, $valid_extensions)) && (in_array($ext_copy_lesen, $valid_extensions)) && (in_array($ext_surat_tawaran_kerja, $valid_extensions)) && (in_array($ext_skrol, $valid_extensions)))
			{	 
				$path1 = $path1.strtolower($copy_ic); 
				$path2 = $path2.strtolower($copy_lesen);
				$path11 = $path11.strtolower($surat_tawaran_kerja);
				$path12 = $path12.strtolower($skrol);

				$copy_ic = strtolower($copy_ic); 
				$copy_lesen = strtolower($copy_lesen); 
				$surat_tawaran_kerja = strtolower($surat_tawaran_kerja); 
				$skrol = strtolower($skrol); 

				if((move_uploaded_file($tmp_copy_ic,$path1)) && (move_uploaded_file($tmp_copy_lesen,$path2)) && (move_uploaded_file($tmp_surat_tawaran_kerja,$path11)) && (move_uploaded_file($tmp_skrol,$path12)))
				{
				// echo "Uploaded file Succesfully!";
				$name = $_POST['name'];
				$email = $_POST['email'];
				$phone = $_POST['phone'];
				$address = $_POST['address'];

				if(!empty($_POST['mesej'])) {
					$mesej = $_POST['mesej'];
				} else {
					$mesej = "-";
				}
			
				$car_model = $_POST['car_model'];
				$car_color = $_POST['car_color'];
				$status_permohonan = $_POST['status_permohonan'];

				//sent email notification
				if(isset($_POST['email'])) {

				    $email_to = "shahrimbisni@gmail.com";
				    $email_subject = "New Application Form";
			 
				    function died($error) {
				        // your error code can go here
				        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
				        echo "These errors appear below.<br /><br />";
				        echo $error."<br /><br />";
				        echo "Please go back and fix these errors.<br /><br />";
				        die();
				    }		  
			 
				    $email_message = "Form details below.\n\n";
			     
				    function clean_string($string) {
				      $bad = array("content-type","bcc:","to:","cc:","href");
				      return str_replace($bad,"",$string);
				    }

				    $email_message .= "Name: ".clean_string($name)."\n";
				    $email_message .= "Email: ".clean_string($email)."\n";
				    $email_message .= "Phone: ".clean_string($phone)."\n";
				    $email_message .= "Address: ".clean_string($address)."\n";
				    $email_message .= "Message: ".clean_string($mesej)."\n";
				    $email_message .= "Car Model: ".clean_string($car_model)."\n";
				    $email_message .= "Car Color: ".clean_string($car_color)."\n";
				    $email_message .= "Application Status: ".clean_string($status_permohonan)."\n";
			 
					// create email headers
					$headers = 'From: '.$email."\r\n".
					'Reply-To: '.$email."\r\n" .
					'X-Mailer: PHP/' . phpversion();
					@mail($email_to, $email_subject, $email_message, $headers);
				}

				//include database configuration file
				include_once 'db.php';

				//insert form data in the database
				$insert = $db->query("INSERT uploading (name,email,phone,address,car_model,car_color,mesej,copy_ic,copy_lesen,status_permohonan,payslip1,payslip2,payslip3,payslip4,payslip5,payslip6,bank_statement,penyata_kwsp,surat_tawaran_kerja,skrol,kad_pelajar,status_penjamin,copy_ic_penjamin,copy_lesen_penjamin,payslip1_penjamin,payslip2_penjamin,payslip3_penjamin,payslip4_penjamin,payslip5_penjamin,payslip6_penjamin,bank_statement_penjamin,penyata_kwsp_penjamin) VALUES ('".$name."','".$email."','".$phone."','".$address."','".$car_model."','".$car_color."','".$mesej."','".$copy_ic."','".$copy_lesen."','".$status_permohonan."','-','-','-','-','-','-','-','-','".$surat_tawaran_kerja."','".$skrol."','-','-','-','-','-','-','-','-','-','-','-','-')");

				//echo $insert?'ok':'err';
				echo 'success';
				}
			} 
			else 
			{
				echo 'invalid';
			}
		}
        break;
    case "graduate_masih_belajar":
        if ($_FILES['kad_pelajar']['error'] > 0) { 
	    	echo 'kad_pelajar_required';
		} else if (empty($_POST['status_penjamin'])) {
			echo 'status_penjamin_required';
		} else if (($_POST['status_penjamin'])) {
			switch (($_POST['status_penjamin'])) {
				case 'penjamin_gaji_tetap':
					if ($_FILES['copy_ic_penjamin']['error'] > 0) {
						echo 'copy_ic_penjamin_required';
					} else if ($_FILES['copy_lesen_penjamin']['error'] > 0) {
						echo 'copy_lesen_penjamin_required';
					} else if ($_FILES['payslip1_penjamin_3bulan']['error'] > 0) {
						echo 'payslip1_penjamin_required';
					} else if ($_FILES['payslip2_penjamin_3bulan']['error'] > 0) {
						echo 'payslip2_penjamin_required';
					} else if ($_FILES['payslip3_penjamin_3bulan']['error'] > 0) {
						echo 'payslip3_penjamin_required';
					} else if ($_FILES['bank_statement_penjamin_3bulan']['error'] > 0) {
						echo 'bank_statement_penjamin_required';
					} else if ($_FILES['penyata_kwsp_penjamin_3bulan']['error'] > 0) {
						echo 'penyata_kwsp_penjamin_required';
					} else {
						$copy_ic = $_FILES['copy_ic']['name'];
						$tmp_copy_ic = $_FILES['copy_ic']['tmp_name'];

						$copy_lesen = $_FILES['copy_lesen']['name'];
						$tmp_copy_lesen = $_FILES['copy_lesen']['tmp_name'];

						$kad_pelajar = $_FILES['kad_pelajar']['name'];
						$tmp_kad_pelajar = $_FILES['kad_pelajar']['tmp_name'];

						$copy_ic_penjamin = $_FILES['copy_ic_penjamin']['name'];
						$tmp_copy_ic_penjamin = $_FILES['copy_ic_penjamin']['tmp_name'];

						$copy_lesen_penjamin = $_FILES['copy_lesen_penjamin']['name'];
						$tmp_copy_lesen_penjamin = $_FILES['copy_lesen_penjamin']['tmp_name'];

						$payslip1_penjamin_3bulan = $_FILES['payslip1_penjamin_3bulan']['name'];
						$tmp_payslip1_penjamin_3bulan = $_FILES['payslip1_penjamin_3bulan']['tmp_name'];

						$payslip2_penjamin_3bulan = $_FILES['payslip2_penjamin_3bulan']['name'];
						$tmp_payslip2_penjamin_3bulan = $_FILES['payslip2_penjamin_3bulan']['tmp_name'];

						$payslip3_penjamin_3bulan = $_FILES['payslip3_penjamin_3bulan']['name'];
						$tmp_payslip3_penjamin_3bulan = $_FILES['payslip3_penjamin_3bulan']['tmp_name'];

						$bank_statement_penjamin_3bulan = $_FILES['bank_statement_penjamin_3bulan']['name'];
						$tmp_bank_statement_penjamin_3bulan = $_FILES['bank_statement_penjamin_3bulan']['tmp_name'];

						$penyata_kwsp_penjamin_3bulan = $_FILES['penyata_kwsp_penjamin_3bulan']['name'];
						$tmp_penyata_kwsp_penjamin_3bulan = $_FILES['penyata_kwsp_penjamin_3bulan']['tmp_name'];

						// get uploaded file's extension
						$ext_copy_ic = strtolower(pathinfo($copy_ic, PATHINFO_EXTENSION));
						$ext_copy_lesen = strtolower(pathinfo($copy_lesen, PATHINFO_EXTENSION));
						$ext_kad_pelajar = strtolower(pathinfo($kad_pelajar, PATHINFO_EXTENSION));
						$ext_copy_ic_penjamin = strtolower(pathinfo($copy_ic_penjamin, PATHINFO_EXTENSION));
						$ext_copy_lesen_penjamin = strtolower(pathinfo($copy_lesen_penjamin, PATHINFO_EXTENSION));
						$ext_payslip1_penjamin_3bulan = strtolower(pathinfo($payslip1_penjamin_3bulan, PATHINFO_EXTENSION));
						$ext_payslip2_penjamin_3bulan = strtolower(pathinfo($payslip2_penjamin_3bulan, PATHINFO_EXTENSION));
						$ext_payslip3_penjamin_3bulan = strtolower(pathinfo($payslip3_penjamin_3bulan, PATHINFO_EXTENSION));
						$ext_bank_statement_penjamin_3bulan = strtolower(pathinfo($bank_statement_penjamin_3bulan, PATHINFO_EXTENSION));
						$ext_penyata_kwsp_penjamin_3bulan = strtolower(pathinfo($penyata_kwsp_penjamin_3bulan, PATHINFO_EXTENSION));

						// can upload same image using rand function
						$copy_ic = rand(1000,1000000).$copy_ic;
						$copy_lesen = rand(1000,1000000).$copy_lesen;
						$kad_pelajar = rand(1000,1000000).$kad_pelajar;
						$copy_ic_penjamin = rand(1000,1000000).$copy_ic_penjamin;
						$copy_lesen_penjamin = rand(1000,1000000).$copy_lesen_penjamin;
						$payslip1_penjamin_3bulan = rand(1000,1000000).$payslip1_penjamin_3bulan;
						$payslip2_penjamin_3bulan = rand(1000,1000000).$payslip2_penjamin_3bulan;
						$payslip3_penjamin_3bulan = rand(1000,1000000).$payslip3_penjamin_3bulan;
						$bank_statement_penjamin_3bulan = rand(1000,1000000).$bank_statement_penjamin_3bulan;
						$penyata_kwsp_penjamin_3bulan = rand(1000,1000000).$penyata_kwsp_penjamin_3bulan;

						// check's valid format
						if((in_array($ext_copy_ic, $valid_extensions)) && (in_array($ext_copy_lesen, $valid_extensions)) && (in_array($ext_kad_pelajar, $valid_extensions)) && (in_array($ext_copy_ic_penjamin, $valid_extensions)) && (in_array($ext_copy_lesen_penjamin, $valid_extensions)) && (in_array($ext_payslip1_penjamin_3bulan, $valid_extensions)) && (in_array($ext_payslip2_penjamin_3bulan, $valid_extensions)) && (in_array($ext_payslip3_penjamin_3bulan, $valid_extensions)) && (in_array($ext_bank_statement_penjamin_3bulan, $valid_extensions)) && (in_array($ext_penyata_kwsp_penjamin_3bulan, $valid_extensions)))
						{	 
							$path1 = $path1.strtolower($copy_ic); 
							$path2 = $path2.strtolower($copy_lesen);
							$path13 = $path13.strtolower($kad_pelajar);
							$path14 = $path14.strtolower($copy_ic_penjamin);
							$path15 = $path15.strtolower($copy_lesen_penjamin);
							$path16 = $path16.strtolower($payslip1_penjamin_3bulan);
							$path17 = $path17.strtolower($payslip2_penjamin_3bulan);
							$path18 = $path18.strtolower($payslip3_penjamin_3bulan);
							$path19 = $path19.strtolower($bank_statement_penjamin_3bulan);
							$path20 = $path20.strtolower($penyata_kwsp_penjamin_3bulan);

							$copy_ic = strtolower($copy_ic); 
							$copy_lesen = strtolower($copy_lesen); 
							$kad_pelajar = strtolower($kad_pelajar); 
							$copy_ic_penjamin = strtolower($copy_ic_penjamin); 
							$copy_lesen_penjamin = strtolower($copy_lesen_penjamin); 
							$payslip1_penjamin_3bulan = strtolower($payslip1_penjamin_3bulan); 
							$payslip2_penjamin_3bulan = strtolower($payslip2_penjamin_3bulan); 
							$payslip3_penjamin_3bulan = strtolower($payslip3_penjamin_3bulan); 
							$bank_statement_penjamin_3bulan = strtolower($bank_statement_penjamin_3bulan); 
							$penyata_kwsp_penjamin_3bulan = strtolower($penyata_kwsp_penjamin_3bulan); 

							if((move_uploaded_file($tmp_copy_ic,$path1)) && (move_uploaded_file($tmp_copy_lesen,$path2)) && (move_uploaded_file($tmp_kad_pelajar,$path13)) && (move_uploaded_file($tmp_copy_ic_penjamin,$path14)) && (move_uploaded_file($tmp_copy_lesen_penjamin,$path15)) && (move_uploaded_file($tmp_payslip1_penjamin_3bulan,$path16)) && (move_uploaded_file($tmp_payslip2_penjamin_3bulan,$path17)) && (move_uploaded_file($tmp_payslip3_penjamin_3bulan,$path18)) && (move_uploaded_file($tmp_bank_statement_penjamin_3bulan,$path19)) && (move_uploaded_file($tmp_penyata_kwsp_penjamin_3bulan,$path20)))
							{
							// echo "Uploaded file Succesfully!";
							$name = $_POST['name'];
							$email = $_POST['email'];
							$phone = $_POST['phone'];
							$address = $_POST['address'];

							if(!empty($_POST['mesej'])) {
								$mesej = $_POST['mesej'];
							} else {
								$mesej = "-";
							}
						
							$car_model = $_POST['car_model'];
							$car_color = $_POST['car_color'];
							$status_permohonan = $_POST['status_permohonan'];
							$status_penjamin = $_POST['status_penjamin'];

							//sent email notification
							if(isset($_POST['email'])) {

							    $email_to = "shahrimbisni@gmail.com";
							    $email_subject = "New Application Form";
						 
							    function died($error) {
							        // your error code can go here
							        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
							        echo "These errors appear below.<br /><br />";
							        echo $error."<br /><br />";
							        echo "Please go back and fix these errors.<br /><br />";
							        die();
							    }		  
						 
							    $email_message = "Form details below.\n\n";
						     
							    function clean_string($string) {
							      $bad = array("content-type","bcc:","to:","cc:","href");
							      return str_replace($bad,"",$string);
							    }

							    $email_message .= "Name: ".clean_string($name)."\n";
							    $email_message .= "Email: ".clean_string($email)."\n";
							    $email_message .= "Phone: ".clean_string($phone)."\n";
							    $email_message .= "Address: ".clean_string($address)."\n";
							    $email_message .= "Message: ".clean_string($mesej)."\n";
							    $email_message .= "Car Model: ".clean_string($car_model)."\n";
							    $email_message .= "Car Color: ".clean_string($car_color)."\n";
							    $email_message .= "Application Status: ".clean_string($status_permohonan)."\n";
						 
								// create email headers
								$headers = 'From: '.$email."\r\n".
								'Reply-To: '.$email."\r\n" .
								'X-Mailer: PHP/' . phpversion();
								@mail($email_to, $email_subject, $email_message, $headers);
							}

							//include database configuration file
							include_once 'db.php';

							//insert form data in the database
							$insert = $db->query("INSERT uploading (name,email,phone,address,car_model,car_color,mesej,copy_ic,copy_lesen,status_permohonan,payslip1,payslip2,payslip3,payslip4,payslip5,payslip6,bank_statement,penyata_kwsp,surat_tawaran_kerja,skrol,kad_pelajar,status_penjamin,copy_ic_penjamin,copy_lesen_penjamin,payslip1_penjamin,payslip2_penjamin,payslip3_penjamin,payslip4_penjamin,payslip5_penjamin,payslip6_penjamin,bank_statement_penjamin,penyata_kwsp_penjamin) VALUES ('".$name."','".$email."','".$phone."','".$address."','".$car_model."','".$car_color."','".$mesej."','".$copy_ic."','".$copy_lesen."','".$status_permohonan."','-','-','-','-','-','-','-','-','-','-','".$kad_pelajar."','".$status_penjamin."','".$copy_ic_penjamin."','".$copy_lesen_penjamin."','".$payslip1_penjamin_3bulan."','".$payslip2_penjamin_3bulan."','".$payslip3_penjamin_3bulan."','-','-','-','".$bank_statement_penjamin_3bulan."','".$penyata_kwsp_penjamin_3bulan."')");

							//echo $insert?'ok':'err';
							echo 'success';
							}
						} 
						else 
						{
							echo 'invalid';
						}
					}
					break;
				
				case 'penjamin_gaji_tak_tetap':
					if ($_FILES['copy_ic_penjamin']['error'] > 0) {
						echo 'copy_ic_penjamin_required';
					} else if ($_FILES['copy_lesen_penjamin']['error'] > 0) {
						echo 'copy_lesen_penjamin_required';
					} else if ($_FILES['payslip1_penjamin_6bulan']['error'] > 0) {
						echo 'payslip1_penjamin_required';
					} else if ($_FILES['payslip2_penjamin_6bulan']['error'] > 0) {
						echo 'payslip2_penjamin_required';
					} else if ($_FILES['payslip3_penjamin_6bulan']['error'] > 0) {
						echo 'payslip3_penjamin_required';
					} else if ($_FILES['payslip4_penjamin_6bulan']['error'] > 0) {
						echo 'payslip4_penjamin_required';
					} else if ($_FILES['payslip5_penjamin_6bulan']['error'] > 0) {
						echo 'payslip5_penjamin_required';
					} else if ($_FILES['payslip6_penjamin_6bulan']['error'] > 0) {
						echo 'payslip6_penjamin_required';
					} else if ($_FILES['bank_statement_penjamin_6bulan']['error'] > 0) {
						echo 'bank_statement_penjamin_required';
					} else if ($_FILES['penyata_kwsp_penjamin_6bulan']['error'] > 0) {
						echo 'penyata_kwsp_penjamin_required';
					} else {
						$copy_ic = $_FILES['copy_ic']['name'];
						$tmp_copy_ic = $_FILES['copy_ic']['tmp_name'];

						$copy_lesen = $_FILES['copy_lesen']['name'];
						$tmp_copy_lesen = $_FILES['copy_lesen']['tmp_name'];

						$kad_pelajar = $_FILES['kad_pelajar']['name'];
						$tmp_kad_pelajar = $_FILES['kad_pelajar']['tmp_name'];

						$copy_ic_penjamin = $_FILES['copy_ic_penjamin']['name'];
						$tmp_copy_ic_penjamin = $_FILES['copy_ic_penjamin']['tmp_name'];

						$copy_lesen_penjamin = $_FILES['copy_lesen_penjamin']['name'];
						$tmp_copy_lesen_penjamin = $_FILES['copy_lesen_penjamin']['tmp_name'];

						$payslip1_penjamin_6bulan = $_FILES['payslip1_penjamin_6bulan']['name'];
						$tmp_payslip1_penjamin_6bulan = $_FILES['payslip1_penjamin_6bulan']['tmp_name'];

						$payslip2_penjamin_6bulan = $_FILES['payslip2_penjamin_6bulan']['name'];
						$tmp_payslip2_penjamin_6bulan = $_FILES['payslip2_penjamin_6bulan']['tmp_name'];

						$payslip3_penjamin_6bulan = $_FILES['payslip3_penjamin_6bulan']['name'];
						$tmp_payslip3_penjamin_6bulan = $_FILES['payslip3_penjamin_6bulan']['tmp_name'];

						$payslip4_penjamin_6bulan = $_FILES['payslip4_penjamin_6bulan']['name'];
						$tmp_payslip4_penjamin_6bulan = $_FILES['payslip4_penjamin_6bulan']['tmp_name'];

						$payslip5_penjamin_6bulan = $_FILES['payslip5_penjamin_6bulan']['name'];
						$tmp_payslip5_penjamin_6bulan = $_FILES['payslip5_penjamin_6bulan']['tmp_name'];

						$payslip6_penjamin_6bulan = $_FILES['payslip6_penjamin_6bulan']['name'];
						$tmp_payslip6_penjamin_6bulan = $_FILES['payslip6_penjamin_6bulan']['tmp_name'];

						$bank_statement_penjamin_6bulan = $_FILES['bank_statement_penjamin_6bulan']['name'];
						$tmp_bank_statement_penjamin_6bulan = $_FILES['bank_statement_penjamin_6bulan']['tmp_name'];

						$penyata_kwsp_penjamin_6bulan = $_FILES['penyata_kwsp_penjamin_6bulan']['name'];
						$tmp_penyata_kwsp_penjamin_6bulan = $_FILES['penyata_kwsp_penjamin_6bulan']['tmp_name'];

						// get uploaded file's extension
						$ext_copy_ic = strtolower(pathinfo($copy_ic, PATHINFO_EXTENSION));
						$ext_copy_lesen = strtolower(pathinfo($copy_lesen, PATHINFO_EXTENSION));
						$ext_kad_pelajar = strtolower(pathinfo($kad_pelajar, PATHINFO_EXTENSION));
						$ext_copy_ic_penjamin = strtolower(pathinfo($copy_ic_penjamin, PATHINFO_EXTENSION));
						$ext_copy_lesen_penjamin = strtolower(pathinfo($copy_lesen_penjamin, PATHINFO_EXTENSION));
						$ext_payslip1_penjamin_6bulan = strtolower(pathinfo($payslip1_penjamin_6bulan, PATHINFO_EXTENSION));
						$ext_payslip2_penjamin_6bulan = strtolower(pathinfo($payslip2_penjamin_6bulan, PATHINFO_EXTENSION));
						$ext_payslip3_penjamin_6bulan = strtolower(pathinfo($payslip3_penjamin_6bulan, PATHINFO_EXTENSION));
						$ext_bank_statement_penjamin_6bulan = strtolower(pathinfo($bank_statement_penjamin_6bulan, PATHINFO_EXTENSION));
						$ext_penyata_kwsp_penjamin_6bulan = strtolower(pathinfo($penyata_kwsp_penjamin_6bulan, PATHINFO_EXTENSION));
						$ext_payslip4_penjamin_6bulan = strtolower(pathinfo($payslip4_penjamin_6bulan, PATHINFO_EXTENSION));
						$ext_payslip5_penjamin_6bulan = strtolower(pathinfo($payslip5_penjamin_6bulan, PATHINFO_EXTENSION));
						$ext_payslip6_penjamin_6bulan = strtolower(pathinfo($payslip6_penjamin_6bulan, PATHINFO_EXTENSION));

						// can upload same image using rand function
						$copy_ic = rand(1000,1000000).$copy_ic;
						$copy_lesen = rand(1000,1000000).$copy_lesen;
						$kad_pelajar = rand(1000,1000000).$kad_pelajar;
						$copy_ic_penjamin = rand(1000,1000000).$copy_ic_penjamin;
						$copy_lesen_penjamin = rand(1000,1000000).$copy_lesen_penjamin;
						$payslip1_penjamin_6bulan = rand(1000,1000000).$payslip1_penjamin_6bulan;
						$payslip2_penjamin_6bulan = rand(1000,1000000).$payslip2_penjamin_6bulan;
						$payslip3_penjamin_6bulan = rand(1000,1000000).$payslip3_penjamin_6bulan;
						$bank_statement_penjamin_6bulan = rand(1000,1000000).$bank_statement_penjamin_6bulan;
						$penyata_kwsp_penjamin_6bulan = rand(1000,1000000).$penyata_kwsp_penjamin_6bulan;
						$payslip4_penjamin_6bulan = rand(1000,1000000).$payslip4_penjamin_6bulan;
						$payslip5_penjamin_6bulan = rand(1000,1000000).$payslip5_penjamin_6bulan;
						$payslip6_penjamin_6bulan = rand(1000,1000000).$payslip6_penjamin_6bulan;

						// check's valid format
						if((in_array($ext_copy_ic, $valid_extensions)) && (in_array($ext_copy_lesen, $valid_extensions)) && (in_array($ext_kad_pelajar, $valid_extensions)) && (in_array($ext_copy_ic_penjamin, $valid_extensions)) && (in_array($ext_copy_lesen_penjamin, $valid_extensions)) && (in_array($ext_payslip1_penjamin_6bulan, $valid_extensions)) && (in_array($ext_payslip2_penjamin_6bulan, $valid_extensions)) && (in_array($ext_payslip3_penjamin_6bulan, $valid_extensions)) && (in_array($ext_bank_statement_penjamin_6bulan, $valid_extensions)) && (in_array($ext_penyata_kwsp_penjamin_6bulan, $valid_extensions)) && (in_array($ext_payslip4_penjamin_6bulan, $valid_extensions)) && (in_array($ext_payslip5_penjamin_6bulan, $valid_extensions)) && (in_array($ext_payslip6_penjamin_6bulan, $valid_extensions)))
						{	 
							$path1 = $path1.strtolower($copy_ic); 
							$path2 = $path2.strtolower($copy_lesen);
							$path13 = $path13.strtolower($kad_pelajar);
							$path14 = $path14.strtolower($copy_ic_penjamin);
							$path15 = $path15.strtolower($copy_lesen_penjamin);
							$path16 = $path16.strtolower($payslip1_penjamin_6bulan);
							$path17 = $path17.strtolower($payslip2_penjamin_6bulan);
							$path18 = $path18.strtolower($payslip3_penjamin_6bulan);
							$path19 = $path19.strtolower($bank_statement_penjamin_6bulan);
							$path20 = $path20.strtolower($penyata_kwsp_penjamin_6bulan);
							$path21 = $path21.strtolower($payslip4_penjamin_6bulan);
							$path22 = $path22.strtolower($payslip5_penjamin_6bulan);
							$path23 = $path23.strtolower($payslip6_penjamin_6bulan);

							$copy_ic = strtolower($copy_ic); 
							$copy_lesen = strtolower($copy_lesen); 
							$kad_pelajar = strtolower($kad_pelajar); 
							$copy_ic_penjamin = strtolower($copy_ic_penjamin); 
							$copy_lesen_penjamin = strtolower($copy_lesen_penjamin); 
							$payslip1_penjamin_6bulan = strtolower($payslip1_penjamin_6bulan); 
							$payslip2_penjamin_6bulan = strtolower($payslip2_penjamin_6bulan); 
							$payslip3_penjamin_6bulan = strtolower($payslip3_penjamin_6bulan); 
							$bank_statement_penjamin_6bulan = strtolower($bank_statement_penjamin_6bulan); 
							$penyata_kwsp_penjamin_6bulan = strtolower($penyata_kwsp_penjamin_6bulan);
							$payslip4_penjamin_6bulan = strtolower($payslip4_penjamin_6bulan); 
							$payslip5_penjamin_6bulan = strtolower($payslip5_penjamin_6bulan); 
							$payslip6_penjamin_6bulan = strtolower($payslip6_penjamin_6bulan);

							if((move_uploaded_file($tmp_copy_ic,$path1)) && (move_uploaded_file($tmp_copy_lesen,$path2)) && (move_uploaded_file($tmp_kad_pelajar,$path13)) && (move_uploaded_file($tmp_copy_ic_penjamin,$path14)) && (move_uploaded_file($tmp_copy_lesen_penjamin,$path15)) && (move_uploaded_file($tmp_payslip1_penjamin_6bulan,$path16)) && (move_uploaded_file($tmp_payslip2_penjamin_6bulan,$path17)) && (move_uploaded_file($tmp_payslip3_penjamin_6bulan,$path18)) && (move_uploaded_file($tmp_bank_statement_penjamin_6bulan,$path19)) && (move_uploaded_file($tmp_penyata_kwsp_penjamin_6bulan,$path20)) && (move_uploaded_file($tmp_payslip4_penjamin_6bulan,$path21)) && (move_uploaded_file($tmp_payslip5_penjamin_6bulan,$path22)) && (move_uploaded_file($tmp_payslip6_penjamin_6bulan,$path23)))
							{
							// echo "Uploaded file Succesfully!";
							$name = $_POST['name'];
							$email = $_POST['email'];
							$phone = $_POST['phone'];
							$address = $_POST['address'];

							if(!empty($_POST['mesej'])) {
								$mesej = $_POST['mesej'];
							} else {
								$mesej = "-";
							}
						
							$car_model = $_POST['car_model'];
							$car_color = $_POST['car_color'];
							$status_permohonan = $_POST['status_permohonan'];
							$status_penjamin = $_POST['status_penjamin'];

							//sent email notification
							if(isset($_POST['email'])) {

							    $email_to = "shahrimbisni@gmail.com";
							    $email_subject = "New Application Form";
						 
							    function died($error) {
							        // your error code can go here
							        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
							        echo "These errors appear below.<br /><br />";
							        echo $error."<br /><br />";
							        echo "Please go back and fix these errors.<br /><br />";
							        die();
							    }		  
						 
							    $email_message = "Form details below.\n\n";
						     
							    function clean_string($string) {
							      $bad = array("content-type","bcc:","to:","cc:","href");
							      return str_replace($bad,"",$string);
							    }

							    $email_message .= "Name: ".clean_string($name)."\n";
							    $email_message .= "Email: ".clean_string($email)."\n";
							    $email_message .= "Phone: ".clean_string($phone)."\n";
							    $email_message .= "Address: ".clean_string($address)."\n";
							    $email_message .= "Message: ".clean_string($mesej)."\n";
							    $email_message .= "Car Model: ".clean_string($car_model)."\n";
							    $email_message .= "Car Color: ".clean_string($car_color)."\n";
							    $email_message .= "Application Status: ".clean_string($status_permohonan)."\n";
						 
								// create email headers
								$headers = 'From: '.$email."\r\n".
								'Reply-To: '.$email."\r\n" .
								'X-Mailer: PHP/' . phpversion();
								@mail($email_to, $email_subject, $email_message, $headers);
							}

							//include database configuration file
							include_once 'db.php';

							//insert form data in the database
							$insert = $db->query("INSERT uploading (name,email,phone,address,car_model,car_color,mesej,copy_ic,copy_lesen,status_permohonan,payslip1,payslip2,payslip3,payslip4,payslip5,payslip6,bank_statement,penyata_kwsp,surat_tawaran_kerja,skrol,kad_pelajar,status_penjamin,copy_ic_penjamin,copy_lesen_penjamin,payslip1_penjamin,payslip2_penjamin,payslip3_penjamin,payslip4_penjamin,payslip5_penjamin,payslip6_penjamin,bank_statement_penjamin,penyata_kwsp_penjamin) VALUES ('".$name."','".$email."','".$phone."','".$address."','".$car_model."','".$car_color."','".$mesej."','".$copy_ic."','".$copy_lesen."','".$status_permohonan."','-','-','-','-','-','-','-','-','-','-','".$kad_pelajar."','".$status_penjamin."','".$copy_ic_penjamin."','".$copy_lesen_penjamin."','".$payslip1_penjamin_6bulan."','".$payslip2_penjamin_6bulan."','".$payslip3_penjamin_6bulan."','".$payslip4_penjamin_6bulan."','".$payslip5_penjamin_6bulan."','".$payslip6_penjamin_6bulan."','".$bank_statement_penjamin_6bulan."','".$penyata_kwsp_penjamin_6bulan."')");

							//echo $insert?'ok':'err';
							echo 'success';
							}
						} 
						else 
						{
							echo 'invalid';
						}
					}
					break;
				default:
					echo "Pilihan Penjamin!";
					break;
			}
		} 
        break;
    default:
        echo "Pilihan Permohonan!";
}

?>
