<?php
//$_SESSION['error'] = 'Eerstewaarden';
function login($Username, $password, $pdo)
{
	/*
	Opdracht 3.03: Inlogsysteem
	Omschrijving: Maak een prepared statement waarbij je de gegevens van de klant ophaalt
	*/
	$parameter = array(':Inlognaam'=>$Username);
	$sth = $pdo->prepare('select * from klanten where Inlognaam = :Inlognaam');
	
	$sth->execute($parameter);
	//echo $sth->Rowcount();
	/*
	Opdracht 3.03: Inlogsysteem
	Omschrijving: Voorzie de komende regels van commentaar, zoals in de opdracht gevraagd wordt.
	*/
	//Kijkt over er maar een user is.
	if ($sth->rowCount() == 1) 
	{
		// Variabelen inlezen uit query
		$row = $sth->fetch();
		
		//Het wachtwoord wordt encrypt.
		$password = hash('sha512', $password . $row['Salt']);

		//Controleert of het wachtwoord correct is.
		//echo $password.'<br />';
		//echo $row['Paswoord'].'<br />';
		if ($row['Paswoord'] == $password) 
		{
			//echo'Ik ben hier';
			//Controleert of het de zelfde browser is.
			$user_browser = $_SERVER['HTTP_USER_AGENT'];

			/*
			Opdracht 3.03: Inlogsysteem
			Omschrijving: Vul tot slot de sessie met de juiste gegevens
			*/
			$_SESSION['user_id'] = $row['KlantID'];
			$_SESSION['username'] = $row['Inlognaam'];
			$_SESSION['level'] = $row['Level'];
			$_SESSION['login_string'] = hash('sha512',
					  $password . $user_browser);
			
			// Login successful.
			//$_SESSION['error'] = 'Goed';
			return true;
		 } 
		 else 
		 {
			// password incorrect
			return false;
			//$_SESSION['error'] = 'wachtwoord is incorrect.';
		 }
	}
	else
	{
		// username bestaat niet
		return false;
		//$_SESSION['error'] = 'Inlognaam is incorrect.';
	}
}

//begin pagina

//het knopje inloggen van het formulier is ingedrukt.
if(isset($_POST['Inloggen']))
{
	/*
	Opdracht 3.03: Inlogsysteem
	Omschrijving: Lees de formulier gegevens uit middels de post methode. Roep vervolgens de functie login aan en geef de 3 correcte paramteres mee aan de functie. Middels een if statement kun je vervolgens controleren of de gebruiker is ingelogd en de juiste boodschap weergeven
	*/
	$Username = $_POST['Username'];
	$Password = $_POST['Password'];
	if(login($Username, $Password, $pdo))
	{
		echo'U bent succesvol ingelogd';
		RedirectNaarPagina(0);
	}
	else
	{
		//$error = $_SESSION['error'];
		echo'Inloggen mislukt';
		//echo $error;
		require('./Forms/InloggenForm.php');
		
	}
}
else
{	
	//er is nog niet op het knopje gedrukt, het formulier wordt weergegeven
	require('./Forms/InloggenForm.php');
}
?>





