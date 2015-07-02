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
require('./views/menu.php');

echo '<div id="content">';

switch($paginanr)
{
	case 1:
	require('./controllers/home.php');
	break;
	case 2:
	require('./controllers/gids.php');
	break;
	case 3:
	require('./controllers/zoeken.php');
	break;
	case 50:
	require('./controllers/inloggen.php');
	break;
	case 51:
	require('./controllers/registreren.php');
	break;
}

require('./views/footer.php');

echo '</div>';

?>