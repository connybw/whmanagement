<?php
$head = 3;
include "inc/head.php";
include "bcgen/src/BarcodeGenerator.php";
include "bcgen/src/BarcodeGeneratorPNG.php";
$artikelid = $_GET['artikelid'];
?>
<main role="main">


  <div class="container">
  <br>
		<?php
		$sql = "SELECT * FROM artikel WHERE id = '" . $artikelid . "'";
		foreach($pdo->query($sql) as $row)
		{
			$artikelname = $row['name'];
			$artikelnummer = $row['artikelNR'];
			$bestand = $row['bestand'];
			$barcode = $row['barcode'];
			
		}
		
		echo '<div class = "row">';
		echo "<h4>".$artikelname."</h4>&nbsp;";
		?>
		<form method="post" action="remregal.php?regalid=<?php echo $regalid; ?>"><?php echo $btntrash; ?></form>
		</div>
		
		<p><?php
		$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
		echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($barcode, $generator::TYPE_CODE_128)) . '">';
		?></p>
		
		<br>
		<p>Artikel Nr.: <?php echo $artikelnummer; ?> </p>
		<p>Verfügbar: <?php echo $bestand;?> </p>
		<br>
		<table class="table">
		  <thead>
			<tr>
			  <th scope="col">RegalNr</th>
			  <th scope="col">Regal</th>
			  <th scope="col">Reihe</th>
			  <th scope="col">Spalte</th>
			</tr>
		  </thead>
		  
		  <tbody>
		 <?php
		$sql = "SELECT regal.name AS regalname, regaldev.id, regalid, reihe, spalte FROM regaldev JOIN regal ON regaldev.regalid = regal.id WHERE artikelid = '" . $artikelid . "'";
		
		foreach($pdo->query($sql) as $row)
		{
			echo "<tr>";
			echo "<td>" . $row['regalid'] . "</td>";
			echo "<td>" . htmlentities( $row['regalname'], ENT_COMPAT, 'ISO-8859-1') . "</td>";
			echo "<td>" . $row['reihe'] . "</td>";
			echo "<td>" . $row['spalte'] . "</td>";
			echo "</tr>";
		}
		?>
		</tbody>
		</table>
      <hr>
    </div>



</main>
<?php
include "inc/foot.php";
?>

