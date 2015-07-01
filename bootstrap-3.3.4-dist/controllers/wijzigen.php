<?php

//Controleert of je wel bent ingelogd.
if(LoginCheck($pdo))
{
	//init fields
	$bedrijfs_naam = $beschrijving = $adres = $postcode = $plaats = $provincie = $telefoon = $fax = $bedrijfs_email = $specialiteit = $type = $bereik = $transport_manager = $aantal = $rechtsvorm = $vergunning = $geldig_tot = NULL;

	//init error fields
	$NameErr = $ZipErr = $CityErr = $TelErr = $MailErr = NULL;


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
		
		//Gegevens uit de database halen
		$bedrijfs_naam = $row['bedrijfsnaam'];
		$beschrijving = $row['beschrijving'];
		$adres = $row['adres'];
		$postcode = $row['postcode'];
		$plaats = $row['plaats'];
		$provincie = $row['provincie'];
		$weblink = $row['weblink'];
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
		
		
		if(isset($_POST['Wijzigenbedrijf']))
	{
		$CheckOnErrors = false;
		
		$bedrijfs_naam = $_POST["Bedrijfsnaam"];
		$adres = $_POST["adres"];
		$postcode = $_POST["postcode"];
		$plaats = $_POST['plaats'];
		$provincie = $_POST['provincie'];
		$weblink = $_POST['weblink'];
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
		require('./views/WijzigenBedrijfForm.php');
		}
		else
		{
			$parameters = array(':bedrijfs_id'=>$bedrijfs_id,
								':bedrijfsnaam'=>$bedrijfs_naam,
								':beschrijving'=>$beschrijving,
								':adres'=>$adres,
								':postcode'=>$postcode,
								':plaats'=>$plaats,
								':provincie'=>$provincie,
								':weblink'=>$weblink,
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
								':premium'=>$premium,);
			$sth = $pdo->prepare('update bedrijfgegevens 
								  set bedrijfsnaam=:bedrijfsnaam, 
									  beschrijving=:beschrijving,					 
									  adres=:adres,
									  postcode=:postcode,
									  plaats=:plaats,
									  provincie=:provincie,
									  weblink=:weblink,
									  telefoon=:telefoon,
									  specialiteit=:specialiteit,
									  type=:type,
									  bereik=:bereik,
									  transport_manager=:transport_manager,
									  aantal=:aantal,
									  rechtsvorm=:rechtsvorm,
									  vergunning=:vergunning,
									  geldig_tot=:geldig_tot,
									  bedrijfs_email=:bedrijfs_email
									  where bedrijfs_id = :bedrijfs_id,
									  premium=:premium');
			$sth->execute($parameters);
			
			echo'Uw bedrijf gegvens zijn bijgewerkt.<br />';
			require('./views/WijzigenBedrijfForm.php');
		}
	}
	else
	{
		require('./views/WijzigenBedrijfForm.php');
	}
}
else
{
	echo'U moet ingelogd zijn om deze pagina te kunnen gebruiken.';
}
?>