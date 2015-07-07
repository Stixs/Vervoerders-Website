<?php

//Controleert of je wel bent ingelogd.
if(LoginCheck($pdo))
{
	
	//init fields
	$titel = $afbeelding = $vanaf_datum = $tot_datum = $url = $type = NULL;

	//init error fields
	$NameErr = $ZipErr = $CityErr = $TelErr = $MailErr = NULL;

	
	//controleert of de knop aanpassen of verwijderen is ingedurkt.
	if(isset($_GET['action']))
	{
		//haalt gegevens uit de link via Get om tekijken of het wijzigen of verwijderen is en om welk bedrijf het gaat.
		$action = $_GET['action'];
		
		//Kijkt of het wijzigen of verwijderen is.
		switch($action)
			{
				case 'edit':
							
							//controleert of het formulier is ge-submit. LET OP: de knop moet Aanpassen heten
							if(isset($_POST['Aanpassen']))
							{	
								//formulier is gesubmit 

								$CheckOnErrors = false; // hulpvariabele voor het valideren van het formulier
								
									
								
								$titel = $_POST["titel"];
								$vanaf_datum = $_POST["vanaf_datum"];
								$tot_datum = $_POST["tot_datum"];
								$url = $_POST["url"];
								$type = $_POST["type"];
								
								if (basename($_FILES["Picture"]["name"]) == null)
								{
								$Picture = $_SESSION['Picture'];
								}
								else
								{
								$Picture = basename($_FILES["Picture"]["name"]);
								}
								
	

								if($CheckOnErrors == true)
								{
								require('./views/WijzigenAdvertentieForm.php');
								
								}
								else
								{
								
								$target_dir = "Images/";
								$target_file = $target_dir . basename($_FILES["Picture"]["name"]);
								if (move_uploaded_file($_FILES["Picture"]["tmp_name"], $target_file)){} 

								$parameters = array(
											':titel'=>$titel,
											':Picture'=>$Picture,
											':vanaf_datum'=>$vanaf_datum,
											':tot_datum'=>$tot_datum,
											':url'=>$url,
											':type'=>$type
											);
								$sth = $pdo->prepare('UPDATE films SET titel = :titel, afbeelding = :Picture, vanaf_datum = :vanaf_datum, tot_datum = :tot_datum, url = :url, type = :type WHERE advertentie_ID = :advertentie_ID');
								
								$sth->execute($parameters);
								
								
								echo 'De advertentie is gewijzigd';
								RedirectNaarPagina(8);
								}
							}
							else
							{
								
								$advertentie_ID = $_GET['advertentie_ID'];
								$parameters = array(':advertentie_ID'=>$advertentie_ID);
								$sth = $pdo->prepare('select * from advertenties where advertentie_ID = :advertentie_ID');

								$sth->execute($parameters);
								$row = $sth->fetch();

								
								$titel = $row['titel'];
								$_SESSION['Picture'] = $row['afbeelding'];
								$vanaf_datum = $row['vanaf_datum'];
								$tot_datum = $row['tot_datum'];
								$url = $row['url'];
								$type = $row['type'];
								
								require('./views/WijzigenAdvertentieForm.php');
							}
							break;
			case'del':
			
				break;
		}
	}
	else
	{
	require('./views/advertenties.php');
	}

}
else
{
	echo'U moet ingelogd zijn om deze pagina te kunnen gebruiken.';
}
?>