<?php
$sql = "SELECT buttons.farbid AS color FROM style JOIN buttons ON buttons.id = style.objectid WHERE item ='button'";
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
//--Green inverted Buttons--
//--Grey Buttons--
//--Grey inverted Buttons--
//--Blue Buttons--
//--Blue inverted Buttons--
//--Red Buttons--
//--Red inverted Buttons--
?>