<?php

// Define some constants
define( "RECIPIENT_NAME", "Mangosorange Agritech India Private Limited" );
define( "RECIPIENT_EMAIL", "info@mangosorangeagritech.in" );

// Read the form values
$success = true;
$name = isset( $_POST['name'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['name'] ) : "";
$senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";
$phone = isset( $_POST['phone'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['phone'] ) : "";
//$services = isset( $_POST['services'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['services'] ) : "";
$subject = isset( $_POST['subject'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['subject'] ) : "";
//$address = isset( $_POST['address'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['address'] ) : "";
//$website = isset( $_POST['website'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['website'] ) : "";
//$message = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message'] ) : "";
$dropdown = isset($_POST['dropdown']) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['dropdown'] ) : "";
$file = isset($_POST['file']) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['file'] ) : "";

$mail_subject = 'A contact request send by ' . $name;

$body = 'Name: '. $name . "\r\n";
$body .= 'Email: '. $senderEmail . "\r\n";


if ($phone) {$body .= 'Phone: '. $phone . "\r\n"; }
//if ($services) {$body .= 'services: '. $services . "\r\n"; }
if ($subject) {$body .= 'Subject: '. $subject . "\r\n"; }
//if ($address) {$body .= 'Address: '. $address . "\r\n"; }
//if ($website) {$body .= 'Website: '. $website . "\r\n"; }

//$body .= 'message: ' . "\r\n" . $message;



// If all values exist, send the email
if ( $name && $senderEmail ) {
  $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  $headers = "From: " . $name . " <" . $senderEmail . ">";  
  $success = mail( $recipient, $mail_subject, $body, $headers );
  echo "Thanks for contacting us. We will contact you ASAP";
  echo "<div class='inner success'><p class='success'>Thanks for contacting us. We will contact you ASAP!</p></div><!-- /.inner -->";
}else {
	echo "<div class='inner error'><p class='error'>Something went wrong. Please try again.</p></div><!-- /.inner -->";
}

?>