<?php 
if(isset($_POST['submit'])){
    $to = "saramatovic04@gmail.com"; // this is your Email address
    $from = $_POST['mejl']; // this is the sender's Email address
    $first_name = $_POST['ime'];
    $message =  $_POST['poruka'];
    $subject = "Form submission";
    $headers = "From:" . $from;
    mail($to,$subject ,$message,$headers);
    echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
    }
?>

<php>