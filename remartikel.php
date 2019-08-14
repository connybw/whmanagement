<?php
include "inc/connection.php";
$artikelid = $_GET['artikelid'];

$sql="DELETE FROM artikel WHERE id = '" . $artikelid ."'";
$sqlquery = mysqli_query($db, $sql);

header("Location: artikel.php");

?>