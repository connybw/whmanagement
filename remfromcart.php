<?php
include "inc/connection.php";
$wagenid = $_GET['wagenid'];

$sql="DELETE FROM wagen WHERE id = '" . $wagenid ."'";
$sqlquery = mysqli_query($db, $sql);

header("Location: cart.php");

?>