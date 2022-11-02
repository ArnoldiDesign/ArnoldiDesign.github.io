<?php

$name = $_POST['name'];
$betreff = $_POST['betreff'];
$email = $_POST['email'];
$nachricht = $_POST['nachricht'];


$formcontent= "Ein neuer Kunde hat uber die Website Kontakt aufgenommen. \n \n Vor-und Nachname: $name \n \n Betreff: $betreff \n \n E-mail: $email \n \n Nachricht: $nachricht ";


$subject = "KUNSTWERKSTÄTTE Website - Ein neuer Kunde!";
$recipient = "gabrielmarinhoworks@gmail.com";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader);
header("Location: https://google.com", TRUE, 301); 

function IsInjected($str)
{
    $injections = array('(\n+)',
           '(\r+)',
           '(\t+)',
           '(%0A+)',
           '(%0D+)',
           '(%08+)',
           '(%09+)'
           );

    $inject = join('|', $injections);
    $inject = "/$inject/i";

    if(preg_match($inject,$str))
    {
      return true;
    }
    else
    {
      return false;
    }
}

if(IsInjected($email))
{
    echo "Bad email value!";
    exit;
}

?>
