<?php
if(isset($_POST['Add_advert']))
{
$titel = $_POST['titel'];
$afbeelding = basename($_FILES["afbeelding"]["name"]);
$vanaf_datum = $_POST['vanaf_datum'];
$tot_datum = $_POST['tot_datum'];
$url = $_POST['url'];
$type = $_POST['type'];

$friendlytitle = friendly_url($titel);
	if (!file_exists('images/advertenties/'.$friendlytitle)) {
		mkdir('images/advertenties/'.$friendlytitle, 0777, true);
		}
		$target_dir = "images/advertenties/".$friendlytitle."/";
		$target_file = $target_dir . basename($_FILES["afbeelding"]["name"]);
		if (move_uploaded_file($_FILES["afbeelding"]["tmp_name"], $target_file)){} 
		
$parameters = array(':titel'=>$titel,
					':afbeelding'=>$afbeelding,
					':vanaf_datum'=>$vanaf_datum,
					':tot_datum'=>$tot_datum,
					':url'=>$url,
					':type'=>$type
					);
	$sth = $pdo->prepare('INSERT INTO advertenties (titel, afbeelding, vanaf_datum, tot_datum, url, type)VALUES(:titel, :afbeelding, :vanaf_datum, :tot_datum, :url, :type)');
	$sth->execute($parameters);
	unset($_POST['Add_advert']);
}


if(isset($_POST['Edit_advert']))
{
$keuze = $_POST['Edit_advert'];
$titel = $_POST['titel'];
$vanaf_datum = $_POST['vanaf_datum'];
$tot_datum = $_POST['tot_datum'];
$url = $_POST['url'];
$type = $_POST['type'];

	$sth = $pdo->prepare('SELECT * FROM advertenties WHERE advertentie_id = '. $keuze);
	$sth->execute(); $row = $sth->fetch();
	if (basename($_FILES["afbeelding"]["name"]) == null)
	{$afbeelding = $row['afbeelding'];}
	else
	{$afbeelding = basename($_FILES["afbeelding"]["name"]);}




$parameters = array(':titel'=>$titel,
					':afbeelding'=>$afbeelding,
					':vanaf_datum'=>$vanaf_datum,
					':tot_datum'=>$tot_datum,
					':url'=>$url,
					':type'=>$type,
					':keuze'=>$keuze
					);
$sth = $pdo->prepare('UPDATE advertenties SET titel=:titel, afbeelding=:afbeelding, vanaf_datum=:vanaf_datum, tot_datum=:tot_datum, url=:url, type=:type WHERE advertentie_id = :keuze');
$sth->execute($parameters);
}


if(isset($_POST['Del_advert']))
{
$keuze = $_POST['Del_advert'];
	$parameters = array(':keuze'=>$keuze);
$sth = $pdo->prepare('DELETE FROM advertenties WHERE advertentie_id = :keuze');
$sth->execute($parameters);
}
?> 

<div class="row">
	<div class="col-xs-12">
		<h3>Beheer Advertenties</h3>
		<br>
		<h4>Advertenties Bewerken</h4>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<form class="" action="" method="post" enctype="multipart/form-data">
			<?php
			$sth = $pdo->prepare('select * from advertenties');
			$sth->execute();
			?>
			<form class="form-inline" action="" method="post">
			
			<?php
			while($row = $sth->fetch())
			{
				?>
					<table class="table table-bordered aanpassen">
					<tr>
						<th>Titel</th>
						<th>Afbeelding</th>
						<th>Vanaf</th>
						<th>Tot</th>
					</tr>
					<tr>
						<td><input type="text" class="form-control" name="titel" value="<?php echo $row['titel']; ?>"></td>
						<td><input type="file" class="form-control" name="afbeelding" value="<?php echo $row['afbeelding']; ?>"></td>
						<td><input type="text" class="form-control" name="vanaf_datum" value="<?php echo $row['vanaf_datum']; ?>"></td>
						<td><input type="text" class="form-control" name="tot_datum" value="<?php echo $row['tot_datum']; ?>" ></td>
					</tr>
					<tr>
						<th>Url</th>
						<th>Type</th>
						<th>Aanpassen</th>
						<th>Verwijderen</th>
					</tr>
					<tr>
						<td><input type="text" class="form-control" name="url" value="<?php echo $row['url']; ?>"></td>
						<td><input type="text" class="form-control" name="type" value="<?php echo $row['type']; ?>"></td>
						<td><button type="submit" name="Edit_advert" class="btn btn-default" value="<?php echo $row['advertentie_id'] ?>">Aanpassen</button></td>
						<td><button type="submit" name="Del_advert" class="btn btn-default" value="<?php echo $row['advertentie_id'] ?>">Verwijderen</button></td>
					</tr>
					</table>
				<?php
				
			}
			?>
			
			</form>
		
		<h4>Advertentie Toevoegen</h4>
		<form class="" method="post" action="" enctype="multipart/form-data">
			<table class="table table-bordered aanpassen">
					<tr>
						<th>Titel</th>
						<th>Afbeelding</th>
						<th>Vanaf</th>
						<th>Tot</th>
					</tr>
					<tr>
						<td><input type="text" class="form-control" name="titel"></td>
						<td><input type="file" class="form-control" name="afbeelding"></td>
						<td><input type="text" class="form-control" name="vanaf_datum"></td>
						<td><input type="text" class="form-control" name="tot_datum" ></td>
					</tr>
					<tr>
						<th>Url</th>
						<th>Type</th>
						<th>Toevoegen</th>
						<th></th>
					</tr>
					<tr>
						<td><input type="text" class="form-control" name="url"></td>
						<td><input type="text" class="form-control" name="type"></td>
						<td><button type="submit" name="Add_advert" class="btn btn-default">Toevoegen</button></td>
					</tr>
					</table>
		</form>
	</div>
</div>