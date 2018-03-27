<?php

$mittente1 = $_POST['email'];
$destinatario = "send_iot@outlook.com"; 
$oggetto = $_POST['oggMail']; 
$messaggio = $_POST['messMail'];  

$mittente =  'MIME-Version: 1.0' . "\r\n"; 
$mittente .= 'From:'. $mittente1 . "\r\n";
$mittente .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 

if (mail($destinatario, $oggetto, $messaggio,$mittente)){ 
        //echo "<script>window.alert('Email inviata con successo');</script>";
       	//echo "<a href='".$redirect_home."'><script>window.alert('Email inviata con successo');</script></a>";
	echo ("<script LANGUAGE='JavaScript'>
    window.alert('E-Mail inviata con successo !');
    window.location.href='../homecliente.php';
    </script>");
}else{
	
	echo ("<script LANGUAGE='JavaScript'>
    window.alert('E-Mail non inviata !');
    window.location.href='../contact.php';
    </script>");    
   
 }
  


?>