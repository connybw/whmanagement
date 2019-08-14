<?php
include "inc/connection.php";
$regaldevid = $_GET['regaldevid'];

$sql="UPDATE regaldev SET artikelid = 0 WHERE id = '" . $regaldevid ."'";
$sqlquery = mysqli_query($db, $sql);

header('Location:'. $_SERVER['HTTP_REFERER'] .''); 

?>