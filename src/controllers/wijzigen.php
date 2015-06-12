<?php

	$userid = $_SESSION['user_id'];
	$parameters = array(':gebruiker_id'=>$userid);
	$sth = $pdo->prepare('select inlognaam from gebruikers where gebruiker_id = :gebruiker_id');
	$sth->execute($parameters);
	
	$bedrijfs_id = $row['bedrijfs_id'];
	echo $row['inlognaam'];
	echo'test';
	
	$parameters = array(':bedrijfs_id'=>$bedrijfs_id);
	$sth = $pdo->prepare('select * from bedrijfgegevens where bedrijfs_id = :bedrijfs_id');
	$sth->execute($parameters);
	
	echo $row['postcode'];
	
	
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