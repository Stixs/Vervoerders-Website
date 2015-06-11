<?php
// beveiliging pagina voor niet geautoriseerde bezoekers
if(LoginCheck($pdo))
{
	// user is ingelogd
	if($_SESSION['level'] >= 1) //pagina alleen zichtbaar voor level 1 of hoger
	{
		/* ===============CODE================== */
		//init fields
		$FirstName = $LastName = $Adres = $ZipCode = $City = $TelNr = $Email = $Username = $Password = $RetypePassword = NULL;

		//init error fields
		$FnameErr = $LnameErr = $ZipErr = $CityErr = $TelErr = $MailErr = $UserErr = $PassErr = $RePassErr = NULL;

		if(isset($_POST['Wijzigen']))
		{
			$CheckOnErrors = false; // hulpvariabele voor het valideren van het formulier
			
			/*  
				Opdracht 4.03 : Mijn Profiel 
				Omschrijving: Lees de formulier gegevens in met de POST methode
			*/
			
				$FirstName = $_POST['FirstName'];
				$LastName = $_POST['LastName'];
				$Adres = $_POST['Adres'];
				$ZipCode = $_POST['ZipCode'];
				$City = $_POST['City'];
				$TelNr = $_POST['TelNr'];
				$Email = $_POST['Email'];

			//BEGIN CONTROLES
			
			/*  
				Opdracht 4.03 : Mijn Profiel 
				Omschrijving: Valideer de ingevoerde gegevens weer met de zelfde voorwaarden als in de opdracht registreren.
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
			
			
			
			//EINDE CONTROLES

			/*  
				Opdracht 4.03 : Mijn Profiel 
				Omschrijving: Vul aan, net als in de opdracht registreren
			*/
			if($CheckOnErrors)
			{
				require('./Forms/RegistrerenForm.php');	
			}
			else
			{
				//formulier is succesvol gevalideerd

				/*  
				Opdracht 4.03 : Mijn Profiel 
				Omschrijving: maak een prepared statement waarmee je de gegevens van de gebruiker middels een UPDATE in de database aanpast. Wanneer dit is gelukt krijgt de gebruiker hiervan een melding op het scherm
				*/
				$parameters = array
				(
					':Voornaam' => $FirstName,
					':Achternaam' => $LastName,
					':Adres' => $Adres,
					':Postcode' => $ZipCode,
					':Plaats' => $City,
					':TelNr' => $TelNr,
					':Email' => $Email,
					':KlantId' => $_SESSION['user_id']
				);
				
				$sth = $pdo->prepare('UPDATE klanten SET Voornaam = :Voornaam, Achternaam = :Achternaam, Adres = :Adres, Postcode = :Postcode, Plaats = :Plaats, TelefoonNr = :TelNr, Email = :Email WHERE KlantID = :KlantId');
				
				$sth->execute($parameters);

				echo'Gegevens succesvol aangepast.';
			}
		}
		else
		{
			/*  
				Opdracht 4.03 : Mijn Profiel 
				Omschrijving: maak een prepared statement waarmee je de gegevens van de gebruiker ophaald. Zijn/Haar KlantId dien je te verkrijgen uit de sessie zodat je de juiste gegevens er bij kan terugvinden
			*/
				$user_id = $_SESSION['user_id'];
			
				$parameters = array(':KlantId' => $user_id);
				
				$sth = $pdo->prepare('SELECT * FROM klanten WHERE KlantID = :KlantId');
				
				$sth->execute($parameters);

			/*  
				Opdracht 4.03 : Mijn Profiel 
				Omschrijving: Zet de gegevens uit de database over naar de juiste variabelen zodat ze in het formulier bestand kunnen worden gebruikt. Roep vervolgens het formulier aan.
			*/
				
				$row = $sth->fetch();
				
				$FirstName = $row['Voornaam'];
				$LastName = $row['Achternaam'];
				$Adres = $row['Adres'];
				$ZipCode = $row['Postcode'];
				$TelNr = $row['TelefoonNr'];
				$Email = $row['Email'];
			

			require('./Forms/MijnProfielForm.php');
		}
		/* ===============CODE================== */
	}
	else
	{
		//user heeft niet het correcte level
		echo 'U heeft niet de juiste bevoegdheid voor deze pagina.';
		RedirectNaarPagina();//redirect naar home
	}
}
else
{
	//user is niet ingelogd
	RedirectNaarPagina(98);//instant redirect naar inlogpagina
}
?>
