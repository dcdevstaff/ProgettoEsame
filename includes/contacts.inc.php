<?php

$mittente = $_POST['email'];
$destinatario = "send_iot@outlook.com"; 
$oggetto = $_POST['oggMail']; 
$messaggio = $_POST['messMail'];  



if (mail($destinatario, $oggetto, $messaggio,$mittente)){ 
   ?>
	<script LANGUAGE='JavaScript'>
    window.alert('E-Mail inviata con successo !');
    window.location.href='../homecliente.php';
    </script>
    <?php
}else{
	?>
	<script LANGUAGE='JavaScript'>
    window.alert('E-Mail non inviata !');
    window.location.href='../contact.php';
    </script>   
   <?php
 }
  


?>