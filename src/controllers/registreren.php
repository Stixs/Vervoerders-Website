<?php
//init fields
$FirstName = $LastName = $Adres = $ZipCode = $City = $TelNr = $Email = $Username = 	$Password = $RetypePassword = NULL;

//init error fields
$FnameErr = $LnameErr = $ZipErr = $CityErr = $TelErr = $MailErr = $UserErr = $PassErr = $RePassErr = NULL;

if(isset($_POST['Registreren']))
{
	$CheckOnErrors = false;

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


	if($CheckOnErrors) //aanvullen
	{
		require('./views/RegistrerenForm.php');	
	}
	else
	{
		//formulier is succesvol gevalideerd

		//maak unieke salt
		$Salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));

		//hash het paswoord met de Salt
		$Password = hash('sha512', $Password . $Salt);
		
		$parameters = array
		(
			':Inlognaam' => $Username,
			':Paswoord' => $Password,
			':Salt' => $Salt,
			':Level' => 1
		);
		
		$sth = $pdo->prepare('INSERT INTO gebruikers (inlognaam, wachtwoord, salt, level)VALUES(:Inlognaam, :Paswoord, :Salt, :Level)');
		
		$sth->execute($parameters); 

		echo'U bent succesvol geregistreed.';
      
	    RedirectNaarPagina();
	}
}
else
{
	require('./views/RegistrerenForm.php');
}
?>