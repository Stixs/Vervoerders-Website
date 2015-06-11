<?php

function ConnectDB()
{
	$pdo = new PDO("mysql:host=localhost;dbname=vervoerders", 'root', '');
	return $pdo;
}

function LoginCheck($pdo) 
{
    // Controleren of Sessie variabelen bestaan
    if (isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string'])) 
	{
        $KlantID = $_SESSION['user_id'];
        $Login_String = $_SESSION['login_string'];
        $Username = $_SESSION['username'];
 
        // Get the user-agent string of the user.
        $user_browser = $_SERVER['HTTP_USER_AGENT'];
 
		$parameters = array(':KlantID'=>$KlantID);
		$sth = $pdo->prepare('SELECT Paswoord FROM klanten WHERE KlantID = :KlantID LIMIT 1');
 
       	$sth->execute($parameters);

		// controleren of de klant voorkomt in de DB
		if ($sth->rowCount() == 1) 
		{
			// Variabelen inlezen uit query
			$row = $sth->fetch();

			//check maken
		    $Login_Check = hash('sha512', $row['Paswoord'] . $user_browser);
 
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

function RedirectNaarPagina($PaginaNr = NULL)
{
	if(!isset($PaginaNr))
	{
		echo "<br />U word doorgestuurd naar de hoofdpagina.";
		header("Refresh: 2;URL=index.php");
	}
	else
		header("Refresh: 2;URL=index.php?PaginaNr=".$PaginaNr);
}
?>