<?php
$head = 3;
include "inc/connection.php";
include "inc/head.php";
?>
  <div class="container">
  <br>
	<form method="post">
			 <p><input type="text" class="form-control" id="artikelname" name="artikelname" placeholder="Name"></p>
			<p><input class="<?php echo $color; ?>" type="submit" value="Hinzufügen" name="submit" data-ajax="false"></p>
		</form>
		
		<?php
		if(isset($_POST['artikelname']))
		{
			$sql="INSERT INTO artikel (name) VALUES ('" . $_POST['artikelname'] . "')";
			$sqlquery = mysqli_query($db, $sql);
		
			
		header("Location: artikel.php");
		}
		?>
		<hr>
		</div>
<?php
include "inc/foot.php";
?>

