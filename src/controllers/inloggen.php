<?php
function login($Username, $password, $pdo)
{
	
	$parameters = array(':Username'=>$Username);
	$sth = $pdo->prepare('select * from klanten where Inlognaam = :Username');

	$sth->execute($parameters);

	if ($sth->rowCount() == 1) 
	{
		// Variabelen inlezen uit query
		$row = $sth->fetch();
		

		$password = hash('sha512', $password . $row['Salt']);


		if ($row['Paswoord'] == $password) 
		{

			$user_browser = $_SERVER['HTTP_USER_AGENT'];
			$_SESSION['user_id'] = $row['gebruiker ID'];
			$_SESSION['username'] = $row['Inlognaam'];
			$_SESSION['level'] = $row['Level'];
			$_SESSION['login_string'] = hash('sha512',
					  $password . $user_browser);
			
			// Login successful.
			return true;
		 } 
		 else 
		 {
			// password incorrect
			return false;
		 }
	}
	else
	{
		// username bestaat niet
		return false;
	}
}

if(isset($_POST['Inloggen']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];


	
	if (login($username, $password, $pdo))
	{
	echo '<div class="center">U bent succesvol ingelogd';
	header("Refresh: 0;URL=index.php");
	echo'</div>';
	}
	else
	{
	echo '<div class="center">De gebruikersnaam of het wachtwoord is onjuist</div>';
	RedirectNaarPagina();
	}


}
else
{	
	//er is nog niet op het knopje gedrukt, het formulier wordt weergegeven
	require('./views/InloggenForm.php');
}
?>