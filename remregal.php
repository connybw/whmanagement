<?php
$head = 2;
include "inc/connection.php";
include "inc/head.php";
?>
<?php
$regalid = $_GET['regalid'];

			$sql="DELETE FROM regal WHERE id ='" . $regalid . "'";
			$sqlquery = mysqli_query($db, $sql);
			
		header("Location: regale.php");
		?>
		<hr>
		</div>
<?php
include "inc/foot.php";
?>

