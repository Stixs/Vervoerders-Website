<?php
//init fields
$FirstName = $LastName = $Adres = $ZipCode = $City = $TelNr = $Email = $Username = 	$Password = $RetypePassword = NULL;

//init error fields
$FnameErr = $LnameErr = $ZipErr = $CityErr = $TelErr = $MailErr = $UserErr = $PassErr = $RePassErr = NULL;

if(isset($_POST['Registreren']))
{
	$CheckOnErrors = false; // hulpvariabele voor het valideren van het formulier
	
	/*
	Opdracht 4.01: registreren
	Omschrijving: Lees alle gegevens uit het formulier uit middels de POST methode
	*/
	$FirstName = $_POST['FirstName'];
	$LastName = $_POST['LastName'];
	$Adres = $_POST['Adres'];
	$ZipCode = $_POST['ZipCode'];
	$City = $_POST['City'];
	$TelNr = $_POST['TelNr'];
	$Email = $_POST['Email'];
	
	$Username = $_POST['Username'];
	$Password = $_POST['Password'];
	$RPassword = $_POST['RetypePassword'];
	

	//BEGIN CONTROLES
	/*
	Opdracht 4.01: registreren
	Omschrijving: Zorg er voor dat de gegevens worden gevalideerd op de eisen uit de opdracht. Gebruik de hulpvariabele $CheckOnErrors om later te kunnen controleren of er een fout is gevonden. Deze variabele zet je dus op true wanneer je een validatie fout tegenkomt. Voor het valideren kun je gebruik maken van de validatie functies in het bestand functies.php
	*/

	//controleer het voornaam veld
	if(!isset($FirstName))
	{
		$FnameErr = 'Voornaam Moet in gevuld zijn.';
		$CheckOnErrors = true;
	}
	elseif(!is_Char_Only($FirstName))
	{
		$FnameErr = 'Voornaam mag alleen letters bevatten.';
		$CheckOnErrors = true;
	}
	elseif(!is_minlength($FirstName,2))
	{
		$FnameErr = 'Voornaam is tekort.';
		$CheckOnErrors = true;
	}
	//controleer het achternaam veld
	if(!isset($LastName))
	{
		$LnameErr = 'Achternaam moet ingevuld zijn.';
		$CheckOnErrors = true;
	}
	elseif(!is_Char_Only($LastName))
	{
		$LnameErr = 'Achternaam mag alleen letters bevatten';
		$CheckOnErrors = true;
	}
	elseif(!is_minlength($FirstName,2))
	{
		$LnameErr = 'Achternaam is tekort.';
		$CheckOnErrors = true;
	}
	//controleer het postcode veld	
	if(!isset($ZipCode))
	{
		if(!is_NL_PostalCode($ZipCode))
		{
			$ZipErr = 'Dit is geen geldig postcode.';
			$CheckOnErrors = true;
		}
	}
	//controleer het plaats veld
	if(!isset($City))
	{
		if(!is_Char_Only($City))
		{
			$CityErr = 'Plaats mag alleen letters bevatten.';
			$CheckOnErrors = true;
		}
	}
	//controleer het telnr veld
	if(!isset($TelNr))
	{
		$TelErr = 'Telefoon nummer Moet ingevuld worden.';
		$CheckOnErrors = true;
	}
	elseif(!is_NL_Telnr($TelNr))
	{
		$TelErr = 'Dit is geen Geldig telefoon nummer.';
		$CheckOnErrors = true;
	}
	//controleer het email veld
	if(!isset($Email))
	{
		$MailErr = 'Email moet in gevuld zijn.';
		$CheckOnErrors = true;
	}
	elseif(!is_email($Email))
	{
		$MailErr = 'Onjuist email adres.';
		$CheckOnErrors = true;		
	}
	


	//controleer het username veld
	if(!isset($Username))
	{
		$UserErr = 'U moet een gebruikers naam invoeren.';
		$CheckOnErrors = true;
	}
	elseif(!is_Username_Unique($Username,$pdo))
	{
		$UserErr = 'Deze gebruikers is al in gebruik.';
		$CheckOnErrors = true;
	}
	//controleer het paswoord veld
	if(!isset($Password))
	{
		$PassErr = 'U moet een wachtwoord invoeren.';
		$CheckOnErrors = true;
	}
	elseif(!is_minlength($Password,6))
	{
		$PassErr = 'Uw wachtwoord moet minimaal 6 tekens lang zijn.';
		$CheckOnErrors = true;
	}
	//controleer het retype paswoord veld
	if(!isset($RPassword))
	{
		$RePassErr = 'U moet uw wachtwoord herhalen.';
		$CheckOnErrors = true;
	}
	elseif($Password =! $RPassword)
	{
		$RePassErr = 'Beide wachtwoorden moeten gelijk zijn.';
		$CheckOnErrors = true;
	}
	//EINDE CONTROLES


	/*
	Opdracht 4.01: registreren
	Omschrijving: Controleer hier of er een fout is gevonden middels de CheckOnErrors variabele. Zo ja, dan ziet de gerbuiker opnieuw het formulier; zo nee, dan gaan we de gegevens in de database toevoegen.
	*/
	if($CheckOnErrors) //aanvullen
	{
		require('./Forms/RegistrerenForm.php');	
	}
	else
	{
		//formulier is succesvol gevalideerd

		//maak unieke salt
		$Salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));

		//hash het paswoord met de Salt
		$Password = hash('sha512', $Password . $Salt);

		/*
		Opdracht 4.01: registreren
		Omschrijving: Maak een prepared statement waarmee de gegevens van de gebruiker in de database worden toegevoegd. LET OP: Level moet 1 zijn! Tot slot geef je de gebruiker de melding dat zijn gegevens zijn toegevoegd.
		*/
		$parameters = array
		(
			':Voornaam' => $FirstName,
			':Achternaam' => $LastName,
			':Adres' => $Adres,
			':Postcode' => $ZipCode,
			':Plaats' => $City,
			':TelefoonNr' => $TelNr,
			':Email' => $Email,
			':Inlognaam' => $Username,
			':Paswoord' => $Password,
			':Salt' => $Salt,
			':Level' => 1
		);
		
		$sth = $pdo->prepare('INSERT INTO klanten (Voornaam, Achternaam, Adres, Postcode, Plaats, TelefoonNr, Email, Inlognaam, Paswoord, Salt, Level)VALUES(:Voornaam, :Achternaam, :Adres, :Postcode, :Plaats, :TelefoonNr, :Email, :Inlognaam, :Paswoord, :Salt, :Level)');
		
		$sth->execute($parameters); 

		echo'U bent succesvol geregistreed.';
      
	    RedirectNaarPagina();
	}
}
else
{
	require('./Forms/RegistrerenForm.php');
}
?>