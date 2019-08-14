<?php
$sql = "SELECT * FROM settings";
foreach($pdo->query($sql) as $row)
		{
			$companyFoot = htmlentities( $row['company'], ENT_COMPAT, 'ISO-8859-1');
			$sloganFoot = htmlentities( $row['slogan'], ENT_COMPAT, 'ISO-8859-1');
		}

?>

<footer class="container">
  <p><?php echo $companyFoot . " - " . $sloganFoot; ?>
  <p>&copy; Constantin Kie&szligling 2019 - <a href = "https://www.gnu.org/licenses/gpl-3.0.txt">GNU GPLv3</a> - <a href = "https://github.com/connybw/whmanagement">Github</a> </p>
</footer>