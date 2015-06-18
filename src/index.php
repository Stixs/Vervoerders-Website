<?php
session_start();
require('./controllers/functies.php');

$pdo = ConnectDB();

if(isset($_GET['paginanr']))
{
	$paginanr = $_GET['paginanr'];
}
else
{
	$paginanr = 1;
}


require('./views/header.php');
require('./controllers/menu.php');

echo '<div id="content">';

switch($paginanr)
{
	case 1:
	require('./views/home.php');
	break;
	case 2:
	require('./controllers/gids.php');
	break;
	case 3:
	require('./controllers/zoeken.php');
	break;
	case 48:
	require('./controllers/profiel.php');
	break;
	case 49:
	require('./controllers/wijzigen.php');
	break;
	case 50:
	require('./controllers/inloggen.php');
	break;
	case 51:
	require('./controllers/registreren.php');
	break;
	case 52:
	require('./controllers/uitloggen.php');
	break;
}

require('./views/footer.php');

echo '</div>';

?>