<div class="col-xs-12">
	<h1>Registreren</h1>
	<form name="RegistrerenFormulier" class="registreren" action="" method="post">
		<div class="col-xs-12 col-md-6">
			<div class="form-group">
				<label for="Bedrijfsnaam">Bedrijfsnaam:</label>
				<input type="text" class="form-control" id="bedrijf_naam" name="Bedrijfsnaam" value="<?php echo $bedrijfs_naam; ?>" />
				<?php echo $NameErr; ?>
			</div>
				
			<div class="form-group">
				<label for="Adres">Adres:</label>
				<input type="text" class="form-control" id="Adres" name="adres" value="<?php echo $adres; ?>"  />
			</div>
				
			<div class="form-group">
				<label for="Postcode">Postcode:</label>
				<input type="text" class="form-control" id="Postcode" name="postcode" value="<?php echo $postcode; ?>"  />
				<?php echo $ZipErr; ?>
			</div>
				
			<div class="form-group">
				<label for="Plaats">Plaats:</label>
				<input type="text" class="form-control" id="Plaats" name="plaats" value="<?php echo $plaats; ?>"  />
				<?php echo $CityErr; ?>
			</div>
				
			<div class="form-group">
				<label for="provincies">provincie:</label>
				<input type="text" class="form-control" id="provincie" name="provincie" value="<?php echo $provincie; ?>"  />
			</div>
				
			<div class="form-group">
				<label for="Telefoon">Telefoon:</label>
				<input type="text" class="form-control" id="Telefoon" name="telefoon" value="<?php echo $telefoon; ?>"  />
				<?php echo $TelErr; ?>
			</div>
				
			<div class="form-group">
				<label for="Fax">Fax:</label>
				<input type="text" class="form-control" id="Fax" name="fax" value="<?php echo $fax; ?>"  />
			</div>
				
			<div class="form-group">
				<label for="Email">Bedrijfs E-mail:</label>
				<input type="text" class="form-control" id="bedrijfs_email" name="bedrijfs_email" value="<?php echo $bedrijfs_email ?>" />
				<?php echo $MailErr; ?>
			</div>
		</div>
			
		<div class="col-xs-12 col-md-6">
			<div class="form-group">
				<label for="specialiteit">Specialiteit:</label>
				<input type="text" class="form-control" id="specialiteit" name="specialiteit" value="<?php echo $specialiteit; ?>"  />
			</div>
				
			<div class="form-group">
				<label for="type">Type:</label>
				<input type="text" class="form-control" id="type" name="type" value="<?php echo $type; ?>"  />
			</div>
				
			<div class="form-group">
				<label for="bereik">Bereik:</label>
				<input type="text" class="form-control" id="bereik" name="bereik" value="<?php echo $bereik; ?>"  />
			</div>
				
			<div class="form-group">
				<label for="aantal">Aantal:</label>
				<input type="number" class="form-control" id="aantal" name="aantal" value="<?php echo $aantal; ?>"  />
			</div>
				
			<div class="form-group">
				<label for="transportmanager">Transport-manager:</label>
				<input type="text" class="form-control" id="transport_manager" name="transport_manager" value="<?php echo $transport_manager; ?>"  />
			</div>
			
			<div class="form-group">
				<label for="rechtsvorm">Rechtsvorm:</label>
				<input type="text" class="form-control" id="rechtsvorm" name="rechtsvorm" value="<?php echo $rechtsvorm; ?>"  />
			</div>
			
			<div class="form-group">
				<label for="vergunning">Vergunning:</label>
				<input type="text" class="form-control" id="vergunning" name="vergunning" value="<?php echo $vergunning ?>" />
			</div>
			
			<div class="form-group">
				<label for="geldigtot">Geldig tot:</label>
				<input type="text" class="form-control" id="geldigtot" name="geldigtot" value="<?php echo $geldigtot; ?>" />
			</div>
		</div>
		<div class="col-xs-12">
			<div class="form-group">
				<label for="beschrijving">Beschrijving:</label>
				<textarea id="beschrijving" class="form-control" name="beschrijving" rows="5" ><?php echo $beschrijving; ?></textarea>
			</div>
		</div>
		<div class="col-xs-12">
			<button class="btn btn-default" type="submit" name="Registrerenbedrijf" value="Registreren!" />Registreren</button>
		</div>
	</form>
</div>