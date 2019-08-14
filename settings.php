<?php
$head = 5;
include "inc/connection.php";
include "inc/head.php";

$sql = "SELECT * FROM settings";
foreach($pdo->query($sql) as $row)
		{
			$button_in = $row['button'];
			$company_in = htmlentities( $row['company'], ENT_COMPAT, 'ISO-8859-1');
			$slogan_in = htmlentities( $row['slogan'], ENT_COMPAT, 'ISO-8859-1');
		}
		
?>
  <div class="container">
  <br>
	<form method="post">
		<div class="form-group">
			<label for="company">Firmenname</label>
			<input type="text" class="form-control" id="company" name="company" value="<?php echo $company_in?>">
			</div>
			<div class="form-group">
			<label for="slogan">Slogan</label>
			 <p><input type="text" class="form-control" id="slogan" name="slogan" value="<?php echo $slogan_in ?>"></p>
			 </div>
			<p><input class="<?php echo $color; ?>" type="submit" value="Speichern" name="submit" data-ajax="false"></p>
		</form>
		
		<?php
		if( isset($_POST['company']) && $_POST['company'] != $company_in )
		{
			$sql="UPDATE settings SET company = '" . $_POST['company'] . "'  WHERE id = 0";
			$sqlquery = mysqli_query($db, $sql);
			if($_POST['slogan'] != $slogan_in)
			{
			}
			else
			{
			header("Location: settings.php");
			}
		}
		if( isset($_POST['slogan']) && $_POST['slogan'] != $slogan_in)
		{
			$sql="UPDATE settings SET slogan = '" . $_POST['slogan'] . "'  WHERE id = 0";
			$sqlquery = mysqli_query($db, $sql);
			header("Location: settings.php");
		}

		?>
		<hr>
		</div>
<?php
include "inc/foot.php";
?>

