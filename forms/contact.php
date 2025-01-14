<?php
  $receiving_email_address = 'siswantoa956@gmail.com';

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

  // Menggunakan SMTP
  $contact->smtp = array(
    'host' => 'smtp.gmail.com',    
    'username' => 'siswantoa956@gmail.com',
    'password' => '12345',
    'port' => '587'
  );

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  if (!$contact->send()) {
      echo "Error: " . $contact->error;
  } else {
      echo "Message sent successfully!";
  }
?>
