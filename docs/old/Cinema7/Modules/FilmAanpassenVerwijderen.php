<?php
// beveiliging pagina voor niet geautoriseerde bezoekers
if(LoginCheck($pdo))
{
	// user is ingelogd
	if($_SESSION['level'] >= 5) //pagina alleen zichtbaar voor level 5 of hoger
	{
		//-------------code---------------//	
		
		if(isset($_GET['Action']))
		{
			//haalt de action op die bepaald of de film gewijzigd of verwijderd wordt
			$Action = $_GET['Action'];
			
			//switch die bepaald wat er gebeurt wanneer de action Edit of Del is.
			switch($Action)
			{
				case 'Edit':

							//init fields
							$Title = $Description = $Duration = $Genre = $Age = $Picture = $Price = $Type = $Status = NULL;

							//init error fields
							$TitleErr = $DescErr = $DurErr = $PriceErr = NULL;
							
							//controleert of het formulier is ge-submit. LET OP: de knop moet Aanpassen heten
							if(isset($_POST['Aanpassen']))
							{	
								//formulier is gesubmit 

								$CheckOnErrors = false; // hulpvariabele voor het valideren van het formulier
								
								/* 
								Opdracht 5.02 : Film Aanpassen
								Valideer de gegevens weer op de zelfde manier als in opdracht 5.01, nadat je de gegevens middels een POST hebt ingelezen
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
								Opdracht 5.02 : Film Aanpassen
								Controleer ook hier weer of er een validatie fout is ontstaan. Zo ja, dan krijgt de gebruiker het formulier weer te zien, zo nee, Dan gaan we de gegevens toevoegen aan de Database. Dit doen we door een prepared statement te maken waarmee je de gegevens van de film middels een UPDATE in de database aanpast. Wanneer dit is gelukt krijgt de gebruiker hiervan een melding op het scherm
								*/
								if($CheckOnErrors == true)
								{
									require('./Forms/FilmAanpassenForm.php');
								}
								else
								{
									
								}
							}
							else
							{
								//formulier is nog niet gesubmit
								/*  
								Opdracht 5.02 : Film Aanpassen 
								Omschrijving: maak een prepared statement waarmee je de gegevens van de Film die gewijzigd moet worden ophaald. Het FilmID dien je te verkrijgen uit de GET variabele zodat je de juiste gegevens er bij kan terugvinden
								*/
								$FilmID = $_GET['FilmID'];
								
								$Parameters = array(':FilmID' => $FilmID);
								$sth = $pdo->prepare('SELECT * FROM films WHERE FilmID = :FilmID');
								
								$sth->execute($Parameters);

								/*
								Opdracht 5.02 : Film Aanpassen 
								Omschrijving: Zet de gegevens uit de database over naar de juiste variabelen zodat ze in het formulier bestand kunnen worden gebruikt. Roep vervolgens het formulier aan.
								*/
								$Title = $row['Titel'];
								$Description = $row['Beschrijving'];
								$Duration = $row['Duur'];
								$Price = $row['Prijs'];
								
								require('./Forms/FilmAanpassenForm.php');

							}
							break;
				case 'Del': 
							/*
							Opdracht 5.03 : Film Verwijderen
							Omschrijving: Maak een prepared statement waarmee je een film uit de database verwijderd. LET OP dat je altijd het filmID meegeeft aan de DELETE!!!!!! Het FilmID dien je te verkrijgen uit de GET variabele. WANNEER JE DIT NIET MEEGEEFT VERWIJDER JE ALLE FILMS UIT DE DATABASE!!! De gebruiker krijgt een melding dat de film is verwijderd
							*/
							
							//let op dat je altijd het filmID meegeeft aan de DELETE!!!!!!
						


							break;
			}
		}
		else
		{
			//uitlezen films
			/*
				Opdracht 5.02: Film Aanpassen
				Omschrijving: Voer een query uit middels een prepared statement waarmee je alle films weergeeft. Zorg er voor dat het result van de query netjes op het scherm wordt getoond. LET OP: Er dienen 2 knoppen gemaakt te worden (Links in html), waarvan 1 aanpassen en 1 verwijder knop. Deze links dienen pagina nr (huidige pagina) , Film ID en Action mee te krijgen als als GET parameters. De value bij action is voor de knop aanpassen "Edit" en voor de knop verwijderen "Del"
			*/
			$sth = $pdo->prepare('select * from films where');
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
				echo '<td><a href="?PaginaNr=8&Action=Edit&FilmID='.$row['FilmID'].'">Aanpassen</a></td>';
				//echo '<td><a href="?PaginaNr=8&Action=Del&FilmID='.$row['FilmID'].'">Verwijderen</a></td>';
				echo'</tr>';
			}
			echo '</table>';

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
/*
	Opdracht: 
	Omschrijving: Bouw de pagina zo om dat de menu items uit de Database worden
				  uitgelezen en weergegeven
*/
?>