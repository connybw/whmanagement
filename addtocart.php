<?php
$head = 3;
include "inc/connection.php";
include "inc/head.php";
$error = 0;
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
		$sql = "SELECT artikelid FROM wagen";
		foreach($pdo->query($sql) as $row)
			{
				if($artikelid == $row['artikelid'])
				{
					echo "Der Artikel befindet sich bereits im Wagen.";
					$error = 1;
				}
			}
		$sql = "SELECT bestand, name FROM artikel WHERE id = '" . $artikelid ."'";
		foreach($pdo->query($sql) as $row)
			{
				if($_POST['anzahl'] > $row['bestand'])
				{
					echo "Nicht genug Artikel verfügbar. " . htmlentities( $row['name'], ENT_COMPAT, 'ISO-8859-1') . " ist noch " . $row['bestand'] . "x verfügbar";
					$error = 1;
				}
			}
		if($error == 0)
		{
			$sql="INSERT INTO wagen (artikelid, anzahl) VALUES ('". $artikelid ."', '" . $_POST['anzahl'] . "')";
			$sqlquery = mysqli_query($db, $sql);
			
			header("Location: cart.php");
		}
		}
		?>
		<hr>
		</div>
<?php
include "inc/foot.php";
?>

