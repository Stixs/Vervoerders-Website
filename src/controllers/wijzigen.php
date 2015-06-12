<?php
	$sth = $pdo->prepare('select * from gebruikers where gebruiker_id = :gebruiker_id');
	
	$sth->execute($parameter)
	
	
	if(isset($_POST['Wijzigenbedrijf']))
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
		//formulier is succesvol gevalideerd

		//maak unieke salt
		$salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));

		//hash het paswoord met de Salt
		$wachtwoord = hash('sha512', $wachtwoord . $salt);

		
		$parameters = array(':gebruikersnaam'=>$gebruikersnaam,
							':email'=>$email,
							':wachtwoord'=>$wachtwoord,
							':salt'=>$salt,
							':level'=>5
							);
		$sth = $pdo->prepare('INSERT INTO gebruikers (gebruikersnaam, email, wachtwoord, salt, level) VALUES (:gebruikersnaam, :email, :wachtwoord, :salt, :level)');
		$sth->execute($parameters);
		echo 'test';
	}
}
else
{
	require('./views/WijzigenBedrijfForm.php');
}
?>