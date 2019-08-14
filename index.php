<?php
$head = 1;
include "inc/head.php";
include "bcgen/src/BarcodeGenerator.php";
include "bcgen/src/BarcodeGeneratorPNG.php";
$warning = 0;
?>
<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h2>Dashboard</h2>
      <!-- <p>Zum Artikel scannen den unteren Knopf drücken</p>
      <p><a class="<?php //echo $color; ?>" href="#" role="button"><span class="fas fa-camera" aria-hidden="true"></span> Scan</a></p> -->
    </div>
  </div>

  <div class="container">
    <!-- Example row of columns -->
    <div class="row">
	<?php
	
	//--PRE--
	$sql = "SELECT bestand, min, id FROM artikel";
	foreach($pdo->query($sql) as $row)
	{
		if($row['bestand'] <= $row['min'] && $row['id'] != 0)
		{
			$warning = 1;
		}
			
	}
	
	if($warning == 1)
	{
	
	echo'<table class="table">
		  <thead>
			<tr>
			  <th scope="col">Artikel</th>
			  <th scope="col">Barcode</th>
			  <th scope ="col">Artikelnummer</th>
			  <th scope = "col">Soll</th>
			  <th scope = "col">Ist</th>
			  <th scope ="col"></th>
			</tr>
		  </thead>
		  <tbody>';
	$sql = "SELECT * FROM artikel";
	foreach($pdo->query($sql) as $row)
		{
			if($row['bestand'] <= $row['min'] && $row['id'] != 0)
			{
				$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
				if($row['bestand'] < $row['min'])
				{
					$fontcolor = "red";
				}
				else
				{
					$fontcolor = "orange";
				}
				echo "<tr style='color:" . $fontcolor . "'>";
				echo "<td>" . htmlentities( $row['name'], ENT_COMPAT, 'ISO-8859-1') . "</td>";
				echo '<td><img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row['barcode'], $generator::TYPE_CODE_128)) . '"></td>';
				echo "<td>" . $row['artikelNR'] . "</td>";
				echo "<td>" . $row['min'] . "</td>";
				echo "<td>" . $row['bestand'] . "</td>";
				echo '<td><a href = "https://www.google.com/search?q=' . $row['artikelNR'] . '">' . $btncartplus .'</a></td>';
				echo "</tr>";
			}
			
		}
	echo "</tbody>
	</table>";
	}
	if($warning == 0)
	{
		echo "Alle Artikel sind genügend vorhanden.";
	}
	?>
    </div>

    <hr>

  </div> <!-- /container -->

</main>

<?php
include "inc/foot.php";
?>
