<?php
  include_once 'header.php';
  include_once 'includes/dbh.inc.php';
?>

    <section class="cover cover--singleUser" style="margin-top: 50px">
        <div class="cover__filter"></div>
        <div class="cover__caption">
            <div class="cover__caption__copy">
                <button type="button" class="btn btn-primary btn-lg" style="width: 200px" data-toggle="modal" data-target="#ModalCercaZ">Cerca Zona</button>
            <!--   <button type="button" class="btn btn-primary btn-lg" style="width: 200px" data-toggle="modal" data-target="#ModalCercaS">Cerca Sensore</button> -->

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
                            <h4 class="intestazione" id="myModalLabel">Cerca Zona</h4>
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

     
<div class="form-wrapper" style="float-left"> 
<h1 class = "intestazione">Cerca sensore</h1>
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
</div>


<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>


        <section class="main-container">
            <div class="tabel-wrapper centrato">

                <?php
  if (isset($_SESSION['u_email'])) {

    // 1-Cerco l'id dell'utente loggato e lo metto in $cod
    $userMail1 = $_SESSION['u_email'];
    $userMail= mysqli_real_escape_string($conn,$userMail1);
    $sql1= "SELECT * FROM cliente WHERE email = '$userMail' ";
    $resSql1 = mysqli_query($conn, $sql1);
    $arrayDati = mysqli_fetch_array($resSql1);
    $cod1 = $arrayDati['cod_cliente'];
    // FUNZIONA echo "$cod";

    // 2- Cerco le zone
    $cod=mysqli_real_escape_string($conn,$cod1);
    $zone = "SELECT * FROM zona_cliente WHERE cliente = '$cod' ; ";

    $resultZone = mysqli_query($conn, $zone);
    $resultCheckZone = mysqli_num_rows($resultZone);
    $resultZ = mysqli_fetch_array($resultZone);
    $contaZone = mysqli_num_rows($resultZone);

    //controllo massimimi minimi con colori
    $x=mysqli_real_escape_string($conn,$resultZ['id_pos']);
    $queryColor="SELECT * FROM sensori_zona WHERE id_pos = '$x' ;";
    $qColor=mysqli_query($conn,$queryColor);
    $arrColor=mysqli_fetch_array($qColor);
    
    
    $sqlContaSens = "SELECT sensori_zona.id_sensori,zona_cliente.cliente FROM sensori_zona 
    INNER JOIN zona_cliente ON zona_cliente.id_pos=sensori_zona.id_pos WHERE zona_cliente.cliente='$cod';";
    $resultContaSens = mysqli_query($conn, $sqlContaSens);
    $contaSensori = mysqli_num_rows($resultContaSens);
    $displayCS= htmlspecialchars($contaSensori);
    $displayCZ=htmlspecialchars($contaZone);
    ?>
        <section class="cards clearfix">

        <div class="card">
            <img class="card__image" src="res/cerchio.jpg">
            <div class="card__copy">
                <p>Zone :<?php echo  $displayCZ; ?></p>
            </div>
        </div>
   
        <div class="card">
            <img class="card__image" src="res/cerchio.jpg">
            <div class="card__copy">
                <p>Sensori : <?php echo  $displayCS ?></p>
            </div>
        </div>

        
    </section>
    <?php

    if ($resultCheckZone<1) {
    ?>
      <h1>QUESTO ACCOUNT NON HA ANCORA ZONE</h1>
    <?php
    } else {
    ?>
    <div class="scrollable">
    <?php

       foreach ($resultZone as $resultZ) {
           //cerco tutti i sensori in quella zona
           $sensor = $resultZ['id_pos'];
           $querySensor = "SELECT * FROM sensori_zona WHERE id_pos = '$sensor';";
           $resultSensor = mysqli_query($conn, $querySensor);
           $resultS = mysqli_fetch_array($resultSensor);
         
   
       ?>
           <form method="POST" action="infoDash.php">
 
           <table class="table table-bordered">
             <thead>
                   <tr align="center">
                    <th>Nome Sensore</th>
                    <th>Tipo</th>
                    <th>Ultima rilevazione</th>
                   <th>Altro</th>
                  </tr>
             </thead>
      <?php
          $collocazione=$resultZ['id_pos'];
          if ($resultS) {
              foreach ($resultSensor as $resultS) {
                
                $id = $resultS['id_sensori'];
                $collocazione= $resultS['id_pos'];
   
                  $idS=$resultS['id_sensori'];
                  $tip=$resultS['tipo'];
                  $nomeS=$resultS['nome_sensore'];

                  
                  $queryLastRil = "SELECT * FROM $tip WHERE idSensore = '$id' ORDER BY idRilevazione DESC LIMIT 1;";
                  $resRil = mysqli_query($conn,$queryLastRil);
                 
                  $arrRil = mysqli_fetch_array($resRil);
                  $lastRil = $arrRil['valore_rilevato'];
                  $lastRilData = $arrRil['data_rilevamento'];



                  
   
      ?>
                   <tbody id='myTable'>
                   <tr>
                   <input type="hidden" name="name" value=<?php echo $id; ?>>
                   <input type="hidden" name="tipo" value=<?php echo $tip; ?>>
                   <input type="hidden" name="name" value=<?php echo $collocazione; ?>>
                   <input type="hidden" name="nomeS" value=<?php echo $nomeS; ?>>

                   <td name="sensName" align="center"><?php echo htmlspecialchars($nomeS); ?></td>
                   <td align="center"><?php echo htmlspecialchars($tip); ?></td>
                   <?php
                   if($lastRil<= $arrColor['min_critico'] ||  $lastRil>= $arrColor['max_critico']){
                   ?> 
                    <td align="center" > <font color='red'><?php echo htmlspecialchars($lastRil); ?> del <?php echo  htmlspecialchars($lastRilData); ?> </font> </td>
                   <?php 
                   }elseif($lastRil<= $arrColor['min_accettabile'] ||  $lastRil>= $arrColor['max_accettabile'] ){
                   ?> 
                      <td align="center" > <font color='orange'><?php echo  htmlspecialchars($lastRil); ?> del <?php echo  htmlspecialchars($lastRilData); ?></font></td>
                   <?php 
                   }else{

                    ?>                   
                    <td align="center" > <font color='green'><?php echo  htmlspecialchars($lastRil);?> del <?php echo  htmlspecialchars($lastRilData); ?></font></td>
                   <?php 
                   }
                   ?>

                   <td align="center">
                     <button
                       type="submit"
                       class="btn btn-default btn-sm"
                       name="infoSENS"
                       value=<?php echo $id; ?>>
                       <span class="glyphicon glyphicon-info-sign"></span>
                     </button>
                     

                   </td>
                  </tr>
                  </tbody>
                  </div>
                  <?php
              }
          }

           $rZona=$resultZ['zona'];
           ?>
        
         <h3 class="intestazione"><?php echo  htmlspecialchars($rZona); ?></h3>
         <button
         type="submit"
         name="infoZONA"
         value=$collocazione
         >Info Zona
         </button>
         </form>
         <?php
      }
    }
  }
?>
