<?php

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions

$path1 = 'database/copy_ic/'; // upload directory
$path2 = 'database/copy_lesen/'; // upload directory

if(!empty($_POST['name']) || !empty($_POST['email']) || !empty($_POST['phone']) || !empty($_POST['address']) || !empty($_POST['car_model']) || !empty($_POST['mesej']) || $_FILES['copy_ic'] || $_FILES['copy_lesen'] || !empty($_POST['status_permohonan']))
{
	$copy_ic = $_FILES['copy_ic']['name'];
	$tmp_copy_ic = $_FILES['copy_ic']['tmp_name'];

	$copy_lesen = $_FILES['copy_lesen']['name'];
	$tmp_copy_lesen = $_FILES['copy_lesen']['tmp_name'];

	// get uploaded file's extension
	$ext_copy_ic = strtolower(pathinfo($copy_ic, PATHINFO_EXTENSION));
	$ext_copy_lesen = strtolower(pathinfo($copy_lesen, PATHINFO_EXTENSION));

	// can upload same image using rand function
	$copy_ic = rand(1000,1000000).$copy_ic;
	$copy_lesen = rand(1000,1000000).$copy_lesen;

	// check's valid format
	if((in_array($ext_copy_ic, $valid_extensions)) && (in_array($ext_copy_lesen, $valid_extensions)))
	{	 
		$path1 = $path1.strtolower($copy_ic); 
		$path2 = $path2.strtolower($copy_lesen);

		$copy_ic = strtolower($copy_ic); 
		$copy_lesen = strtolower($copy_lesen); 

		if((move_uploaded_file($tmp_copy_ic,$path1)) && (move_uploaded_file($tmp_copy_lesen,$path2)))
		{
		// echo "Uploaded file Succesfully!";
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$mesej = $_POST['mesej'];
		$car_model = $_POST['car_model'];
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
		    $email_message .= "Application Status: ".clean_string($status_permohonan)."\n";
		 
			// create email headers
			$headers = 'From: '.$email."\r\n".
			'Reply-To: '.$email."\r\n" .
			'X-Mailer: PHP/' . phpversion();
			@mail($email_to, $email_subject, $email_message, $headers);
		}

		//include database configuration file
		include_once 'database/db.php';

		//insert form data in the database
		$insert = $db->query("INSERT uploading (name,email,phone,address,car_model,mesej,copy_ic,copy_lesen,status_permohonan) VALUES ('".$name."','".$email."','".$phone."','".$address."','".$car_model."','".$mesej."','".$copy_ic."','".$copy_lesen."','".$status_permohonan."')");

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
