<?php
$head = 2;
include "inc/head.php";
$count = 0;
$regalid = $_GET['regalid'];
$sql="SELECT name FROM regal WHERE id = '" . $regalid . "'";
		  foreach($pdo->query($sql) as $row)
		  {
			  $regalname = $row['name'];
		  }
?>

<main role="main">
  <div class="container">
  <br>
  
    <div class = "row">
	<h4><?php echo $regalname ;?></h4>&nbsp
	<form method="post" action="remregal.php?regalid=<?php echo $regalid; ?>"><?php echo $btntrash; ?></form>
	</div>
	
		 <table class="table">
		  <thead>
			<tr>
			<th></th>
			<?php
			$sql="SELECT MAX(spalte) AS MAXi FROM regaldev WHERE regalid = '" . $regalid . "'";
			 foreach($pdo->query($sql) as $row)
			{
			$max = $row['MAXi'];
			$globalmax = $max;
			$up = 1;
			while($max > 0)
			{
			echo '<th scope"col">' . $up  .'</th>';
			$max = $max -1;
			$up = $up +1;
			}
			}
			?>
			</tr>
		  </thead>
		  <tbody>
		  <?php
		  $sql="SELECT DISTINCT reihe FROM regaldev WHERE regalid = '" . $regalid ."' ORDER BY reihe";
		  foreach($pdo->query($sql) as $row)
		{
			$reihe = $row['reihe'];
			echo "<tr>";
			echo "<td>" . $reihe . "</td>";
			$sqlinner ="SELECT artikel.name AS name, spalte, artikelid FROM regaldev JOIN artikel ON regaldev.artikelid = artikel.id WHERE reihe = '" . $reihe . "' AND regalid = '" . $regalid ."' ORDER BY spalte";
			foreach($pdo->query($sqlinner) as $row)
			{
			if($row['name'] == "nulli")
			{
				if(!isset($maxspalte))
				{
					$maxspalte = 0;
				}
				echo '<td><form method="post" action="addartikel.php?regalid=' . $regalid .'&spalte=' . $maxspalte .'&reihe=' . $reihe .'">' . $btnclone . '</form></td>';
			}
			else
			{
			echo "<td><form method='post' action='artikeldetail.php?artikelid=" . $row['artikelid'] ."'>" . $btnhead . htmlentities( $row['name'] , ENT_COMPAT, 'ISO-8859-1'). $btntail ."</form></td>";
			}
			$maxspalte = $row['spalte'];
			}
			$misspalte = $globalmax - $maxspalte;
			while($misspalte >= 0)
			{
				echo "<td></td>";
				$misspalte = $misspalte -1;
			}
			echo "<td>";
			echo '<div class="row">';
			echo '<form method="post" action="addcolumn.php?regalid=' . $regalid .'&spalte=' . $maxspalte .'&reihe=' . $reihe .'">' . $btnplus . '</form>&nbsp';
			echo '<form method="post" action="remcolumn.php?regalid=' . $regalid .'&spalte=' . $maxspalte .'&reihe=' . $reihe .'">' . $btnminus . '</form>';
			echo '</div>';
			echo "</td>";
			echo "</tr>";
		$maxspalte = 0; 
		}
			if(!isset($reihe))
			{
				$reihe = 0;
			}
			echo "<tr>";
			echo '<td><div class="row"><form method="post" action="addrow.php?regalid=' . $regalid .'&spalte=1&reihe=' . $reihe .'">' . $btnplus . '</form>&nbsp';
			echo '<form method="post" action="remrow.php?regalid=' . $regalid .'&reihe=' . $reihe .'">' . $btnminus . '</form></div></td>';
			echo "</tr>";
			?>
			
			</tbody>
			</table>
  
      <hr>
    </div>



</main>
<?php
include "inc/foot.php";
?>

