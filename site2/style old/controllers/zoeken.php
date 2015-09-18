<?php
if(!isset($_SESSION['plaats']))
{
?>
<div id="geo" class="geolocation_data"></div>
<script type="text/JavaScript" src="./geolocation/geo.js"></script>
<?php
}

if(isset($_POST['Zoek']))
{
	$trefwoord = NULL;
	//if(!empty($_POST['specialiteit'])){$trefwoord.=' '.$_POST['specialiteit'];}
	//if(!empty($_POST['provincie'])){$trefwoord.=' '.$_POST['provincie'];}
	//if(!empty($_POST['bereik'])){$trefwoord.=' '.$_POST['bereik'];}
	if(!empty($_POST['trefwoord'])){$trefwoord.=' '.$_POST['trefwoord'];}
	
   //echo $_SESSION['huisnummer'];
	//echo $_SESSION['straat'];
	if(!empty($_SESSION['plaats'])){$trefwoord.=' '.$_SESSION['plaats'];}
	//echo $_SESSION['postcode'];
	
	$trefwoord = ltrim($trefwoord);
	
	//var_dump($trefwoord);
	//$branche = $_POST['branche_'];
	//$specialiteit = $_POST['specialiteit'];
	//$provincie = $_POST['provincie'];
	//$bereik = $_POST['bereik'];
}
?>


<form id="opnaam" method="post">

	<div class="zoeken">
		<!--<div class="col-sm-12 col-md-6 filter1">
			<div class="row">
				<div class="col-xs-12 col-sm-4">
					<select class="form-control search-select col-xs-12 col-sm-4" id="sel1" name="branche_">
						<?php
						$sth = $pdo->prepare('select * from branche');
						$sth->execute();
						
						echo '<option value="" selected style="display:none;">Branche</option>';
						while($row = $sth->fetch())
						{
							if (!isset($branch) or $row['branche_name'] != $branch)
							{
							echo '<option value="'.$row['branche_name'].'">'.$row['branche_name'].'</option>';
							}
							elseif ($row['branche_name'] == $branch)
							{
							echo '<option value="'.$row['branche_name'].'" selected>'.$row['branche_name'].'</option>';	
							}
						}
						?>		
					</select>
				</div>			
				<div class="col-xs-12 col-sm-4">
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
				</div>
				<div class="col-xs-12 col-sm-4">
					<select class="form-control search-select col-xs-12 col-sm-4" id="sel1" name="provincie">
						<?php
						$sth = $pdo->prepare('select distinct provincie from bedrijfgegevens');
						$sth->execute();
						
						echo '<option value="" selected style="display:none;">Provincie</option>';
						while($row = $sth->fetch())
						{
							if (!isset($provincie) or $row['provincie'] != $provincie)
							{
							echo '<option value="'.$row['provincie'].'">'.$row['provincie'].'</option>';
							}
							elseif ($row['provincie'] == $provincie)
							{
							echo '<option value="'.$row['provincie'].'" selected>'.$row['provincie'].'</option>';	
							}
						}
						?>		
					</select>
				</div>
				<div class="col-xs-12 col-sm-4">
					<select class="form-control search-select col-xs-12 col-sm-4" id="sel1" name="bereik">
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
			</div>
		</div> --->
		<div class="col-sm-12 col-md-6 filter2">
			<div class="row">
				<div class="col-xs-12 col-sm-8 col-md-6">
					<input class="form-control" type="text" name="trefwoord" placeholder="Trefwoord" autofocus size="20">
				</div>
				<div class=" col-xs-6 col-sm-2 col-md-3 xs-pull-right">
					<button class="btn btn-default col-xs-12 " type="submit" name="Zoek" value="Zoek">Zoek</button>
				</div>
				<div class="col-xs-6 col-sm-2 col-md-3 xs-pull-left">
					<a class="btn btn-default col-xs-6 col-sm-12" href="?paginanr=3">Reset</a>
				</div>
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
			$sth = $pdo->prepare('SELECT * FROM bedrijfgegevens WHERE MATCH (bedrijfsnaam, postcode, plaats, provincie, branche) AGAINST ("'.$search.'" IN BOOLEAN MODE) ORDER BY premium ASC');
	}
	else
	{
			$sth = $pdo->prepare('SELECT * FROM bedrijfgegevens ORDER BY premium DESC');
	}
	$sth->execute();

	
}
else
{
	
	
	
}

	echo '<div class="row search-result">';
		echo '<div class="col-xs-12">
		
		';
		
			while($row = $sth->fetch())
			{
				if($row['premium'] == 'gold')
				{
					echo '<a class="greylink" href="index.php?paginanr=6&bedrijfs_id='.$row['bedrijfs_id'].'">';
				?>
					<div class="search-container">
						<div class="search-image">
							<img src="images/bedrijf_images/<?php echo$row['bedrijfs_id'].'/'.$row['logo']; ?>" />
						</div>
						<span class="glyphicon glyphicon-search premium"></span>
						<div class="search-naam">
							<?php echo $row['bedrijfsnaam']. '<br/>' .$row['telefoon']; ?>
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