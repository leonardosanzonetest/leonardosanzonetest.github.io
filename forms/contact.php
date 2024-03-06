<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'jonathancolombo98@outlook.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>

<!-- Finire di scrivere questo codice -->
<?php

// Impostazioni per l'invio dell'email
$receiving_email_address = 'jonathancolombo98@outlook.com'; // Indirizzo email di destinazione
$subject = 'Messaggio dal modulo di contatto'; // Oggetto dell'email

// Raccolta dei dati dal modulo di contatto
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Costruzione del corpo dell'email
$email_body = "Nome: $name\n";
$email_body .= "Email: $email\n";
$email_body .= "Messaggio:\n$message\n";

// Intestazioni dell'email
$headers = "From: $_POST['name']\r\n";
$headers .= "Reply-To: $receiving_email_address\r\n";

// Invio dell'email
$mail_sent = mail($receiving_email_address, $subject, $email_body, $headers);

// Verifica se l'email è stata inviata con successo
if ($mail_sent) {
    echo 'Successo! Il tuo messaggio è stato inviato.';
} else {
    echo 'Errore! Si è verificato un problema durante l\'invio del messaggio.';
}
?>

