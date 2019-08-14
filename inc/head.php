<?php
include "connection.php";
include "dist/buttons/button.php";
include "deviceinfo.php";
include "redirect.php";

$sql = "SELECT company FROM settings";
foreach($pdo->query($sql) as $row)
		{
			$companyHead = $row['company'];
		}
?>
<head>
<link rel="stylesheet" type="text/css" href="dist/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="dist/icons/css/all.css">
<link rel="stylesheet" type="text/css" href="dist/jumbotron/jumbotron.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
<a href="index.php"><?php echo $btnbuilding; ?></a>
&nbsp;
  <a class="navbar-brand" href="index.php"><?php echo $companyHead?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?php if($head == 1) {echo "active";} ?> ">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item <?php if($head == 2) {echo "active";} ?> ">
        <a class="nav-link" href="regale.php">Regale</a>
      </li>
      <li class="nav-item <?php if($head == 3) {echo "active";} ?> ">
        <a class="nav-link" href="artikel.php">Artikel</a>
      </li>
	  <li class="nav-item <?php if($head == 4) {echo "active";} ?> ">
        <a class="nav-link" href="cart.php">Wagen</a>
		</li>
	  <li class="nav-item <?php if($head == 5) {echo "active";} ?> ">
        <a class="nav-link" href="settings.php">Einstellungen</a>
		</li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Button</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
		<?php
		$sql = "SELECT * FROM buttons ORDER BY id";
		foreach($pdo->query($sql) as $row)
		{
			echo '<a class="dropdown-item" href="changebtcolor.php?farbe=' . $row['id'] .'">'. htmlentities( $row['farbe'] , ENT_COMPAT, 'ISO-8859-1') .'</a>';
		}
		?>
        </div>
      </li>
    </ul>
  </div>
    <form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="text" name="suche" id="suche" placeholder="Suchen" aria-label="Suchen">
	&nbsp;
    <button class="<?php echo $color; ?>" type="submit">Search</button>
	&nbsp;
	</form>
	<a class="<?php echo $color; ?>" href="scan.php" role="button"><span class="fas fa-camera" aria-hidden="true" style="font-size: 24px"></span></a>
</nav>
<?php
if(isset($_GET['suche']))
{
	header("Location: suche.php?search=" . $_GET['suche'] . "");
}
if($device != 'pc')
{
echo "<br>";
}
?>