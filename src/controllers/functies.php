<?php

function ConnectDB()
{
	$pdo = new PDO("mysql:host=localhost;dbname=vervoerders", 'root', '');
	return $pdo;
}

function LoginCheck($pdo) 
{
    // Controleren of Sessie variabelen bestaan
    if (isset($_SESSION['id'], $_SESSION['gebruikersnaam'], $_SESSION['login_string'])) 
	{
        $id = $_SESSION['id'];
        $Login_String = $_SESSION['login_string'];
        $gebruikersnaam = $_SESSION['gebruikersnaam'];
 
        // Get the user-agent string of the user.
        $user_browser = $_SERVER['HTTP_USER_AGENT'];
 
		$parameters = array(':id'=>$id);
		$sth = $pdo->prepare('SELECT wachtwoord FROM users WHERE id = :id LIMIT 1');
 
       	$sth->execute($parameters);

		// controleren of de klant voorkomt in de DB
		if ($sth->rowCount() == 1) 
		{
			// Variabelen inlezen uit query
			$row = $sth->fetch();

			//check maken
		    $Login_Check = hash('sha512', $row['wachtwoord'] . $user_browser);
 
				//controleren of check overeenkomt met sessie
                if ($Login_Check == $Login_String)
					return true;
                else 
                   return false;
         } else 
              return false;         
     } else 
          return false;
}

?>