<div id="zoeken">
	<form id="opnaam">
		Zoek op bedrijfsnaam<br>
		<input type="text" name="trefwoord" autofocus size="30">
		<input type="submit" name="Zoek" value="Zoek"/>
	</form>
	<form>
		<br><br>Zoek op criteria<br>
		<select name="specialiteit">
			<option value="">#</option>			
		</select>
	</form>
<?php
	
if(isset($_POST['zoeken']))
{
	$trefwoord = $_POST['trefwoord'];
	$specialiteit = $_POST['specialiteit'];
	$type = $_POST['type'];
	$bereik = $_POST['bereik'];
	//De zoek query
	$parameter = array(':trefwoord'=>$trefwoord);
	
	$sth = $pdo->prepare('select * from bedrijfgegevens where bedrijfsnaam like "%:trefwoord%" or beschrijving like "%:trefwoord%" or adres like "%:trefwoord%" or postcode like "%:trefwoord%" or plaats like "%:trefwoord%" or provincie like "%:trefwoord%" or telefoon like "%:trefwoord%" or fax like "%:trefwoord%" or transport_manager like "%:trefwoord%" or aantal like "%:trefwoord%" or rechtsvorm like "%:trefwoord%" or vergunning like "%:trefwoord%" or geldig_tot like "%:trefwoord%" or bedrijfs_email like "%:trefwoord%" or specialiteit like :specialiteit or type like :type or bereik like :bereik;');
	$sth->execute($parameter);
	
	while($row = $sth->fetch())
	{
		echo $row['bedrijfsnaam'];
	}
	
}
?>
</div>