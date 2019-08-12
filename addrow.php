<?php
include "inc/connection.php";
$regal = $_GET['regalid'];
$reihe = $_GET['reihe'];
$reihe = $reihe + 1;
$spalte = $_GET['spalte'];

$sql="INSERT INTO regaldev (regalid, artikelid, reihe, spalte) VALUES ('" . $regal . "', '0', '" . $reihe . "', '" . $spalte. "')";
$sqlquery = mysqli_query($db, $sql);

header("Location: regal.php?regalid=" . $regal ."");

?>