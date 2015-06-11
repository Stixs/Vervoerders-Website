<!-- 
	Opdracht 5.01 : Film Toevoegen 
	Maak hier het formulier waarmee je een film kan toevoegen aan de database. Let op: dit formulier komt dus overeen met de velden uit de database tabel Films
-->
	<form name="Toevoegen" action="" method="post">
		<table>
			<tr>
				<td><label>Titel</label></td>
				<td><input type="text" name="Titel" value="<?php echo $Title; ?>" />*</td><td><?php echo $TitleErr; ?></td>
			</tr>
			<tr>
				<td><label>Beschrijving</label></td>
				<td><textarea name="Beschrijving" rows="7" cols="75"><?php echo $Description; ?></textarea>*</td><td><?php echo $DescErr; ?></td>
			</tr>
			<tr>
				<td><label>Duur</label></td>
				<td><input type="number" name="Duur" value="<?php echo $Duration; ?>" />*</td><td><?php echo $DurErr; ?></td>
			</tr>
			<tr>
				<td><label>Prijs</label></td>
				<td><input type="text" name="Prijs" value="<?php echo $Price; ?>" />*</td><td><?php echo $PriceErr; ?></td>
			</tr>
			<tr>
				<td><label>Genre</label></td>
				<td>
					<select name="Genre">
						<option value="Actie">Actie</option>
						<option value="Avontuur">Avontuur</option>
						<option value="Thriller">Thriller</option>
						<option value="Horror">Horror</option>
						<option value="Drama">Drama</option>
						<option value="Western">Western</option>
						<option value="Oorlog">Oorlog</option>
						<option value="Komedie">Komedie</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><label>Leeftijd</label></td>
				<td>
					<select name="Leeftijd">
						<option value="ALL">All</option>
						<option value="6">6</option>
						<option value="12">12</option>
						<option value="16">16</option>
						<option value="18">18</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><label>Status</label></td>
				<td>
					<select name="Status">
						<option value="Verwacht">Verwacht</option>
						<option value="InBios">InBios</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><label>Type</label></td>
				<td>
					<select name="Type">
						<option value="Normaal">Normaal</option>
						<option value="3D">3D</option>
						<option value="IMAX">IMAX</option>
						<option value="IMAX 3D">IMAX 3D</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><label>Afbeelding</label></td>
				<td><input type="File" name="Plaatje" /></td>
			</tr>
			<tr>
				<td><input type="submit" name="Toevoegen" value="Toevoegen" /></td>
			</tr>
		</table>
	</form>
			
						
