<?php
require('configuratie.php');


require('./modules/header.php');

require('./modules/menu.php');


require('./modules/footer.php')

if(isset($_GET['paginanr']))
{
	$paginanr = $_GET['paginanr'];
}
else
{
	$paginanr = 0;
}
switch($paginanr)
{
	case 0:
	require('./modules/home.php');
	break;
	case 1:
	require('./modules/zoeken.php');
	break;
	case 2:
	require('./modules/gids.php');
	break;
	case 50:
	require('./modules/inloggen.php');
	break;
	case 51:
	require('./modules/uitloggen.php');
	break;
}
?>
