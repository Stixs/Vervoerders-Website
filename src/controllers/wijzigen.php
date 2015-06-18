<?php
//init fields
$bedrijfsnaam = $beschrijving = $adres = $postcode = $plaats = $provincie = $telefoon = $fax = $bedrijfs_email = $specialiteit = $type = $bereik = $transport_manager = $aantal = $rechtsvorm = $vergunning = $geldig_tot = NULL;

//init error fields
$NameErr = $AdresErr = $ZipErr = $CityErr = $TelErr = $FaxErr = $MailErr = NULL;


	$userid = $_SESSION['user_id'];
	
	$parameters = array(':gebruiker_id'=>$userid);
	$sth = $pdo->prepare('select bedrijfs_id from gebruikers where gebruiker_id = :gebruiker_id');
	$sth->execute($parameters);
	$row = $sth->fetch();	
	
	$bedrijfs_id = $row['bedrijfs_id'];
	
	

	$parameters = array(':bedrijfs_id'=>$bedrijfs_id);
	$sth = $pdo->prepare('select * from bedrijfgegevens where bedrijfs_id = :bedrijfs_id');
	$sth->execute($parameters);
	$row = $sth->fetch();
	
	$bedrijf_naam = $row['bedrijfsnaam'];
	$beschrijving = $row['beschrijving'];
	$adres = $row['adres'];
	$postcode = $row['postcode'];
	$plaats = $row['plaats'];
	$provincie = $row['provincie'];
	$telefoon = $row['telefoon'];
	$fax = $row['fax'];
	$specialiteit = $row['specialiteit'];
	$type = $row['type'];
	$bereik = $row['bereik'];
	$transport_manager = $row['transport_manager'];
	$aantal = $row['aanta;'];
	$rechtsvorm = $row['rechtsvorm'];
	$vergunning = $row['vergunning'];
	$geldigtot = $row['geldig_tot'];
	$bedrijfs_email = $row['bedrijfs_email'];
	
	echo $row['adres'];

	
	
	if(isset($_POST['Wijzigenbedrijf']))
{
	$CheckOnErrors = false;
	
	$gebruikersnaam = $_POST["gebruikersnaam"];
	$wachtwoord = $_POST["wachtwoord"];
	$email = $_POST["email"];
	
	if($CheckOnErrors == true) 
	{
	require('./views/WijzigenBedrijfForm.php');
	}
	else
	{

	}
}
else
{
	require('./views/WijzigenBedrijfForm.php');
}

?>