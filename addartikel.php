<?php
$head = 2;
include "inc/connection.php";
include "inc/head.php";
$regal = $_GET['regalid'];
$reihe = $_GET['reihe'];
$spalte = $_GET['spalte'];
$spalte = $spalte +1;
?>
  <div class="container">
  <br>
<form method="post">
			<p><select id="artikel" class="form-control" name="artikel">
				<?php
				$sql = "SELECT id, name  FROM artikel ORDER BY name";
					foreach ($pdo->query($sql) as $row) 
					{
						if($row['name'] == "nulli")
						{}
						else
						{
						echo '<option value="' . $row['id'] . '">' . htmlentities( $row['name'] , ENT_COMPAT, 'ISO-8859-1')  . ' </option>';
						}
					}
					
				?>
			</select></p>
 
			<p><input class="<?php echo $color; ?>" type="submit" value="Hinzufügen" name="submit" data-ajax="false"></p>
		</form>
		
		<?php
		if(isset($_POST['artikel']))
		{
			$sql="UPDATE regaldev SET artikelid = '" . $_POST['artikel'] . "'  WHERE regalid = '" .  $regal ."' AND reihe = '" . $reihe . "' AND spalte = '" . $spalte ."'";
			$sqlquery = mysqli_query($db, $sql);
			header("Location: regal.php?regalid=" . $regal ."");
		}
		?>
		<hr>
		</div>
<?php
include "inc/foot.php";
?>

