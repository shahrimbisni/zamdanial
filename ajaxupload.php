<?php

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
$path = 'database/uploads/'; // upload directory

if(!empty($_POST['name']) || !empty($_POST['email']) || $_FILES['file'])
{
	$file = $_FILES['file']['name'];
	$tmp = $_FILES['file']['tmp_name'];

	// get uploaded file's extension
	$ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

	// can upload same image using rand function
	$final_image = rand(1000,1000000).$file;

	// check's valid format
	if(in_array($ext, $valid_extensions)) 
	{	 
		$path = $path.strtolower($final_image); 

		if(move_uploaded_file($tmp,$path)) 
		{
		echo "Uploaded file Succesfully!";
		$name = $_POST['name'];
		$email = $_POST['email'];

		//sent email notification
		if(isset($_POST['email'])) {
 
		    // EDIT THE 2 LINES BELOW AS REQUIRED
		    $email_to = "shahrimbisni@gmail.com";
		    $email_subject = "Your email subject line";
		 
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
		 
		     
		 
		// create email headers
		$headers = 'From: '.$name."\r\n".
		'Reply-To: '.$email."\r\n" .
		'X-Mailer: PHP/' . phpversion();
		@mail($email_to, $email_subject, $email_message, $headers);
	}

		//include database configuration file
		include_once 'database/db.php';

		//insert form data in the database
		$insert = $db->query("INSERT uploading (name,email,file_name) VALUES ('".$name."','".$email."','".$path."')");

		//echo $insert?'ok':'err';
		}
	} 
	else 
	{
	echo 'invalid';
	}
}
?>
