<?php
$head = 3;
include "inc/head.php";
?>
<main role="main">


  <div class="container">
		 <table class="table">
		  <thead>
			<tr>
			  <th scope="col">ID</th>
			  <th scope="col">Name</th>
			  <th><a class="<?php echo $color; ?>" href="createartikel.php" role="button"><span class="fas fa-plus" aria-hidden="true"></span></a></th>
			</tr>
		  </thead>
		  <tbody>
		  <?php
		  $sql="SELECT id, name FROM artikel ORDER BY name";
		  foreach($pdo->query($sql) as $row)
		{
			if($row['id'] == 0)
			{
				
			}
			else
			{
			echo "<tr>";
			echo "<td>" . $row['id'] . "</td>";
			echo "<td>" . htmlentities( $row['name'], ENT_COMPAT, 'ISO-8859-1') . "</td>";
			echo "<td>" ;
			echo '<form method="post" action="artikeldetail.php?artikelid=' . $row['id'] . '">' . $btnlink . '</form>';
			echo "</td>";
			echo "</tr>";
			}
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

