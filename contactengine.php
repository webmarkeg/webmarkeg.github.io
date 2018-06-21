
<?php
// Set up the default mail headers   
      $headers = 'MIME-Version: 1.0' . CC_FB_SENDMAIL_EOL .
         'Content-Type: text/plain; charset=utf-8' . CC_FB_SENDMAIL_EOL .
         'Content-Transfer-Encoding: 7bit' . CC_FB_SENDMAIL_EOL;             
$EmailFrom = "websiteform@Masriaelectric.net";
$EmailTo = "info@masriaelectric.net";
$Subject = "Masria Electric WebSite Form";
$Name = Trim(stripslashes($_POST['Name'])); 
$Tel = Trim(stripslashes($_POST['Tel'])); 
$Email = Trim(stripslashes($_POST['Email'])); 
$Message = Trim(stripslashes($_POST['Message'])); 

// validation
$validationOK=true;
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
  exit;
}




// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "Tel: ";
$Body .= $Tel;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $Email;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $Message;
$Body .= "\n";


// send email 
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

// redirect to success page 
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=contactthanks.php\">";
}
else{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=error.htm\">";
}
?>