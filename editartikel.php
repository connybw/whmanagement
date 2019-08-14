<?php
$head = 3;
include "inc/connection.php";
include "inc/head.php";
$header = 0;
$artikelid = $_GET['artikelid'];

$sql = "SELECT * FROM artikel WHERE id = '" . $artikelid . "'";
foreach($pdo->query($sql) as $row)
		{
			$artikel_in = htmlentities( $row['name'], ENT_COMPAT, 'ISO-8859-1');
			$barcode_in = $row['barcode'];
			$artikelnummer_in = $row['artikelNR'];
			$bestand_in = $row['bestand'];
			$min_in = $row['min'];
		}
?>
 <div class="container">
  <br>
	<form method="post">
		<div class="form-group">
			<label for="artikel">Artikel</label>
			<input type="text" class="form-control" id="artikel" name="artikel" value="<?php echo $artikel_in; ?>">
			</div>
			<div class="form-group">
			<label for="artikelnummer">Artikelnummer</label>
			 <p><input type="text" class="form-control" id="artikelnummer" name="artikelnummer" value="<?php echo $artikelnummer_in; ?>"></p>
			 </div>
			 <div class="form-group">
			<label for="barcode">Barcode</label>
			 <p><input type="text" class="form-control" id="barcode" name="barcode" value="<?php echo $barcode_in; ?>"></p>
			 </div>
			 <div class="form-group">
			<label for="bestand">Bestand</label>
			 <p><input type="text" class="form-control" id="bestand" name="bestand" value="<?php echo $bestand_in; ?>"></p>
			 </div>
			 <div class="form-group">
			<label for="min">Mindestanzahl</label>
			 <p><input type="text" class="form-control" id="min" name="min" value="<?php echo $min_in; ?>"></p>
			 </div>
			<p><input class="<?php echo $color; ?>" type="submit" value="Speichern" name="submit" data-ajax="false"></p>
		</form>
		
		
		<?php
		if( isset($_POST['artikel']) && $_POST['artikel'] != $artikel_in )
		{
			$sql="UPDATE artikel SET name = '" . $_POST['artikel'] . "'  WHERE id = '" . $artikelid . "'";
			$sqlquery = mysqli_query($db, $sql);
			$header = 1;
		}
		
		if( isset($_POST['artikelnummer']) && $_POST['artikelnummer'] != $artikelnummer_in)
		{
			$sql="UPDATE artikel SET artikelNR = '" . $_POST['artikelnummer'] . "'  WHERE id = '" . $artikelid . "'";
			$sqlquery = mysqli_query($db, $sql);
			$header = 1;
		}
		
		if( isset($_POST['barcode']) && $_POST['barcode'] != $barcode_in)
		{
			$sql="UPDATE artikel SET barcode = '" . $_POST['barcode'] . "'  WHERE id = '" . $artikelid . "'";
			$sqlquery = mysqli_query($db, $sql);
			$header = 1;
		}
		
		if( isset($_POST['bestand']) && $_POST['bestand'] != $bestand_in)
		{
			$sql="UPDATE artikel SET bestand = '" . $_POST['bestand'] . "'  WHERE id = '" . $artikelid . "'";
			$sqlquery = mysqli_query($db, $sql);
			$header = 1;
		}
		
		if( isset($_POST['min']) && $_POST['min'] != $min_in)
		{
			$sql="UPDATE artikel SET min = '" . $_POST['min'] . "'  WHERE id = '" . $artikelid . "'";
			$sqlquery = mysqli_query($db, $sql);
			$header = 1;
		}
		
		if($header == 1)
		{
		$url = 'artikeldetail.php?artikelid=' . $artikelid;
		redirect($url);
		}
		?>
		<hr>
		</div>
<?php
include "inc/foot.php";
?>

