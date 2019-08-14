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
			$artikelid = $row['id'];
			$artikelname = htmlentities( $row['name'] , ENT_COMPAT, 'ISO-8859-1');
			$artikelnummer = $row['artikelNR'];
			$bestand = $row['bestand'];
			$barcode = $row['barcode'];
			$min = $row['min'];
			
		}
		
		echo '<div class = "row">';
		echo "<h4>".$artikelname."</h4>";
		?>
		&nbsp;
		&nbsp;
		<form method="post" action="editartikel.php?artikelid=<?php echo $artikelid; ?>"><?php echo $btnedit; ?></form>
		&nbsp;
		<form method="post" action="remartikel.php?artikelid=<?php echo $artikelid; ?>"><?php echo $btntrash; ?></form>
		&nbsp;
		<form method="post" action="addtocart.php?artikelid=<?php echo $artikelid; ?>"><?php echo $btncart; ?></form>
		&nbsp;
		<form method="post" action="addtowh.php?artikelid=<?php echo $artikelid; ?>"><?php echo $btnplussquare; ?></form>
		
		</div>
		
		<p><?php
		$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
		echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($barcode, $generator::TYPE_CODE_128)) . '">';
		?></p>
		
		<br>
		<p>Artikel Nr.: <?php echo $artikelnummer; ?> </p>
		<?php
		if($bestand > $min)
		{
			$fontcolor = "green";
		}
		else if($bestand == $min)
		{
			$fontcolor = "orange";
		}
		else if($bestand < $min)
		{
			$fontcolor = "red";
		}
		
		echo '<p style="color:' . $fontcolor .'">Verfügbar: ' . $bestand .' (min. ' . $min . ')';
		if($fontcolor == "orange" || $fontcolor == "red")
		{
		echo '&nbsp;<a href = "https://www.google.com/search?q=' . $artikelnummer . '">' . $btncartplus .'</a></p>';
		}
		else
		{
		echo '</p>';
		}
		?>
		
		<br>
		<table class="table">
		  <thead>
			<tr>
			  <th scope="col">RegalNr</th>
			  <th scope="col">Regal</th>
			  <th scope="col">Reihe</th>
			  <th scope="col">Spalte</th>
			  <th></th>
			</tr>
		  </thead>
		  
		  <tbody>
		 <?php
		$sql = "SELECT regal.name AS regalname, regaldev.id AS regaldevid, regalid, reihe, spalte FROM regaldev JOIN regal ON regaldev.regalid = regal.id WHERE artikelid = '" . $artikelid . "'";
		
		foreach($pdo->query($sql) as $row)
		{
			echo "<tr>";
			echo "<td>" . $row['regalid'] . "</td>";
			echo "<td><form method='post' action='regal.php?regalid=" . $row['regalid'] ."'>" . $btnhead . htmlentities( $row['regalname'] , ENT_COMPAT, 'ISO-8859-1'). $btntail ."</form></td>";
			echo "<td>" . $row['reihe'] . "</td>";
			echo "<td>" . $row['spalte'] . "</td>";
			echo '<td><form method="post" action="remartikelfromregal.php?regaldevid=' . $row['regaldevid'] . '">' . $btntrash . '</form></td>';
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

