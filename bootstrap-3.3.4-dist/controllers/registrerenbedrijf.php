<?php

//Controleert of je wel bent ingelogd.
if(LoginCheck($pdo))
{
	//init fields
	$bedrijfs_naam = $beschrijving = $adres = $postcode = $plaats = $provincie = $telefoon = $fax = $bedrijfs_email = $specialiteit = $type = $bereik = $transport_manager = $aantal = $rechtsvorm = $vergunning = $geldig_tot = NULL;

	//init error fields
	$NameErr = $ZipErr = $CityErr = $TelErr = $MailErr = NULL;
	
		if(isset($_POST['Registrerenbedrijf']))
	{
		$CheckOnErrors = false;
		
		$bedrijfs_naam = $_POST["Bedrijfsnaam"];
		$adres = $_POST["adres"];
		$postcode = $_POST["postcode"];
		$plaats = $_POST['plaats'];
		$provincie = $_POST['provincie'];
		$telefoon = $_POST['telefoon'];
		$fax = $_POST['fax'];
		$specialiteit = $_POST['specialiteit'];
		$type = $_POST['type'];
		$bereik = $_POST['bereik'];
		$transport_manager = $_POST['transport_manager'];
		$aantal = $_POST['aantal'];
		$rechtsvorm = $_POST['rechtsvorm'];
		$vergunning = $_POST['vergunning'];
		$geldigtot = $_POST['geldigtot'];
		$bedrijfs_email = $_POST['bedrijfs_email'];
		$beschrijving = $_POST['beschrijving'];
		
		//begin controlles
		
		//Controleert bedrijs naam
		if(!isset($bedrijfs_naam))
		{
			$NameErr = 'U moet een naam van uw bedrijf invullen';
			$CheckOnErrors = true;
		}
		//controleert bedrijfs E-mail
		if(isset($bedrijfs_email))
		{
			if(!is_email($bedrijfs_email))
			{
				$CheckOnErrors = true;
				$MailErr = 'Dit is geen geldig E-mail adres.';
			}
		}
		//Controleert postcode
		if(!isset($postcode))
		{
			$CheckOnErrors = true;
			$ZipErr = 'U moet een postcode invullen';
		}
		elseif(!is_NL_PostalCode($postcode))
		{
			$CheckOnErrors = true;
			$ZipErr = 'Dit is geen geldig postcode.';
		}
		//Controleert telefoon nummer
		if(!isset($telefoon))
		{
			$CheckOnErrors = true;
			$TelErr = 'U moet een telefoon nummer invullen.';
		}
		elseif(!is_NL_Telnr($telefoon))
		{
			$CheckOnErrors = true;
			$TelErr = 'Dit is geen geldig telefoon nummer.';
		}
		if(!isset($plaats))
		{
			$CheckOnErrors = true;
			$CityErr = 'U moet een dorp/stad invullen.';
		}
		if($CheckOnErrors == true) 
		{
		require('./views/RegistrerenBedrijfForm.php');
		}
		else
		{
			$parameters = array(':bedrijfsnaam'=>$bedrijfs_naam,
								':beschrijving'=>$beschrijving,
								':adres'=>$adres,
								':postcode'=>$postcode,
								':plaats'=>$plaats,
								':provincie'=>$provincie,
								':telefoon'=>$telefoon,
								':specialiteit'=>$specialiteit,
								':type'=>$type,
								':bereik'=>$bereik,
								':transport_manager'=>$transport_manager,
								':aantal'=>$aantal,
								':rechtsvorm'=>$rechtsvorm,
								':vergunning'=>$vergunning,
								':geldig_tot'=>$geldigtot,
								':bedrijfs_email'=>$bedrijfs_email);
			$sth = $pdo->prepare('insert into bedrijfgegevens (bedrijfsnaam, beschrijving, adres, postcode, plaats, provincie, telefoon, specialiteit, type, bereik, transport_manager, aantal, rechtsvorm, vergunning, geldig_tot, bedrijfs_email) values(:bedrijfsnaam, beschrijving,	adres, :postcode, :plaats, :provincie, :telefoon, :specialiteit, :type, :bereik, :transport_manager, :aantal, :rechtsvorm, :vergunning, :geldig_tot, :bedrijfs_email');
			$sth->execute($parameters);
			
			echo'Uw bedrijf gegvens zijn Geregistreerd.<br />';
			require('./views/RegistrerenBedrijfForm.php');
		}
	}
	else
	{
		require('./views/RegistrerenBedrijfForm.php');
	}
}
else
{
	echo'U moet ingelogd zijn om deze pagina te kunnen gebruiken.';
}
?>