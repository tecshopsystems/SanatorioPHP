<?php 

// Global Configuration start: From here you can change the email-id of receiver, cc, from email-id & subject;
$to = "theembazaar@gmail.com";
$from = "test@theembazaar.com";
$subject = "MedicalPro - MedicalPro HTML Template";
// Global configuration end
$errmasg = "";

 $name = htmlentities(trim($_POST['name']));
 $gender = htmlentities(trim($_POST['gender']));
 $number = htmlentities(trim($_POST['number']));
 $date  = htmlentities(trim($_POST['date'])); 
 $email = htmlentities(trim($_POST['email']));
 $msg = htmlentities(trim(nl2br($_POST['msg'])));
 
if($email){
$message = "<table width='600'>
<tr><td>Name: ".$name." </td></tr>
<tr><td>gender: ".$gender." </td></tr>
<tr><td>Mobile No.: ".$number." </td></tr>
<tr><td>Date of Appointment: ".$date."</td></tr>
<tr><td>Email: ".$email."</td></tr>
<tr><td>Message:".$msg."</td></tr>
</table>";
 
 } else{
 	
$errmasg = "No Data";	
 }
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From:'.$from . "\r\n";
$headers .= 'Cc:'.$cc . "\r\n";



if($errmasg == ""){
if(mail($to,$subject,$message,$headers)){
     echo 1;   
}else{
    echo 'Error occurred while sending email';
}
}else{
    echo $errmasg;
}
?>