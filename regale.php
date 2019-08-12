<?php
$head = 2;
include "inc/head.php";
?>
<main role="main">


  <div class="container">
		 <table class="table">
		  <thead>
			<tr>
			  <th scope="col">ID</th>
			  <th scope="col">Name</th>
			  <th><a class="<?php echo $color; ?>" href="addregal.php" role="button"><span class="fas fa-plus" aria-hidden="true"></span></a></th>
			</tr>
		  </thead>
		  <tbody>
		  <?php
		  $sql="SELECT id, name FROM regal ORDER BY id";
		  foreach($pdo->query($sql) as $row)
		{
			echo "<tr>";
			echo "<td>" . $row['id'] . "</td>";
			echo "<td>" . htmlentities( $row['name'], ENT_COMPAT, 'ISO-8859-1') . "</td>";
			echo "<td>" ;
			echo '<form method="post" action="regal.php?regalid=' . $row['id'] . '">' . $btnlink . '</form>';
			echo "</td>";
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

