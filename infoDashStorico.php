<?php
include_once 'includes/dbh.inc.php';

if (isset($_POST['submit'])){
	$prima= mysqli_real_escape_string($conn, $_POST['primaData']);
	$ultima= mysqli_real_escape_string($conn, $_POST['ultimaData']);
	$tipo = mysqli_real_escape_string($conn,$_POST['tipo']);
	$cod = mysqli_real_escape_string($conn,$_POST['cod']);

	$sqlRilevazioniG = "SELECT * FROM $tipo WHERE idSensore = '$cod' AND data_rilevamento >= '$prima' AND data_rilevamento <= '$ultima' ; ";

	$resultRilevazioniG = mysqli_query($conn, $sqlRilevazioniG);
   
    $arrGrafico=mysqli_fetch_array($resultRilevazioniG);

?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});
            
      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'DataRil');
        data.addColumn('number', 'ValoreRilevato');
        //foreach (tutteledate as data) {
      
        <?php
            foreach ($resultRilevazioniG as $arrGrafico) {
        ?>
        data.addRows([
              ['<?php echo $arrGrafico['data_rilevamento']; ?>',Number('<?php echo $arrGrafico['valore_rilevato']; ?>')]
        ]);  
        <?php } 
        
        ?>


        //}
        // Set chart options
        var options = {'title':'Rilevazioni sensore',
                       'width':1280,
                       'height':600};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>


<div id="chart_div"></div>




<?php
}
?>