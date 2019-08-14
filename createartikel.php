<?php
$head = 3;
include "inc/connection.php";
include "inc/head.php";
?>
<div class="container">
  <br>
	<form method="post">
		<div class="form-group">
			<label for="artikel">Artikel *</label>
			<input type="text" class="form-control" id="artikel" name="artikel" >
			</div>
			<div class="form-group">
			<label for="artikelnummer">Artikelnummer *</label>
			 <p><input type="text" class="form-control" id="artikelnummer" name="artikelnummer" ></p>
			 </div>
			 <div class="form-group">
			<label for="barcode">Barcode</label>
			 <p><input type="text" class="form-control" id="barcode" name="barcode" ></p>
			 </div>
			 <div class="form-group">
			<label for="bestand">Bestand *</label>
			 <p><input type="text" class="form-control" id="bestand" name="bestand" ></p>
			 </div>
			 <div class="form-group">
			<label for="min">Mindestanzahl</label>
			 <p><input type="text" class="form-control" id="min" name="min" ></p>
			 </div>
			<p><input class="<?php echo $color; ?>" type="submit" value="Speichern" name="submit" data-ajax="false"></p>
		</form>
		
		<?php
		if(isset($_POST['artikel']) && isset($_POST['bestand']) && isset($_POST['artikelnummer']))
		{
			$artikel = $_POST['artikel'];
			$bestand = $_POST['bestand'];
			$artikelnummer = $_POST['artikelnummer'];
			
			if(empty($_POST['barcode']))
			{
				$barcode = $artikelnummer;
			}
			else
			{
				$barcode = $_POST['barcode'];
			}
			
			if(empty($_POST['min']))
			{
				$min = '10';
			}
			else
			{
				$min = $_POST['min'];
			}
			
			
			$sql="INSERT INTO artikel (name, artikelNR, barcode, bestand, min) VALUES ('" . $artikel . "', '" . $artikelnummer . "', '" . $barcode . "', '" . $bestand . "', '" . $min . "')";
			$sqlquery = mysqli_query($db, $sql);
		
			$sql = "SELECT id FROM artikel WHERE name = '" . $artikel . "' AND artikelNR = '" . $artikelnummer . "'";
			foreach($pdo->query($sql) as $row)
			{
			$artikelid = $row['id'];
			}
			

		$url = 'artikeldetail.php?artikelid=' . $artikelid;
		redirect($url);
		}
		?>
		<hr>
		</div>
<?php
include "inc/foot.php";
?>

