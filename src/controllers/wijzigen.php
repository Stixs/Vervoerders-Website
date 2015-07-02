<?php

//Controleert of je wel bent ingelogd.
if(LoginCheck($pdo))
{
	//init fields
	$bedrijfs_naam = $beschrijving = $adres = $postcode = $plaats = $provincie = $telefoon = $fax = $bedrijfs_email = $specialiteit = $type = $bereik = $transport_manager = $aantal = $rechtsvorm = $vergunning = $geldig_tot = $website = NULL;

	//init error fields
	$NameErr = $ZipErr = $CityErr = $TelErr = $MailErr = NULL;
	
	//controleert of de knop aanpassen of verwijderen is ingedurkt.
	if(isset($_GET['action']))
	{
		//haalt gegevens uit de link via Get om tekijken of het wijzigen of verwijderen is en om welk bedrijf het gaat.
		$action = $_GET['action'];
		$bedrijfs_id = $_GET['bedrijfs_id'];
		
		//Kijkt of het wijzigen of verwijderen is.
		switch($action)
		{
			case'edit':
					
					//SQL query om de gegevens van het juiste bedrijf uit de database halen
					$parameters = array(':bedrijfs_id'=>$bedrijfs_id);
					$sth = $pdo->prepare('select * from bedrijfgegevens where bedrijfs_id = :bedrijfs_id');
					$sth->execute($parameters);
					$row = $sth->fetch();
					
					//Gegevens uit de database halen
					$bedrijfs_naam = $row['bedrijfsnaam'];
					$beschrijving = $row['beschrijving'];
					$adres = $row['adres'];
					$postcode = $row['postcode'];
					$plaats = $row['plaats'];
					$provincie = $row['provincie'];
					$website = $row['website'];
					$telefoon = $row['telefoon'];
					$fax = $row['fax'];
					$specialiteit = $row['specialiteit'];
					$type = $row['type'];
					$bereik = $row['bereik'];
					$transport_manager = $row['transport_manager'];
					$aantal = $row['aantal'];
					$rechtsvorm = $row['rechtsvorm'];
					$vergunning = $row['vergunning'];
					$geldigtot = $row['geldig_tot'];
					$bedrijfs_email = $row['bedrijfs_email'];
					$premium = $row['premium'];
					
					//controleert of de submit knop wijzigenbedrijf in het formulier is ingedurkt.
					if(isset($_POST['Wijzigenbedrijf']))
				{
					$CheckOnErrors = false;
					
					//Gegevens uit het formulier halen
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
					if(isset($telefoon))
					{
						if(!is_minlength($telefoon, 10))
						{
							$CheckOnErrors = true;
							$TelErr = 'Dit is geen geldig telefoon nummer.';
						}
					}
					//Controleert plaats
					if(!isset($plaats))
					{
						$CheckOnErrors = true;
						$CityErr = 'U moet een dorp/stad invullen.';
					}
					//als er fouten zijn dan wordt je terug gestuurd naar het formulier met wat er verbeterd moet worden.
					if($CheckOnErrors == true) 
					{
					require('./views/WijzigenBedrijfForm.php');
					}
					else
					{
						//De gegevens die uit het formulier komen en die correct zijn worden in de array parameters gezet
						$parameters = array(':bedrijfs_id'=>$bedrijfs_id,
											':bedrijfsnaam'=>$bedrijfs_naam,
											':beschrijving'=>$beschrijving,
											':adres'=>$adres,
											':postcode'=>$postcode,
											':plaats'=>$plaats,
											':provincie'=>$provincie,
											':website'=>$website,
											':telefoon'=>$telefoon,
											':specialiteit'=>$specialiteit,
											':type'=>$type,
											':bereik'=>$bereik,
											':transport_manager'=>$transport_manager,
											':aantal'=>$aantal,
											':rechtsvorm'=>$rechtsvorm,
											':vergunning'=>$vergunning,
											':geldig_tot'=>$geldigtot,
											':bedrijfs_email'=>$bedrijfs_email,
											':premium'=>$premium);
						//de SQL query om de gegevens in de database te veranderen.
						$sth = $pdo->prepare('UPDATE bedrijfgegevens 
											  SET bedrijfsnaam=:bedrijfsnaam,
												  beschrijving=:beschrijving,
												  adres=:adres,
												  postcode=:postcode,
												  plaats=:plaats,
												  provincie=:provincie,
												  website=:website,
												  telefoon=:telefoon,
												  specialiteit=:specialiteit,
												  type=:type,
												  bereik=:bereik,
												  transport_manager=:transport_manager,
												  aantal=:aantal,
												  rechtsvorm=:rechtsvorm,
												  vergunning=:vergunning,
												  geldig_tot=:geldig_tot,
												  bedrijfs_email=:bedrijfs_email,
												  premium=:premium
												  WHERE bedrijfs_id = :bedrijfs_id');
						//De variabele parameters wordt uitgevoerd
						$sth->execute($parameters);
						
						
						echo'De gegvens van '. $row['bedrijfsnaam'].' zijn bijgewerkt.<br />';
						require('./views/AanpassenTabel.php');
					}
				}
				else
				{
					//laat het formulier WijzigenBedrijfForm zien als de knop wijzigenbedrijf nog niet is ingedurkt.
					require('./views/WijzigenBedrijfForm.php');
				}
				break;
			case'del':
			
				break;
		}
	}
	else
	{
	require('./views/AanpassenTabel.php');
	}

}
else
{
	echo'U moet ingelogd zijn om deze pagina te kunnen gebruiken.';
}
?>