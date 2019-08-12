<?php
include "inc/connection.php";
$regal = $_GET['regalid'];
$reihe = $_GET['reihe'];
$spalte = $_GET['spalte'];

$sql="DELETE FROM regaldev WHERE regalid = '" . $regal ."' AND reihe = '" . $reihe ."'";
$sqlquery = mysqli_query($db, $sql);

header("Location: regal.php?regalid=" . $regal ."");

?>