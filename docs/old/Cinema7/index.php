<?php
session_start();
require('./Configuratie.php');
require('./Modules/Functies.php');

/*
	Opdracht 2.04: Verwacht in de bioscoop
	Omschrijving: Roep de functie ConnectDB aan en stop het resultaat in de variabele $pdo
*/
$pdo = ConnectDB();


/*
	Opdracht 2.03: Bioscoop Modulair
	Omschrijving: Lees de variabele pagina in middels de GET methode
*/
if(isset($_GET['PaginaNr']))
{
	$PaginaNr = $_GET['PaginaNr'];
}
else
{
	$PaginaNr = 0;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="Style.css" />
	<title>Cinema 7</title>
</head>
<body>
<header>
	<img src="./Images/logo.jpg" id="Logo" alt="Cinema 7 Logo" />
</header>
<div id="MenuWrapper">
	<nav>
		<?php
			require('./Modules/Menu.php');
		?>
	</nav>
</div>
<div id="MainWrapper">
	<div id="Banner"></div>
	<main>
		<?php
			/*
				Opdracht: Bioscoop Modulair
				Omschrijving: Maak een switch-statement waarin aan de hand van
							  het pagina nr de juiste module wordt geladen
			*/
			switch($PaginaNr)
			{
				case 0:
				require ('Modules/Home.php');
				break;
				case 1:
				require ('Modules/Reserveren.php');
				break;
				case 2:
				require ('Modules/Verwacht.php');
				break;
				case 3:
				require ('Modules/OverOns.php');
				break;
				case 4:
				require ('Modules/MijnProfiel.php');
				break;
				case 5:
				require ('Modules/Inloggen.php');
				break;
				case 6:
				require ('Modules/Registreren.php');
				break;
				case 7:
				require ('Modules/FilmToevoegen.php');
				break;
				case 8:
				require ('Modules/FilmAanpassenVerwijderen.php');
				break;
				case 9: 
				require ('Modules/Uitloggen.php');
				break;
				default:
				require ('Modules/Home.php');
				break;
			}
		?>
	</main>
</div>
</body>
</html>