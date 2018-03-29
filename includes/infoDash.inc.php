

<?php
include_once '../header.php';
include_once 'dbh.inc.php';


if(isset($_POST['infoSENS'])){
    echo "<br><br><br><br>";
    echo $_SESSION['u_email'];
    echo "
        <h1>BUG: solo da questa pagina non trova la home, punta ad index anche se riconosce la session</h1>
        <img src=\"../res/gaf.png\">
    ";
    //pagina grafico sensore + dati vari
    $cod = mysqli_real_escape_string($conn, $_POST['infoSENS']);
    $tipo = mysqli_real_escape_string($conn, $_POST['tipo']);
    $nomeS = mysqli_real_escape_string($conn, $_POST['nomeS']);
    //echo  "$tipo"."---"."$cod"; FUNZIONANO, PRENDONO VALORE
    $sqlRilevazioni = "SELECT * FROM $tipo WHERE idSensore = '$cod' ORDER BY idRilevazione DESC; ";
    $resultRilevazioni = mysqli_query($conn, $sqlRilevazioni);
    $arrRilevazioni = mysqli_fetch_array($resultRilevazioni);
    
    echo"
        <div class=\"table-wrapper\">
        <h1 class=\"intestazione\"> Sensore: $nomeS </h1>
        <table class=\"table table-bordered\" style=\"width: 400px\">
        <thead>
            <tr>
                <th> Data </th>
                <th> Rilevazione </th>
            </tr>
        </thead>
    ";
        foreach ($resultRilevazioni as $arrRilevazioni) {
            //stampa lo storico rilevazioni in tabella
            $dataRil = $arrRilevazioni['data_rilevamento'];
            $ril = $arrRilevazioni['valore_rilevato'];
            echo "
            <tbody>
                <tr>
                    <td> $dataRil </td>
                    <td> $ril </td>
                </tr>
            </tbody>
            <div>
            
            ";
        }

} elseif(isset($_POST['infoZONA'])){
    //pagina info zona
    echo "
        <h1>BUG: solo da questa pagina non trova la home - l'herf è giusto</h1>
        <h1>Pagina dettaglio zona</h1>
    ";
}

?>
