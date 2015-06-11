<!-- 
	Opdracht 4.03 : Mijn Profiel 
	Maak hier het formulier voor de pagina Mijn Profiel. Let op: dit lijkt sterk op het formulier Registreren
-->
	
<form name="MijnProfielFormulier" action="" method="post"> 
		<!-- De eerste variabele onthoudt wat je hebt getyped, De tweede variabele laat de error zien als die er is. -->
		<table>
			<tr>
				<td><label for="FirstName">Voornaam:</label></td>
				<td><input type="text" id="FirstName" name="FirstName" value="<?php echo $FirstName; ?>"/>*</td><td><?php echo $FnameErr; ?></td>
			</tr>
			<tr>
				<td><label for="LastName">Achternaam:</label></td>
				<td><input type="text" id="LastName" name="LastName" value="<?php echo $LastName; ?>" />*</td><td><?php echo $LnameErr; ?></td>	
			</tr>
			<tr>
				<td><label for="Adres">Adres:</label></td>
				<td><input type="text" id="Adres" name="Adres" value="<?php echo $Adres; ?>" /></td>
			</tr>
			<tr>
				<td><label for="ZipCode">Postcode:</label></td>
				<td><input type="text" id="ZipCode" name="ZipCode" value="<?php echo $ZipCode; ?>" /></td><td><?php echo $ZipErr; ?></td>
			</tr>
			<tr>
				<td><label for="City">Plaats:</label></td>
				<td><input type="text" id="City" name="City" value="<?php echo $City; ?>" /></td><td><?php echo $CityErr;?></td>
			</tr>
			<tr>
				<td><label for="TelNr">Telefoon nr.:</label></td>
				<td><input type="text" id="TelNr" name="TelNr" value="<?php echo $TelNr; ?>" />*</td><td><?php echo $TelErr; ?></td>
			</tr>
			<tr>
				<td><label for="Email">E-mail:</label></td>
				<td><input type="text" id="Email" name="Email" value="<?php echo $Email; ?>" />*</td><td><?php echo $MailErr; ?></td>
			</tr>
			<tr>
				<td><input type="submit" name="Wijzigen" value="Wijzigen" /></td>
			</tr>
		</table>
</form>