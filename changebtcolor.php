

<?php
include "inc/connection.php";
$farbe = $_GET['farbe'];
$sql="UPDATE settings SET button = '" . $farbe . "' WHERE id = 0";
$sqlquery = mysqli_query($db, $sql);
header('Location:'. $_SERVER['HTTP_REFERER'] .''); 
?>