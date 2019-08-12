

<?php
include "inc/connection.php";
$farbe = $_GET['farbe'];
$sql="UPDATE style SET objectid = '" . $farbe . "' WHERE item = 'button'";
$sqlquery = mysqli_query($db, $sql);
header ("Location: index.php");
?>