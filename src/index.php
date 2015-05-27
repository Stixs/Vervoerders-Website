<?php
require('configuratie.php');
if(isset($_GET['paginanr']))
{
	$paginanr = $_GET['paginanr'];
}
else
{
	$paginanr = 0;
}

require('./modules/header.php');
require('./modules/menu.php');

switch($paginanr)
{
	case 0:
	require('./controllers/home.php');
	break;
	case 1:
	require('./controllers/zoeken.php');
	break;
	case 2:
	require('./controllers/gids.php');
	break;
	case 50:
	require('./controllers/inloggen.php');
	break;
	case 51:
	require('./controllers/uitloggen.php');
	break;
}

require('./modules/footer.php')

?>