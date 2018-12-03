<?php

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions

$path1 = 'copy_ic/'; // upload directory
$path2 = 'copy_lesen/'; // upload directory
$path3 = 'payslip/'; // upload directory


if ($_POST['status_permohonan'] == 'gaji_tetap') {
	if ($_FILES['payslip1_3bulan']['error'] > 0) { 
    	echo 'payslip1_3bulan_required';
	} else if ($_FILES['payslip2_3bulan']['error'] > 0) {
		echo 'payslip2_3bulan_required';
	} else if ($_FILES['payslip3_3bulan']['error'] > 0) {
		echo 'payslip3_3bulan_required';
	}
} else if ($_POST['status_permohonan'] == 'gaji_tak_tetap') {
	if ($_FILES['payslip1_6bulan']['error'] > 0) { 
    	echo 'payslip1_6bulan_required';
	} else if ($_FILES['payslip2_6bulan']['error'] > 0) { 
    	echo 'payslip2_6bulan_required';
	} else if ($_FILES['payslip3_6bulan']['error'] > 0) { 
    	echo 'payslip3_6bulan_required';
	} else if ($_FILES['payslip4_6bulan']['error'] > 0) { 
    	echo 'payslip4_6bulan_required';
	} else if ($_FILES['payslip5_6bulan']['error'] > 0) { 
    	echo 'payslip5_6bulan_required';
	} else if ($_FILES['payslip6_6bulan']['error'] > 0) { 
    	echo 'payslip6_6bulan_required';
	}
} else {

	$copy_ic = $_FILES['copy_ic']['name'];
	$tmp_copy_ic = $_FILES['copy_ic']['tmp_name'];

	$copy_lesen = $_FILES['copy_lesen']['name'];
	$tmp_copy_lesen = $_FILES['copy_lesen']['tmp_name'];

	$payslip1_3bulan = $_FILES['payslip1_3bulan']['name'];
	$tmp_payslip1_3bulan = $_FILES['payslip1_3bulan']['tmp_name'];

	// get uploaded file's extension
	$ext_copy_ic = strtolower(pathinfo($copy_ic, PATHINFO_EXTENSION));
	$ext_copy_lesen = strtolower(pathinfo($copy_lesen, PATHINFO_EXTENSION));
	$ext_payslip1_3bulan = strtolower(pathinfo($payslip1_3bulan, PATHINFO_EXTENSION));

	// can upload same image using rand function
	$copy_ic = rand(1000,1000000).$copy_ic;
	$copy_lesen = rand(1000,1000000).$copy_lesen;
	$payslip1_3bulan = rand(1000,1000000).$payslip1_3bulan;

	// check's valid format
	if((in_array($ext_copy_ic, $valid_extensions)) && (in_array($ext_copy_lesen, $valid_extensions)) && (in_array($ext_payslip1_3bulan, $valid_extensions)))
	{	 
		$path1 = $path1.strtolower($copy_ic); 
		$path2 = $path2.strtolower($copy_lesen);
		$path3 = $path3.strtolower($payslip1_3bulan);

		$copy_ic = strtolower($copy_ic); 
		$copy_lesen = strtolower($copy_lesen); 
		$copy_payslip1_3bulan = strtolower($payslip1_3bulan); 

		if((move_uploaded_file($tmp_copy_ic,$path1)) && (move_uploaded_file($tmp_copy_lesen,$path2)) && (move_uploaded_file($tmp_payslip1_3bulan,$path3)))
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
		$insert = $db->query("INSERT uploading (name,email,phone,address,car_model,car_color,mesej,copy_ic,copy_lesen,status_permohonan,payslip1) VALUES ('".$name."','".$email."','".$phone."','".$address."','".$car_model."','".$car_color."','".$mesej."','".$copy_ic."','".$copy_lesen."','".$status_permohonan."','".$payslip1_3bulan."')");

		//echo $insert?'ok':'err';
		echo 'success';
		}
	} 
	else 
	{
		echo 'invalid';
	}
}

?>
