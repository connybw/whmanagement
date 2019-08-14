<?php
$head = 3;
include "inc/head.php";
$suche = $_GET['search'];
?>
<main role="main">


  <div class="container">
		 <table class="table">
		  <thead>
			<tr>
			  <th scope="col"></th>
			  <th scope="col">Artikel</th>
			  <th scope="col">Bestand</th>
			  <th scope="col">Regal</th>
			  <th scope="col">Reihe</th>
			  <th scope="col">Spalte</th>
			  <th scope="col">Details</th>
			</tr>
		  </thead>
		  <tbody>
		  <?php
		  $sql="SELECT id, name, bestand, min FROM artikel WHERE name LIKE '%" . $suche ."%' ORDER BY name";
		  foreach($pdo->query($sql) as $row)
		{
			$artikelid = $row['id'];
			$bestand = $row['bestand'];
			$artikel = htmlentities( $row['name'], ENT_COMPAT, 'ISO-8859-1');
			if($row['id'] != 0)
			{
			$innersql="SELECT regal.name AS regalname, regaldev.reihe AS reihe, regaldev.spalte AS spalte FROM regaldev JOIN regal ON regal.id = regaldev.regalid WHERE artikelid = '" . $artikelid ."'";
			foreach($pdo->query($innersql) as $row)
			{
			echo "<tr>";
			if($bestand > 0)
			{
				echo '<td><button type="create" class="btn btn-success"><span class="fas fa-check-circle" aria-hidden="true"></span></button></td>';
			}
			else
			{
				echo '<td><button type="create" class="btn btn-danger"><span class="fas fa-times-circle" aria-hidden="true"></span></button></td>';
			}
			
			echo "<td>" . $artikel . "</td>";
			echo "<td>" . $bestand ."</td>";
			echo "<td>" . $row['regalname'] . "</td>";
			echo "<td>" . $row['reihe'] . "</td>";
			echo "<td>" . $row['spalte'] . "</td>";
			echo "<td>" ;
			echo '<form method="post" action="artikeldetail.php?artikelid=' . $artikelid . '">' . $btnlink . '</form>';
			echo "</td>";
			echo "</tr>";
			}
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

