<?php

	$userid = $_SESSION['user_id'];
	
	$parameters = array(':gebruiker_id'=>$userid);
	$sth = $pdo->prepare('select bedrijfs_id from gebruikers where gebruiker_id = :gebruiker_id');
	$sth->execute($parameters);
	$row = $sth->fetch();	
	
	$bedrijfs_id = $row['bedrijfs_id'];
	

	$parameters = array(':bedrijfs_id'=>$bedrijfs_id);
	$sth = $pdo->prepare('select * from bedrijfgegevens where bedrijfs_id = :bedrijfs_id');
	$sth->execute($parameters);
	$row = $sth->fetch();
	
	echo $row['adres'];

	
	
/*	if(isset($_POST['Wijzigenbedrijf']))
{
	$CheckOnErrors = false;
	
	$gebruikersnaam = $_POST["gebruikersnaam"];
	$wachtwoord = $_POST["wachtwoord"];
	$email = $_POST["email"];
	
	if($CheckOnErrors == true) 
	{
	require('./views/WijzigenBedrijfForm.php');
	}
	else
	{

	}
}
else
{
	require('./views/WijzigenBedrijfForm.php');
}
*/
?>