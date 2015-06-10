<?php
/*  
	Opdracht 4.02 : menu op basis van gebruikers levels 
	Omschrijving: Zet het default level op 0 en vul de variabale MenuInUitloggen met de default html code voor de knop inloggen
*/

$Level = 0; // default level 0

$MenuInUitloggen = '<li><a href="?PaginaNr=5">Inloggen</a></li>'; // default menuknop inloggen

/*  
	Opdracht 4.02 : menu op basis van gebruikers levels 
	Omschrijving: Controleer mbv de functie LoginCheck of iemand is ingelogd. Zo ja, dan overschrijf je de default waardes van Level en MenuInUitloggen met het level uit de database en de html code voor de knop uitloggen
*/
if(LoginCheck($pdo))
{
	$Level = $_SESSION['level'];
	$MenuInUitloggen = '<li><a href="?PaginaNr=9">Uitloggen</a></li>';
}


/*  
	Opdracht 4.02 : menu op basis van gebruikers levels 
	Omschrijving: Maak een prepared statement waarbij je de menu items opvraagd die de gebruiker op basis van zij/haar level mag zien. Zorg er vervolgens voor dat deze netjes op het scerm worden getoond.
*/
$parameter = array(':Level' => $Level);
$sth = $pdo->prepare('Select * from menu where Level <= :Level');

$sth->execute($parameter);

echo'<ul id="menu">';
echo'<li><a href="?PaginaNr=0">Home</a></li>';
while($row = $sth->fetch())
{
	echo '<li><a href="?PaginaNr=' . $row["PaginaNr"] . '">' . $row["Tekst"] . '</a></li>';
}
echo $MenuInUitloggen;
echo'</ul>';


/*  
	Opdracht 4.02 : menu op basis van gebruikers levels 
	Omschrijving: Verwijder tot slot de basiscode die we gemaakt hebben in opdracht 2.03 hieronder
*/

?>

<!--
	Opdracht 2.03: Bioscoop Modulair
	Omschrijving: Voeg een link toe naar index.php met daarbij een variabele pagina
				  en als waarde het pagina nr
-->

