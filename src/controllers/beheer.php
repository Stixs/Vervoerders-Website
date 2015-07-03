<?php
if(isset($_POST['add_spec']))
{
$specialiteit = $_POST['specialiteit'];
$parameters = array(':specialiteit'=>$specialiteit);
	$sth = $pdo->prepare('INSERT INTO specialiteiten (specialiteit)VALUES(:specialiteit)');
	$sth->execute($parameters);




}
if(isset($_POST['edit_spec']))
{
$keuze = $_POST['keuze'];
$specialiteit = $_POST['specialiteit'];
$parameters = array(':specialiteit'=>$specialiteit,
					':keuze'=>$keuze);
$sth = $pdo->prepare('UPDATE specialiteiten SET specialiteit=:specialiteit WHERE specialiteit_id = :keuze');
}

	
?> 

<div class="row">
	<div class="col-xs-12">
		<h3>Beheer Transportplaza</h3>
	</div>
</div>
<div class="row">
	<div class="col-xs-6">
		<form class="form-inline" action="" method="post">
			<?php
			$x=0;
			$sth = $pdo->prepare('select * from specialiteiten');
			$sth->execute();
			while($row = $sth->fetch())
			{
			$x++;
			?>
			
				<div class="form-group">
				<label for="specialiteit">Specialiteit</label>
				<input type="text" class="form-control" id="specialiteit" name="specialiteit" value="<?php echo $row['specialiteit']; ?>">
				<input type="hidden" name="keuze" value="<?php echo $x ?>">
				<button type="submit" name="edit_spec" class="btn btn-default">Wijzig</button>
				</div>
				<br>
			<?php
			}
			?> 
		</form>



	
		<form class="form-inline" method="post" action="" >
			<div class="form-group">
				<label for="specialiteit">Specialiteit</label>
				<input type="text" class="form-control" id="specialiteit" name="specialiteit">
				<button type="submit" name="add_spec" class="btn btn-default">Toevoegen</button>
			</div>
		</form>
	</div>
</div>