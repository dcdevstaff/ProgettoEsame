<?php
  include_once 'header.php';
  include_once 'includes/dbh.inc.php';
?>

    <section class="cover cover--single" style="margin-top: 50px">
        <div class="cover__filter"></div>
        <div class="cover__caption">
            <div class="cover__caption__copy">
                <h1 style="margin: auto">R.A.D.A.R. DASHBOARD </h1>
                <button type="button" class="btn btn-primary btn-lg" style="width: 200px" data-toggle="modal" data-target="#ModalCercaZ">Cerca Zona</button>
            </div>
        </div>
    </section>
    <br>

    <!--MODAL CERCA ZONA -->
    <section>
        <div class="modal fade" id="ModalCercaZ" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Cerca Zona</h4>
                    </div>
                    <div class="modal-body">
                        <form class="signup-form" action="dettaglioZona.php" method="POST">
                            <!--cambiato-->

                            <h3>Nome zona: </h3><input type="text" name="nomeZona">

                            <button type="submit" name="submit">Cerca</button>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="main-container">
        <div class="tabel-wrapper centrato">

<?php
  if (isset($_SESSION['u_email'])) {

    // 1-Cerco l'id dell'utente loggato e lo metto in $cod
    $userMail = $_SESSION['u_email'];
    $sql1= "SELECT * FROM cliente WHERE email = '$userMail' ";
    $resSql1 = mysqli_query($conn, $sql1);
    $arrayDati = mysqli_fetch_array($resSql1);
    $cod = $arrayDati['cod_cliente'];
    // FUNZIONA echo "$cod";

    // 2- Cerco le zone
    $zone = "SELECT * FROM zona_cliente WHERE cliente = '$cod' ; ";

    $resultZone = mysqli_query($conn, $zone);
    $resultCheckZone = mysqli_num_rows($resultZone);
    $resultZ = mysqli_fetch_array($resultZone);

    if ($resultCheckZone<1) {
      echo "<h1>QUESTO ACCOUNT NON HA ANCORA ZONE</h1>";
    } else {
       foreach ($resultZone as $resultZ) {
           //cerco tutti i sensori in quella zona
           $sensor = $resultZ['id_pos'];
           $querySensor = "SELECT * FROM sensori_zona WHERE id_pos = '$sensor';";
           $resultSensor = mysqli_query($conn, $querySensor);
           $resultS = mysqli_fetch_array($resultSensor);
           //$queryDataSensor = "SELECT * from Temperatura WHERE idSensore = '$cod' ; ";
   
        echo "
           <form method=\"POST\" action=\"infoDash.php\">
       
           <table class=\"table table-bordered\">
             <thead>
                   <tr align=\"center\">
                    <th>Nome Sensore</th>
                    <th>Tipo</th>
                    <th>Ultima rilevazione</th>
                   <th>Dettagli</th>
                  </tr>
             </thead>";
           $collocazione=$resultZ['id_pos'];
          if ($resultS) {
              foreach ($resultSensor as $resultS) {
                
                $id = $resultS['id_sensori'];
                $collocazione= $resultS['id_pos'];
   
                  $idS=htmlspecialchars($resultS['id_sensori']);
                  $tip=htmlspecialchars($resultS['tipo']);
                  $nomeS=htmlspecialchars($resultS['nome_sensore']);
                  
                  $queryLastRil = "SELECT * FROM $tip WHERE idSensore = '$id' ORDER BY idRilevazione DESC LIMIT 1;";
                  $resRil = mysqli_query($conn,$queryLastRil);
                  //echo $queryLastRil;
                  $arrRil = mysqli_fetch_array($resRil);
                  $lastRil = $arrRil['valore_rilevato'];
                  $lastRilData = $arrRil['data_rilevamento'];



                  
   
                   echo "
                   <tbody>
                   <tr>
                   <input type=\"hidden\" name=\"name\" value=$id>
                   <input type=\"hidden\" name=\"tipo\" value=$tip>
                   <input type=\"hidden\" name=\"name\" value=$collocazione>
                   <input type=\"hidden\" name=\"nomeS\" value=$nomeS>

                   <td name=\"sensName\" align=\"center\">" . $nomeS. "</td>
                   <td align=\"center\">" . $tip . "</td>
                   <td align=\"center\">" . $lastRil. " del ". $lastRilData . "</td>
                   <td align=\"center\">
                     <button
                       type=\"submit\"
                       class=\"btn btn-default btn-sm\"
                       name=\"infoSENS\"
                       value=$id
                     >
                       <span class=\"glyphicon glyphicon-info-sign\"></span>
                     </button>
                   </td>
                  </tr>
                  </tbody>
                  ";
              }
          }
           $rZona=htmlspecialchars($resultZ['zona']);
          echo "
         <h3 class=\"intestazione\"> " . $rZona . "</h3>
         <button
         type=\"submit\"
         name=\"infoZONA\"
         value=$collocazione
         >Info Zona
         </button>
         </form>";
      }
    }
  }
        ?>
        </div>
    </section>