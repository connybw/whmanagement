<?php
$sql = "SELECT buttons.farbid AS color FROM settings JOIN buttons ON buttons.id = settings.button WHERE settings.id = 0";
foreach($pdo->query($sql) as $row)
		{
		$color = $row['color'];
		}

//color define

//--Buttons--
$btnhead = '<button type="create" class="' . $color . '">';
$btntail = '</button>';
$btnplus = '<button type="create" class="' . $color . '"><span class="fas fa-plus" aria-hidden="true"></span></button>';
$btnminus = '<button type="create" class="' . $color .'"><span class="fas fa-minus" aria-hidden="true"></span></button>';
$btntrash = '<button type="create" class="' . $color .'"><span class="fas fa-trash-alt" aria-hidden="true"></span></button>';
$btnlink = '<button type="create" class="' . $color . '"><span class="fas fa-external-link-alt" aria-hidden="true"></span></button>';
$btnclone = '<button type="create" class="' . $color . '"><span class="fas fa-clone" aria-hidden="true"></span></button>';
$btnbuilding = '<button type="create" class="' . $color . '"><span class="fas fa-building" aria-hidden="true"></span></button>';
$btnsave = '<button type="create" class="' . $color . '"><span class="fas fa-save" aria-hidden="true"></span></button>';
$btncartplus = '<button type="create" class="' . $color . '"><span class="fas fa-cart-plus" aria-hidden="true"></span></button>';
$btnedit = '<button type="create" class="' . $color . '"><span class="fas fa-edit" aria-hidden="true"></span></button>';
$btncart = '<button type="create" class="' . $color . '"><span class="fas fa-shopping-cart" aria-hidden="true"></span></button>';
$btnplussquare = '<button type="create" class="' . $color . '"><span class="fas fa-plus-square" aria-hidden="true"></span></button>';
$btncheckcircle = '<button type="create" class="' . $color . '"><span class="fas fa-check-circle" aria-hidden="true"></span></button>';
?>