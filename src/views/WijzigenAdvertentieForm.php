<div class="row">
	<div class="col-xs-12">
		<h1>Advertentie Wijzigen</h1>
		<form name="WijzigenFormulier" class="wijzigen" action="" method="post">
			<div class="col-xs-6">
				<div class="form-group">
					<label for="titel">Titel:</label>
					<input type="text" class="form-control" id="bedrijf_naam" name="titel" value="<?php echo $titel; ?>" />
				</div>
					
				<div class="form-group">
					<label for="afbeelding">afbeelding:</label>
					<input type="file" class="form-control" id="afbeelding" name="Picture"/>
				</div>
					
				<div class="form-group">
					<label for="vanaf">Vanaf:</label>
					<input type="date" class="form-control" id="vanaf" name="vanaf_datum" value="<?php echo $vanaf_datum; ?>"  />
				</div>
					
				<div class="form-group">
					<label for="tot">Tot:</label>
					<input type="text" class="form-control" id="tot" name="tot_datum" value="<?php echo $tot_datum; ?>"  />
				</div>
					
				<div class="form-group">
					<label for="url">url:</label>
					<input type="text" class="form-control" id="url" name="url" value="<?php echo $url; ?>"  />
				</div>
					
				<div class="form-group">
					<label for="type">Type:</label>
					<input type="text" class="form-control" id="type" name="type" value="<?php echo $type; ?>"  />
				</div>

			</div>
		
				
			</div>
			<div class="col-xs-12">
				<button class="btn btn-default" type="submit" name="Aanpassen" value="Wijzigen!" />Aanpassen</button>
			</div>
		</form>
	</div>
</div>