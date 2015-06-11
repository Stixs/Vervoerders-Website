<?php
/*  
	Opdracht: 
	Omschrijving: Bouw de pagina zo om dat de menu items uit de Database worden
				  uitgelezen en weergegeven
*/
$parameter = array(':Status'=>'InBios');
$sth = $pdo->prepare('select * from films where Status = :Status');

$sth->execute($parameter);

echo '<table border=3>';
echo '<h3><tr><td>Titel</td><td>Beschrijving</td><td>Duur</td><td>Genre</td><td>Leeftijd</td><td>Type</td><td>Prijs</td></tr></h3>';
while($row = $sth->fetch())
{
	echo '<tr><td background="Images/default"><h2> '.$row['Titel'].'</h2></td>';
	echo '<td>'.$row['Beschrijving'].'</td>';
	echo '<td> '.$row['Duur'].' minuten</td>';
	echo '<td> '.$row['Genre'].'</td>';
	echo '<td> '.$row['Leeftijd'].'</td>';
	echo '<td> '.$row['Type'].'</td>';
	echo '<td> &#8364;'.$row['Prijs'].'</td>';
	echo '<td><a href="#">Reserveren</a></td></tr>';
}
echo '</table>';
?>

Reserveren