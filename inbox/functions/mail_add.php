<?php
// Include config file
require_once($_SERVER["DOCUMENT_ROOT"] . "/reten/config/DBconfig.php");

if ($_POST['mail'] == 'Submit') {
	//Escape user inputs for security
	$email_subject = mysqli_real_escape_string($mysqli, $_REQUEST['email_subject']);
	$email_recipient = mysqli_real_escape_string($mysqli, $_REQUEST['email_recipient']);
	$email_content = mysqli_real_escape_string($mysqli, $_REQUEST['email_content']);
	
	//Attempt insert query execution
	$sql = "INSERT INTO inbox (email_subject, email_recipient, email_content) VALUES ('$email_subject', '$email_recipient', '$email_content')";
}

if(mysqli_query($mysqli, $sql)){
	echo "<br>";
	echo "<div class='container'>";
	echo "<h1>Thank you!</h1>";
    echo "<p>Records added successfully.</p>";
	echo "<p><a href='../mail.php'>Back</a></p>";
	echo "</div>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}
 
// close connection
mysqli_close($mysqli);
?>