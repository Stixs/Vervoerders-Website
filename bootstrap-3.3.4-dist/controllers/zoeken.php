<?php
if(isset($_POST['Zoek']))
{
$trefwoord = $_POST['trefwoord'];
$specialiteit = $_POST['specialiteit'];
$type = $_POST['type'];
$bereik = $_POST['bereik'];
}
?>

<div id="zoeken">
	<form id="opnaam" method="post">
		<br><br>Zoeken<br>
		
		<label for="sel1">Select list:</label>
		<select class="form-control" id="sel1" name="specialiteit">
			<?php
			$specialiteit = NULL;
			$sth = $pdo->prepare('select distinct specialiteit from bedrijfgegevens');
			$sth->execute();
			echo '<option value="" selected style="display:none;">Specialiteit</option>';
			while($row = $sth->fetch())
			{
				if ($row['specialiteit'] == $specialiteit)
				{
				echo '<option value="'.$row['specialiteit'].'" selected>'.$row['specialiteit'].'</option>';
				}
				else
				{
				echo '<option value="'.$row['specialiteit'].'">'.$row['specialiteit'].'</option>';	
				}
			}
			?>		
		</select>
		
		<label for="sel1">Select list:</label>
		<select class="form-control" id="sel1" name="type">
			<?php
			$type = NULL;
			$sth = $pdo->prepare('select distinct type from bedrijfgegevens');
			$sth->execute();
			echo '<option value="Type" selected style="display:none;">Type</option>';
			while($row = $sth->fetch())
			{
				if ($row['type'] == $type)
				{
				echo '<option value="'.$row['type'].'" selected>'.$row['type'].'</option>';
				}
				else
				{
				echo '<option value="'.$row['type'].'">'.$row['type'].'</option>';	
				}
			}
			?>		
		</select>
		
		
		<label for="sel1">Select list:</label>
		<select class="form-control" id="sel1" name="bereik">
			<?php
			$bereik = NULL;
			$sth = $pdo->prepare('select distinct bereik from bedrijfgegevens');
			$sth->execute();
			echo '<option value="" selected style="display:none;">bereik</option>';
			while($row = $sth->fetch())
			{
				if ($row['bereik'] == $bereik)
				{
				echo '<option value="'.$row['bereik'].'" selected >'.$row['bereik'].'</option>';
				}
				else
				{
				echo '<option value="'.$row['bereik'].'">'.$row['bereik'].'</option>';	
				}
			}
			?>		
		</select>
		
		<input type="text" name="trefwoord" placeholder="Trefwoord" autofocus size="20">
		<input type="submit" name="Zoek" value="Zoek"/>
	</form>
<?php
	
if(isset($_POST['Zoek']))
{
	
	//De zoek query
	
	$sth = $pdo->prepare('select * from bedrijfgegevens where 
	(bedrijfsnaam like "%'.$trefwoord.'%" or 
	beschrijving like "%'.$trefwoord.'%" or 
	adres like "%'.$trefwoord.'%" or 
	postcode like "%'.$trefwoord.'%" or 
	plaats like "%'.$trefwoord.'%" or 
	provincie like "%'.$trefwoord.'%" or 
	telefoon like "%'.$trefwoord.'%" or 
	fax like "%'.$trefwoord.'%" or 
	transport_manager like "%'.$trefwoord.'%" or 
	aantal like "%'.$trefwoord.'%" or 
	rechtsvorm like "%'.$trefwoord.'%" or 
	vergunning like "%'.$trefwoord.'%" or 
	geldig_tot like "%'.$trefwoord.'%" or 
	bedrijfs_email like "%'.$trefwoord.'%")	and 
	(specialiteit like "%'.$specialiteit.'%" and 
	type like "%'.$type.'%" and 
	bereik like "%'.$bereik.'%")');
	$sth->execute();
	
	while($row = $sth->fetch())
	{
		echo $row['bedrijfsnaam'].'<br>';
	}
	
}
else
{
	$sth = $pdo->prepare('select * from bedrijfgegevens');
	$sth->execute();
	
	while($row = $sth->fetch())
	{
		?>
		<div class="search-container">
			<div class="search-image">
				
			</div>
			<div class="search-naam">
				<?php echo $row['bedrijfsnaam']; ?>
			</div>
		</div>
		<?php
	}
}
?>
</div>