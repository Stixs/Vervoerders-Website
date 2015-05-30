<?php
//init fields
$bedrijf_naam = $adres = $postcode = $plaats = $land = $telefoon = $fax = $type = $naar = $specialiteit = $bedrijf_email = $gebruikersnaam = $wachtwoord = $email = NULL;

//init error fields
//= NULL;

if(isset($_POST['Registreerbedrijf']))
{
	$CheckOnErrors = false;
	
	$gebruikersnaam = $_POST["gebruikersnaam"];
	$wachtwoord = $_POST["wachtwoord"];
	$email = $_POST["email"];
	
	if($CheckOnErrors == true) 
	{
	require('./views/RegistreerBedrijfForm.php');
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
	require('./views/RegistreerBedrijfForm.php');
}

?>