<?php
include "inc/connection.php";
$sql = "SELECT artikelid, anzahl FROM wagen";
foreach($pdo->query($sql) as $row)
		{
			$artikelid = $row['artikelid'];
			$anzahl = $row['anzahl'];
			
			$innersql = "SELECT bestand FROM artikel WHERE id = '" . $artikelid ."'";
			foreach($pdo->query($innersql) as $row)
			{
				$bestand = $row['bestand'];
				$newbestand = $bestand - $anzahl;
				$sql="UPDATE artikel SET bestand = '" . $newbestand . "' WHERE id = '" . $artikelid . "'";
				$sqlquery = mysqli_query($db, $sql);
			}
			$sql="INSERT INTO history (artikelid, anzahl, plusminus) VALUES ('" . $artikelid . "', '" . $anzahl . "', '0')";
			$sqlquery = mysqli_query($db, $sql);
		}


$sql="DELETE FROM wagen";
$sqlquery = mysqli_query($db, $sql);


header("Location: cart.php");

?>