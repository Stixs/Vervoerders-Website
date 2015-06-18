<div id="profiel">
	<h1>Registreren</h1>
		<form name="ProfielFormulier" action="" method="post"> 
			<!-- De eerste variabele onthoudt wat je hebt getyped, De tweede variabele laat de error zien als die er is. -->
			<table>
				<tr>
					<td><b>Account Gegevens</b></td>
				</tr>
				<tr>
					<td><label for="i_email">Intern email adres:</label></td>
					<td><input type="text" id="i_email" name="i_email"  value="<?php echo $i_email; ?>" /></td>
				</tr>
				<tr>
					<td><label for="inlognaam">Inlognaam:</label></td>
					<td><input type="text" id="inlognaam" name="inlognaam"  value="<?php echo $inlognaam; ?>" /></td>
				</tr>
				<tr>
					<td><label for="wachtwoord">Oud Wachtwoord:</label></td>
					<td><input type="password" id="wachtwoord" name="wachtwoord" /></td><td><?php echo $PassErr; ?></td>
				</tr>
				<tr>
					<td><br></td>
				</tr>
				<tr>
					<td><label for="nwachtwoord">Nieuw Wachtwoord:</label></td>
					<td><input type="password" id="nwachtwoord" name="nwachtwoord" /></td><td><?php echo $RePassErr; ?></td>	
				</tr>
				<tr>
					<td><label for="rewachtwoord">Herhaal Wachtwoord:</label></td>
					<td><input type="password" id="rewachtwoord" name="rewachtwoord" /></td><td><?php echo $RePassErr; ?></td>	
				</tr>
				<tr>
					<td><input type="submit" name="wijzing" value="Wijzig" /></td>
				</tr>
			</table>
		</form>
</div>
