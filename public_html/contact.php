<?php
if(isset($_POST['email'])) {
     
    $email_to = "me@renejansen.in";
    $email_subject = "Ik kom graag in contact over het volgende";
     
    function died($error) {
        echo "Het spijt ons zeer, maar er heeft zich een fout voorgedaan in het formulier.";
        echo "Deze fouten verschijnen hieronder.<br /><br />";
        echo $error."<br /><br />";
        echo "Ga terug en los deze fouten op.<br /><br />";
        die();
    }
     
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['message'])) {
        died('Het spijt ons zeer, maar er heeft zich een fout voorgedaan in het formulier.');      
    }
     
    $name = $_POST['name']; 
    $email = $_POST['email']; 
    $message = $_POST['message']; 
     
    $error_message = "";
	if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Formulier details hieronder.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    $email_message .= "Name: ".clean_string($name)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";
    $email_message .= "Message: ".clean_string($message)."\n";
     

$headers = 'From: '.$email."\r\n".
'Reply-To: '.$email."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers); 
?>
 
 
<div style="text-align:center;">Bedankt dat u contact met mij heeft opgenomen. Ik zal binnen 24 uur reageren.</div>
 
<?php
}
?>