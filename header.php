<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>


	<title>Radar</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


	<!-- INTEGRAZIONE BOOTSTRAP FRAMEWORK -->
	<link
	rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
	>

  <link
  rel="stylesheet"
  href="style.css"
  >

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