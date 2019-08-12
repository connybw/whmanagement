<?php
$head = 2;
include "inc/connection.php";
include "inc/head.php";
?>
  <div class="container">
  <br>
	<form method="post">
			 <p><input type="text" class="form-control" id="regalname" name="regalname" placeholder="Name"></p>
			<p> <input class="<?php echo $color; ?>" type="submit" value="Hinzufügen" name="submit" data-ajax="false"></p>
		</form>
		
		<?php
		if(isset($_POST['regalname']))
		{
			$sql="INSERT INTO regal (name) VALUES ('" . $_POST['regalname'] . "')";
			$sqlquery = mysqli_query($db, $sql);
			$sql="SELECT id FROM regal WHERE name ='" . $_POST['regalname'] . "'";
			foreach($pdo->query($sql) as $row)
		{
			$sql="INSERT INTO regaldev (regalid, artikelid, reihe, spalte) VALUES ('" . $row['id'] . "', '0', '1', '1')";
			$sqlquery = mysqli_query($db, $sql);
		}
			
		header("Location: regale.php");
		}
		?>
		<hr>
		</div>
<?php
include "inc/foot.php";
?>

