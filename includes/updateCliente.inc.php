<?php
/* DEPRECATED*/
include_once 'dbh.inc.php';
    if (isset($_POST['btnUpdateCliente'])) {
        $nAzienda = mysqli_real_escape_string($conn, $_POST['newAzienda']);
        $nTelefono = mysqli_real_escape_string($conn, $_POST['newTelefono']);
        $nSede = mysqli_real_escape_string($conn, $_POST['newSede']);
        $idCliente = mysqli_real_escape_string($conn, $_POST['idCliente']);

            
            if (empty($idCliente) && empty($nTelefono) && empty($nSede) && empty($nAzienda)) {
                # tuttovuoto
            } elseif(empty($nAzienda) && empty($nTelefono) ){
                $sqlUpdateSede = " UPDATE cliente SET sede = '$nSede' WHERE cod_cliente= '$idCliente' ; ";
                $resUpdateSede = mysqli_query($conn, $sqlUpdateSede);
                echo ("<script LANGUAGE='Javascript'>
		    window.alert('Cliente modificato con successo'); 
		    window.location.href='../HomeIOT.php';
		    </script>");
            } elseif (empty($nAzienda) && empty($nSede)) {
                $sqlUpdateTelfono;
            } elseif (empty($nTelefono) && empty($nSede)) {
                $sqlUpdateAzienda;
            } else {
                $sqlQueryUpdateCliente = " UPDATE cliente SET azienda= '$nAzienda', telefono='$nTelefono', sede='$nSede' WHERE ; ";
                $resultUpdateCliente = mysqli_query($conn, $sqlQueryUpdateCliente);
            }
                
                
              
                
               
    }



?>