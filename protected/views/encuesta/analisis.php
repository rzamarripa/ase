<?php
	$this->pageCaption='Análisis de la Encuesta:';
	$this->pageTitle=Yii::app()->name . ' - ' . $this->pageCaption;
	$this->pageDescription=$model->nombre;
	
/*
	echo '<script type="text/javascript">
		// Load the Visualization API and the piechart package.
		google.load("visualization", "1.0", {"packages":["corechart"]});

		// Set a callback to run when the Google Visualization API is loaded.
		google.setOnLoadCallback(drawChart);

		// Callback that creates and populates a data table, 
		// instantiates the pie chart, passes in the data and
		// draws it.
		function drawChart() {

		// Create the data table.
		var data = new google.visualization.DataTable();
		data.addColumn("string", "Beneficiarios");
		data.addColumn("number", "Cantidad");
		data.addColumn({type: "string", role: "tooltip"});';		
		

		echo '
		// Set chart options
		

		// Instantiate and draw our chart, passing in some options.
		var chart = new google.visualization.Columns(document.getElementById("analisisEncuesta"));
		chart.draw(data, options);
    }
    </script>';
    */
    
    
?>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Respuestas');
        data.addColumn('number', 'Votos');
        data.addColumn({type: "string", role: "tooltip"});
        data.addRows([
        	<?php        
		        foreach($respuestas as $respuesta){
							echo '["' . $respuesta->nombre . '",' . $respuesta->votos . ',"' . $respuesta->nombre . ':' . number_format($respuesta->votos) . '"],';
						} 
					?>
        ]);
        // Set chart options
        var options = {'title':"<?php echo $model->nombre; ?>",
                       'width':"100%",
                       'height':500};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.ColumnChart(document.getElementById('analisisEncuesta'));
        chart.draw(data, options);
      }
    </script>

<div id="analisisEncuesta" style="height: 600px;"></div>

