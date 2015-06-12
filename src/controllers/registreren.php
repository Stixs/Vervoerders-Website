<?php
//init fields
$bedrijfsnaam = $beschrijving = $adres = $postcode = $plaats = $provincie = $telefoon = $fax = $o_email = 	$specialiteit = $type = $bereik = $transport_manager = $aantal = $rechtsvorm = $vergunning = $geldig_tot = $i_email = $inlognaam = NULL;

//init error fields
$FnameErr = $LnameErr = $ZipErr = $CityErr = $TelErr = $MailErr = $UserErr = $PassErr = $RePassErr = NULL;

if(isset($_POST['Registreren']))
{
	$CheckOnErrors = false;

	$bedrijfsnaam = $_POST['bedrijfsnaam'];
	$beschrijving = $_POST['beschrijving'];
	$adres = $_POST['adres'];
	$postcode = $_POST['postcode'];
	$plaats = $_POST['plaats'];
	$provincie = $_POST['provincie'];
	$telefoon = $_POST['telefoon'];
	$fax = $_POST['fax'];
	$o_email = $_POST['o_email'];
	$specialiteit = $_POST['specialiteit'];
	$type = $_POST['type'];
	$bereik = $_POST['bereik'];
	$transport_manager = $_POST['transport_manager'];
	$aantal = $_POST['aantal'];
	$plaats = $_POST['plaats'];
	$rechtsvorm = $_POST['rechtsvorm'];
	$vergunning = $_POST['vergunning'];
	$geldig_tot = $_POST['geldig_tot'];
	$i_email = $_POST['i_email'];
	$inlognaam = $_POST['inlognaam'];
	$wachtwoord = $_POST['wachtwoord'];



	if($CheckOnErrors) //aanvullen
	{
		require('./views/RegistrerenForm.php');	
	}
	else
	{
		//formulier is succesvol gevalideerd

		echo var_dump($_POST);
		
		//maak unieke salt
		$salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));

		//hash het paswoord met de Salt
		$wachtwoord = hash('sha512', $wachtwoord . $salt);
		
		$parameters = array
		(	':bedrijfsnaam' => $bedrijfsnaam,
			':beschrijving' => $beschrijving,
			':adres' => $adres,
			':postcode' => $postcode,
			':plaats' => $plaats,
			':provincie' => $provincie,
			':telefoon' => $telefoon,
			':fax' => $fax,
			':o_email' => $o_email,
			':specialiteit' => $specialiteit,
			':type' => $type,
			':bereik' => $bereik,
			':transport_manager' => $transport_manager,
			':aantal' => $aantal,
			':rechtsvorm' => $rechtsvorm,
			':vergunning' => $vergunning,
			':geldig_tot' => $geldig_tot );
		
		$sth = $pdo->prepare('INSERT INTO bedrijfgegevens (bedrijfsnaam, beschrijving, adres, postcode, plaats, provincie, telefoon, fax, bedrijfs_email, specialiteit, type, bereik, transport_manager, aantal, rechtsvorm, vergunning, geldig_tot) VALUES (:bedrijfsnaam, :beschrijving, :adres, :postcode, :plaats, :provincie, :telefoon, :fax, :o_email, :specialiteit, :type, :bereik, :transport_manager, :aantal, :rechtsvorm, :vergunning, :geldig_tot)');
		
		$sth->execute($parameters); 	
		
		$lastId = $pdo->lastInsertId();
		
		$parameters = array
		(	':lastId' => $lastId,
			':i_email' => $i_email,
			':inlognaam' => $inlognaam,
			':wachtwoord' => $wachtwoord,
			':salt' => $salt,
			':level' => 1 );
		$sth = $pdo->prepare('INSERT INTO gebruikers (bedrijfs_id, email, inlognaam, wachtwoord, salt, level)VALUES(:lastId, :i_email, :inlognaam, :wachtwoord, :salt, :level)');
		
		$sth->execute($parameters); 

		echo'U bent succesvol geregistreed.';
      
	    //RedirectNaarPagina();
	}
}
else
{
	require('./views/RegistrerenForm.php');
}
?>