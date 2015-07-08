<?php

//Controleert of je wel bent ingelogd.
if(LoginCheck($pdo))
{
	//init fields
	$bedrijfs_naam = $beschrijving = $adres = $postcode = $plaats = $provincie = $telefoon = $fax = $bedrijfs_email = $specialiteit = $type = $bereik = $transport_manager = $aantal = $rechtsvorm = $vergunning = $geldigtot = $website = $premium = NULL;

	//init error fields
	$NameErr = $ZipErr = $CityErr = $TelErr = $MailErr = NULL;
	
	$Specialiteiten = specialiteitenlijst($pdo);
	
		if(isset($_POST['Registrerenbedrijf']))
	{
		$CheckOnErrors = false;
		
		$bedrijfs_naam = $_POST["Bedrijfsnaam"];
		$adres = $_POST["adres"];
		$postcode = $_POST["postcode"];
		$plaats = $_POST['plaats'];
		$provincie = $_POST['provincie'];
		$website = $_POST['website'];
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
		$premium = $_POST['premium'];
		$special = NULL;
		
		foreach($specialiteit as $value) 
					{
						if(!next($specialiteit)) 
						{
							$special.= $value;
						}
						else
						{
							$special.= $value.',';
						}
					}
		
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
		elseif(!is_minlength($telefoon, 10))
		{
			$CheckOnErrors = true;
			$TelErr = 'Dit is geen geldig telefoon nummer.';
		}
		//Controlleert plaats
		if(!isset($plaats))
		{
			$CheckOnErrors = true;
			$CityErr = 'U moet een dorp/stad invullen.';
		}
		if($CheckOnErrors == true) 
		{
		require('./views/ToevoegenBedrijfForm.php');
		}
		else
		{
			$parameters = array(':bedrijfsnaam'=>$bedrijfs_naam,
								':beschrijving'=>$beschrijving,
								':adres'=>$adres,
								':postcode'=>$postcode,
								':plaats'=>$plaats,
								':provincie'=>$provincie,
								':website'=>$website,
								':telefoon'=>$telefoon,
								':specialiteit'=>$special,
								':type'=>$type,
								':bereik'=>$bereik,
								':transport_manager'=>$transport_manager,
								':aantal'=>$aantal,
								':rechtsvorm'=>$rechtsvorm,
								':vergunning'=>$vergunning,
								':geldig_tot'=>$geldigtot,
								':bedrijfs_email'=>$bedrijfs_email,
								':premium'=>$premium);
								
			$sth = $pdo->prepare('INSERT INTO bedrijfgegevens (
								bedrijfsnaam, 
								beschrijving, 
								adres, 
								postcode, 
								plaats, 
								provincie, 
								website, 
								telefoon, 
								specialiteit, 
								type, 
								bereik, 
								transport_manager, 
								aantal, 
								rechtsvorm, 
								vergunning, 
								geldig_tot, 
								bedrijfs_email, 
								premium) 
								VALUES(
								:bedrijfsnaam, 
								:beschrijving, 
								:adres, 
								:postcode, 
								:plaats, 
								:provincie, 
								:website, 
								:telefoon, 
								:specialiteit, 
								:type, 
								:bereik, 
								:transport_manager, 
								:aantal, 
								:rechtsvorm, 
								:vergunning, 
								:geldig_tot, 
								:bedrijfs_email, 
								:premium)');
			$sth->execute($parameters);
			
			echo'Uw bedrijf gegevens zijn Geregistreerd.<br />';
			RedirectNaarPagina(5);
		}
	}
	else
	{
		require('./views/ToevoegenBedrijfForm.php');
	}
}
else
{
	echo'U moet ingelogd zijn om deze pagina te kunnen gebruiken.';
}
?>