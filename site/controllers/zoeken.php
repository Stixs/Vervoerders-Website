<?php
if(isset($_POST['Zoek']))
{
	$trefwoord = NULL;
	if(!empty($_POST['specialiteit'])){$trefwoord.=' '.$_POST['specialiteit'];}
	if(!empty($_POST['type'])){$trefwoord.=' '.$_POST['type'];}
	if(!empty($_POST['bereik'])){$trefwoord.=' '.$_POST['bereik'];}
	if(!empty($_POST['trefwoord'])){$trefwoord.=' '.$_POST['trefwoord'];}
	
	$trefwoord = ltrim($trefwoord);
	
	//var_dump($trefwoord);
	
	$specialiteit = $_POST['specialiteit'];
	$type = $_POST['type'];
	$bereik = $_POST['bereik'];
}
?>
<form id="opnaam" method="post">
	<div class="row zoeken">
		<div class="col-xs-7">
			<select class="form-control search-select" id="sel1" name="specialiteit">
				<?php
				
				$sth = $pdo->prepare('select * from specialiteiten');
				$sth->execute();
				
				echo '<option value="" selected style="display:none;">Specialiteit</option>';
				while($row = $sth->fetch())
				{
					if (!isset($specialiteit) or $row['specialiteit'] != $specialiteit)
					{
					echo '<option value="'.$row['specialiteit'].'">'.$row['specialiteit'].'</option>';
					}
					elseif ($row['specialiteit'] == $specialiteit)
					{
					echo '<option value="'.$row['specialiteit'].'" selected>'.$row['specialiteit'].'</option>';	
					}
				}
				?>		
			</select>
			
			<select class="form-control search-select" id="sel1" name="type">
				<?php
				$sth = $pdo->prepare('select distinct type from bedrijfgegevens');
				$sth->execute();
				
				echo '<option value="" selected style="display:none;">Type</option>';
				while($row = $sth->fetch())
				{
					if (!isset($type) or $row['type'] != $type)
					{
					echo '<option value="'.$row['type'].'">'.$row['type'].'</option>';
					}
					elseif ($row['type'] == $type)
					{
					echo '<option value="'.$row['type'].'" selected>'.$row['type'].'</option>';	
					}
				}
				?>		
			</select>
			
			<select class="form-control search-select" id="sel1" name="bereik">
				<?php
				$sth = $pdo->prepare('select distinct bereik from bedrijfgegevens');
				$sth->execute();
				
				echo '<option value="" selected style="display:none;">Bereik</option>';
				while($row = $sth->fetch())
				{
					if (!isset($bereik) or $row['bereik'] != $bereik)
					{
					echo '<option value="'.$row['bereik'].'">'.$row['bereik'].'</option>';
					}
					elseif ($row['bereik'] == $bereik)
					{
					echo '<option value="'.$row['bereik'].'" selected>'.$row['bereik'].'</option>';	
					}
				}
				?>		
			</select>
		</div>
		<div class="col-xs-5">
			<div class="form-inline">
			<input class="form-control" type="text" name="trefwoord" placeholder="Trefwoord" autofocus size="20">
			<button class="btn btn-default" type="submit" name="Zoek" value="Zoek">Zoek</button>
			<a class="btn btn-default" href="?paginanr=3">Reset</a><br><br>
			</div>
		</div>
	</div>
</form>
<?php
	
if(isset($_POST['Zoek']))
{
	
	//De zoek query
	$search = NULL;
	
	
	if(!empty($trefwoord))
		{
		$trefwoorden = (explode(" ",$trefwoord));
		//var_dump($trefwoorden);
		
		foreach ($trefwoorden as $value)
			{
				$search.= '+'.$value.' ';
				
			}
		}
	
	//echo $search;
	
	if($search != NULL)
	{
	$sth = $pdo->prepare('SELECT * FROM bedrijfgegevens WHERE MATCH (bedrijfsnaam, beschrijving, postcode, plaats, provincie, telefoon, fax, transport_manager, rechtsvorm,vergunning, geldig_tot, bedrijfs_email, specialiteit, type, bereik) AGAINST ("'.$search.'" IN BOOLEAN MODE) ORDER BY premium ASC');
	}
	else
	{
	$sth = $pdo->prepare('SELECT * FROM bedrijfgegevens ORDER BY premium DESC');
	}
	$sth->execute();

	
}
else
{
	
	$sth = $pdo->prepare('SELECT * FROM bedrijfgegevens ORDER BY premium DESC LIMIT 10');
	$sth->execute();
}

	echo '<div class="row search-result">';
		echo '<div class="col-xs-12">';
			while($row = $sth->fetch())
			{
				if($row['premium'] == 'gold')
				{
					$link = str_replace(" ", " ", $row['bedrijfsnaam']);
					echo '<a class="greylink" href="index.php?paginanr=6&bedrijf='.$link.'">';
				?>
					<div class="search-container">
						<div class="search-image">
						
							<span class="glyphicon glyphicon-search premium"></span>
							<img src="images/truck.jpg">
						</div>
						<div class="search-naam">
							<?php echo $row['bedrijfsnaam']. '<br>' .$row['telefoon']; ?>
						</div>
					</div>
				<?php
				echo '</a>';
				}
				elseif($row['premium'] == 'brons')
				{
				
				?>
					<div class="search-container">
						<div class="search-image">
						
							<span class="glyphicon glyphicon-search no-premium"></span>
							<img src="images/truck.jpg">
						</div>
						<div class="search-naam">
							<?php echo $row['bedrijfsnaam']. '<br>' .$row['telefoon']; ?>
						</div>
					</div>
				<?php
				}
				else
				{
				?>
					<div class="search-container">
						<div class="search-image">
						
							<span class="glyphicon glyphicon-search no-premium"></span>
							<img src="images/truck.jpg">
						</div>
						<div class="search-naam">
							<?php echo $row['bedrijfsnaam']; ?>
						</div>
					</div>
				<?php
				}
				 
			}
		echo '</div>';
	echo '</div>';

?>