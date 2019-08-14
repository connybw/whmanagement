<?php
$head = 4;
include "inc/head.php";
?>
<main role="main">


  <div class="container">
		 <table class="table">
		  <thead>
			<tr>
			  <th scope="col">Artikel</th>
			  <th scope="col">Anzahl</th>
			  <th scope="col"><a href="submitcart.php"><?php echo $btncheckcircle;?></a></th>
			</tr>
		  </thead>
		  <tbody>
		  <?php
		  $sql="SELECT wagen.id AS wagenid, artikel.name AS artikelname, wagen.anzahl FROM wagen JOIN artikel ON artikel.id = wagen.artikelid";
		  foreach($pdo->query($sql) as $row)
		{
			echo "<tr>";
			echo "<td>" . htmlentities( $row['artikelname'], ENT_COMPAT, 'ISO-8859-1') . "</td>";
			echo "<td>" . $row['anzahl'] . "</td>";
			echo "<td>" ;
			echo '<form method="post" action="remfromcart.php?wagenid=' . $row['wagenid'] . '">' . $btntrash . '</form>';
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

