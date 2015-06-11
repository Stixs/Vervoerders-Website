<?php
/*
	Opdracht 2.04: Verwacht in de bioscoop
	Omschrijving: Voer een query uit middels een prepared statement
*/
$parameter = array(':Status'=>'Verwacht');
$sth = $pdo->prepare('select * from films where Status = :Status');

$sth->execute($parameter);

/*
	Opdracht 2.04: Verwacht in de bioscoop
	Omschrijving: Zorg er voor dat het result van de query netjes op het scherm wordt getoond.
*/
echo '<table border=3>';
while($row = $sth->fetch())
{
	echo '<tr><td background="Images/default"><h2> '.$row['Titel'].'</h2></td>';
	echo '<td>'.$row['Beschrijving'].'</td>';
	echo '<td> '.$row['Genre'].'</td>';
	echo '<td> '.$row['Leeftijd'].'</td></tr>';
}
echo '</table>';
?>

verwacht