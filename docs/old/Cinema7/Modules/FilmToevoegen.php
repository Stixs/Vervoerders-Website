<?php
// beveiliging pagina voor niet geautoriseerde bezoekers
if(LoginCheck($pdo))
{
	// user is ingelogd
	if($_SESSION['level'] >= 5) //pagina alleen zichtbaar voor level 5 of hoger
	{
		
	//-------------code---------------
		
		//init fields
		$Title = $Description = $Duration = $Genre = $Age = $Picture = $Price = $Type = $Status = NULL;

		//init error fields
		$TitleErr = $DescErr = $DurErr = $PriceErr = NULL;

		/* 
		Opdracht 5.01 : Film Toevoegen 
		Maak een if statement waarmee je controleert of het formulier is ingevoerd. Zo ja, dan gaan we verder met het valideren van de gegevens en het toevoegen ervan aan de database, Zo nee, Dan wordt het formulier getoond.
		*/
		if(isset($_POST['Toevoegen']))
		{
			
			/* 
			Opdracht 5.01 : Film Toevoegen 
			Lees de formulier gegevens in met de POST methode
			Valideer de ingevoerde gegevens zoals ook gedaan is in de opdrachten registreren en Mijn Profiel.
			*/
			$Title = $_POST['Titel'];
			$Description = $_POST['Beschrijving'];
			$Duration = $_POST['Duur'];
			$Genre = $_POST['Genre'];
			$Price = $_POST['Prijs'];
			$Age = $_POST['Leeftijd'];
			$Status = $_POST['Status'];
			if(!isset($Picture))
			{
				$Picture='Default.jpg';	
			}
			else
			{
				$Picture = $_POST['Plaatje'];
			}
			
			$CheckOnErrors = false; // hulpvariabele voor het valideren van het formulier
				
			
			
			//BEGIN CONTROLES
			//controleer het Titel veld
			if(!isset($Title))
			{
				$TitleErr = 'Er moet een Titel zijn.';
				$CheckOnErrors = true;
			}
			//controleer het Omschrijving veld
			if(!isset($Description))
			{
				$DescErr = 'Er moet een beschrijving zijn';
				$CheckOnErrors = true;
			}
			//controleer het duration veld
			if(!isset($Duration))
			{
				$DurErr = 'Er moet een lengte tijd opgegeven zijn.';
				$CheckOnErrors = true;
			}
			elseif(!ctype_digit($Duration))
			{
				$DurErr = 'De tijd moet een heel getal zijn.';
				$CheckOnErrors = true;
			}
			//controleer het Price veld
			if(!isset($Price))
			{
				$PriceErr = 'Er moet een prijs zijn.';
				$CheckOnErrors = true;
			}
			//EINDE CONTROLE
			
			/* 
			Opdracht 5.01 : Film Toevoegen 
			Controleer of er een validatie fout is ontstaan. Zo ja, dan krijgt de gebruiker het formulier weer te zien, zo nee, Dan gaan we de gegevens toevoegen aan de Database. Dit doen we door een prepared statement te maken waarmee je de gegevens van de film middels een INSERT in de database Toevoegt. Wanneer dit is gelukt krijgt de gebruiker hiervan een melding op het scherm
			*/
			if($CheckOnErrors == true)
			{
				require('./Forms/FilmToevoegenForm.php');
			}
			else
			{
				$parameters = array
				(
					':Titel' => $Title,
					':Beschrijving' => $Description,
					':Duur' => $Duration,
					':Genre' => $Genre,
					':Leeftijd' => $Age,
					':Plaatje' => $Picture,
					':Prijs' => $Price,
					':Type' => $Type,
					':Status' => $Status
				);
				
				$sth = $pdo->prepare('INSERT INTO films (Titel, Beschrijving, Duur, Genre, Leeftijd, Plaatje, Prijs, Type, Status) VALUES (:Titel, :Beschrijving, :Duur, :Genre, :Leeftijd, :Plaatje, :Prijs, :Type, :Status)');
				
				$sth->execute($parameters);
				
				echo'Deze Film is succesvol toegevoegd.';
				
				RedirectNaarPagina(7);
			}
		}
		else
		{
			require('./Forms/FilmToevoegenForm.php');
		}
	//-------------code--------------//

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
