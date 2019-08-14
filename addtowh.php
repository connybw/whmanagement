<?php
$head = 3;
include "inc/connection.php";
include "inc/head.php";
$artikelid = $_GET['artikelid'];

?>
  <div class="container">
  <br>
	<form method="post">
			 <p><input type="text" class="form-control" id="anzahl" name="anzahl" placeholder="Anzahl"></p>
			<p> <input class="<?php echo $color; ?>" type="submit" value="Hinzufügen" name="submit" data-ajax="false"></p>
		</form>
		
		<?php
		if(isset($_POST['anzahl']))
		{
			$sql = "SELECT bestand FROM artikel WHERE id ='". $artikelid ."'";
			foreach($pdo->query($sql) as $row)
			{
				$bestand = $row['bestand'];
			}
			$newbestand = $bestand + $_POST['anzahl'];
				
			$sql = "UPDATE artikel SET bestand = '" . $newbestand . "' WHERE id ='" . $artikelid . "'";
			$sqlquery = mysqli_query($db, $sql);
			
			$sql = "INSERT INTO history (artikelid, anzahl, plusminus) VALUES ('" . $artikelid . "', '" . $_POST['anzahl'] . "', '1')" ;
			$sqlquery = mysqli_query($db, $sql);
			
			header("Location: artikeldetail.php?artikelid=" . $artikelid . "");
		}
		?>
		<hr>
		</div>
<?php
include "inc/foot.php";
?>

