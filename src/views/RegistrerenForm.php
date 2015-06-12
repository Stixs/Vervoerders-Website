<div id="registreren">
	<h1>Registreren</h1>
		<form name="RegistratieFormulier" action="" method="post"> 
			<!-- De eerste variabele onthoudt wat je hebt getyped, De tweede variabele laat de error zien als die er is. -->
			<table>
				<tr>
					<td><b>Contact Gegevens</b></td>
				</tr>
				<tr>
					<td><label for="bedrijfsnaam">Bedrijfs naam:</label></td>
					<td><input type="text" id="bedrijfsnaam" name="bedrijfsnaam" value="<?php echo $bedrijfsnaam; ?>"/></td>
				</tr>
				
				<tr>
					<td><label for="adres">Adres:</label></td>
					<td><input type="text" id="adres" name="adres" value="<?php echo $adres; ?>" /></td>
				</tr>
				<tr>
					<td><label for="postcode">Postcode:</label></td>
					<td><input type="text" id="postcode" name="postcode" value="<?php echo $postcode; ?>" /></td>
				</tr>
				<tr>
					<td><label for="plaats">Plaats:</label></td>
					<td><input type="text" id="plaats" name="plaats" value="<?php echo $plaats; ?>" /></td>
				</tr>
				<tr>
					<td><label for="provincie">Provincie:</label></td>
					<td><input type="text" id="provincie" name="provincie" value="<?php echo $provincie; ?>" /></td><td><?php echo $ZipErr; ?></td> 
				</tr>
				<tr>
					<td><label for="telefoon">Telefoon:</label></td>
					<td><input type="text" id="telefoon" name="telefoon" value="<?php echo $telefoon; ?>" /></td>
				</tr>
				<tr>
					<td><label for="fax">Fax:</label></td>
					<td><input type="text" id="fax" name="fax" value="<?php echo $fax; ?>" /></td>
				</tr>
				<tr>
					<td><label for="o_email">Openbaar email:</label></td>
					<td><input type="text" id="o_email" name="o_email" value="<?php echo $o_email; ?>" /></td>
				</tr>
			</table>
			<table>
				<tr>
					<td><b>Bedrijfs Gegevens</b></td>
				</tr>
				<tr>
					<td><label for="specialiteit">Specialitiet:</label></td>
					<td><input type="text" id="plaats" name="specialiteit" value="<?php echo $specialiteit; ?>" /></td>
				</tr>
				<tr>
					<td><label for="type">Type:</label></td>
					<td><input type="text" id="type" name="type" value="<?php echo $type; ?>" /></td>
				</tr>
				<tr>
					<td><label for="bereik">Bereik:</label></td>
					<td><input type="text" id="bereik" name="bereik" value="<?php echo $bereik; ?>" /></td>
				</tr>
				<tr>
					<td><label for="transport_manager">Transport manager:</label></td>
					<td><input type="text" id="fax" name="transport_manager" value="<?php echo $transport_manager; ?>" /></td>
				</tr>
				<tr>
					<td><label for="aantal">Aantal:</label></td>
					<td><input type="number" id="aantal" name="aantal" value="<?php echo $aantal; ?>" /></td>
				</tr>
				<tr>
					<td><label for="rechtsvorm">Rechtsvorm:</label></td>
					<td><input type="text" id="rechtsvorm" name="rechtsvorm" value="<?php echo $rechtsvorm; ?>" /></td>
				</tr>
				<tr>
					<td><label for="vergunning">Vergunning:</label></td>
					<td><input type="text" id="vergunning" name="vergunning" value="<?php echo $vergunning; ?>" /></td>
				</tr>
				<tr>
					<td><label for="geldig_tot">Geldig tot:</label></td>
					<td><input type="text" id="geldig_tot" name="geldig_tot" value="<?php echo $geldig_tot; ?>" /></td>
				</tr>
			</table>
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
					<td><label for="wachtwoord">wachtwoord:</label></td>
					<td><input type="password" id="wachtwoord" name="wachtwoord" /></td><td><?php echo $PassErr; ?></td>
				</tr>
				<tr>
					<td><label for="rewachtwoord">Herhaal Wachtwoord:</label></td>
					<td><input type="password" id="rewachtwoord" name="rewachtwoord" /></td><td><?php echo $RePassErr; ?></td>	
				</tr>
				<tr>
					<td><input type="submit" name="Registreren" value="Registreer!" /></td>
				</tr>
			</table>
			<table>
				<tr>
					<td align="center"><label for="beschrijving">Beschrijving:</label></td>	
				</tr>
				<tr>
					<td><textarea rows="4" cols="50" name="beschrijving">
					
					</textarea></td>
				</tr>
			</table>
			
		</form>
</div>
