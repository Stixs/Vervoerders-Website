<?php
//init fields
= NULL;

//init error fields
= NULL;

if(isset($_POST['Registreerbedrijf']))
{
	$CheckOnErrors = false;
	
	$gebruikersnaam = $_POST["gebruikersnaam"];

	if($CheckOnErrors == true) 
	{
	require('./Forms/RegistreerbedrijfForm.php');
	}
	else
	{
		//formulier is succesvol gevalideerd

		//maak unieke salt
		$salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));

		//hash het paswoord met de Salt
		$wachtwoord = hash('sha512', $wachtwoord . $Salt);

		
		$parameters = array(':gebruikersnaam'=>$gebruikersnaam,
							':wachtwoord'=>$wachtwoord,
							':email'=>$email,
							':level'=>5
							);
		$sth = $pdo->prepare('INSERT INTO users (gebruikersnaam, wachtwoord, email, level) VALUES (:gebruikersnaam, :wachtwoord, :email, :level)');

		$sth->execute($parameters);
	}
}
else
{
	require('./Forms/RegistrerenbedrijfForm.php');
}

?>