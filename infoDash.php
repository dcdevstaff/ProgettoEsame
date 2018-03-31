
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
<!-- INTEGRAZIONE BOOTSTRAP FRAMEWORK -->
	<link
	rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
	>

  <link
  rel="stylesheet"
  href="style.css"
  >
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
  <link
  rel="stylesheet"
  href="stile3.css"
  >

	<link rel="stylesheet" type="text/css"
  href="stylec2.css"
  >

  

	<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
	integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
	crossorigin="anonymous">
	</script>
  <style>
    body.black {

      background-color: #f2f2f2;

    }
  </style>
  <title>Radar</title>
</head>



<header>
<nav class="navbar navbar-inverse navbar-fixed-top" style= "margin-bottom: 0px">
  <div class="container-fluid">

    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
    	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

		<ul class="nav navbar-nav">

      <li><a href="contact.php"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> Contattaci</a></li>

		  <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Info <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="HomeIOT.php">Home IOT (verrà tolto)</a></li>
            <li role="separator" class="divider"></li> 
            <li><a href="HomeCLIENTE.php">Dashboard (verrà tolto)</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="aboutRadar.php">About Radar</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="aboutIOT.php">About IOT</a></li>
          </ul>
      </li>
    </ul>

     	 <?php
if (isset($_SESSION['u_email'])) {
    echo '<form action="includes/logout.inc.php" class="navbar-form navbar-right  method="POST">
							<button type="submit" name="submit">Logout</button>
							</form>';
} else {
    echo '<form class="navbar-form navbar-right" action="includes/login.inc.php" method="POST">
       							<div class="form-group">
          							<input type="text" class="form-control" name="email" placeholder="E-mail">
         							<input type="password" class="form-control" name="password" placeholder="Password" >
        						</div>

       								<button type="submit" name="submit" class="btn btn-default">Login</button>
     						</form>';
}?>


        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


</header>
<body class="black">



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>


<body>
 


<?php
 // include_once 'header.php';


if(isset($_POST['infoSENS'])){
	
	include_once 'includes/dbh.inc.php';

	$info= $_POST['infoSENS'];

	$cod = mysqli_real_escape_string($conn,$info);
    $tipo = mysqli_real_escape_string($conn, $_POST['tipo']);
    $nomeS = mysqli_real_escape_string($conn, $_POST['nomeS']);

    $sqlRilevazioni = "SELECT * FROM $tipo WHERE idSensore = '$cod' ORDER BY idRilevazione DESC; ";
    $resultRilevazioni = mysqli_query($conn, $sqlRilevazioni);
    $arrRilevazioni = mysqli_fetch_array($resultRilevazioni);
    $arrGrafico=mysqli_fetch_array($resultRilevazioni);

    $sqlCol="SHOW COLUMNS FROM $tipo ;";
    $nomeCampi= mysqli_query($conn,$sqlCol);
 	  $arrCampi = mysqli_fetch_array($nomeCampi);

 	  $sqlinfo="SELECT marca FROM sensori_zona WHERE id_sensori = '$cod';";
    $sInfo= mysqli_query($conn,$sqlinfo);
 	  $sArr=mysqli_fetch_array($sInfo);
}



 ?>
   <section class="cover cover--single" style="margin-top: 50px">
        <div class="cover__filter"></div>
        <div class="cover__caption">
            <div class="cover__caption__copy">
                <h1 style="margin: auto">Info Sensore ID : <?php echo $info." Tipo : ".$tipo." Marca : ".$sArr['marca']; ?></h1>
            </div>
        </div>
    </section>
    <br>

     <div class="container">
    <canvas id="myChart"></canvas>
  </div>



    
<?php /*
 echo "

*/
    echo"
        <div class=\"table-wrapper\">
        <h1 class=\"intestazione\"> Sensore: $nomeS </h1>
        <table class=\"table table-bordered\" style=\"width: 400px\">
        <thead>
            <tr>"; 

            foreach ($nomeCampi as $arrCampi) {
               echo "<th>".$arrCampi['Field']."</th>";
            }  echo "</tr> </thead> <tbody>";
            //p.o. rilevazione stampa una riga
            foreach ($resultRilevazioni as $arrRilevazioni) {
              echo "<tr>"; 
              $dataRil = $arrRilevazioni[$arrCampi['Field']];
                  foreach ($arrRilevazioni as $dataRil)  {
                    echo "<td>" . $dataRil . "</td>";
                  }
               echo "</tr>";
            }  
            echo "</tbody>";
        		

//DA QUIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII
echo ("<script LANGUAGE='JavaScript'>
					var i=1;
					var graphic = [];
	</script>");

    foreach ($resultRilevazioni as $arrGrafico) {    //Questo pezzo di condice fatto per incastonare variabili JS e Php dovrebbe prendermi le Date rilevazioni
    	$temp=$arrGrafico['data_rilevamento'];		//dal php e metterle in un array Js. Andando piu giu se vedi in Js in un labels.
    												//ce l'array ricavato messo "forzato" senza cilcare per testare.... ora da Crome in effetti escono degli anni
    												//che prima non uscivano ma da dove cazzo li ha presi???? non sto capendo piu un cazzo faccio pausa.
    	echo ("<script LANGUAGE='JavaScript'>		
    			var temp=".$temp.";
				graphic.push(temp);
				i++;
			  </script>");
    }
//A QUIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIIII
    ?>






 <script>
 	

    let myChart = document.getElementById('myChart').getContext('2d');

    // Global Options
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 18;
    Chart.defaults.global.defaultFontColor = '#777';

    let massPopChart = new Chart(myChart, {
      type:'line', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
      data:{
        labels:[graphic[0],graphic[1],graphic[2],graphic[3],graphic[4],graphic[5],graphic[6]],
        datasets:[{
          label:'Rilevazione',
          data:[
          4,
           5,
            15,
            10,
            2,
            9,20
          ],
          //backgroundColor:'green',
          backgroundColor:[
            'rgba(255, 99, 132, 0.6)',
            'rgba(54, 162, 235, 0.6)',
            'rgba(255, 206, 86, 0.6)',
            'rgba(75, 192, 192, 0.6)',
            'rgba(153, 102, 255, 0.6)',
            'rgba(255, 159, 64, 0.6)',
            'rgba(255, 99, 132, 0.6)'
          ],
          borderWidth:1,
          borderColor:'#777',
          hoverBorderWidth:3,
          hoverBorderColor:'#000'
        }]
      },
      options:{
        title:{
          display:true,
          text:'Rilevazioni del Sensore',
          fontSize:25
        },
        legend:{
          display:true,
          position:'right',
          labels:{
            fontColor:'#000'
          }
        },
        layout:{
          padding:{
            left:50,
            right:0,
            bottom:0,
            top:0
          }
        },
        tooltips:{
          enabled:true
        }
      }
    });
  </script>
</body>



    </html>