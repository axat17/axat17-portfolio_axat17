<?php 
$errors = '';
$myemail = 'axat17@gmail.com';//<-----Put Your email address here.
if(empty($_POST['name'])  || 
   empty($_POST['email']) || 
   empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['name']; 
$email_address = $_POST['email']; 
$message = $_POST['message']; 

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject = "Contact form submission: $name";
	$email_body = "You Have Received a New Message. ".
	"Here are the details:\n Name: $name \n Email: $email_address \n Message \n $message";
	
	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	header('Location: http://akshatshah.com/');
} 
?>
    <html>

    <head>
        <title>Contact form handler</title>
    </head>

    <body>
        <!-- This page is displayed only if there is some error -->
        <?php
echo nl2br($errors);
?>
    </body>

    </html>