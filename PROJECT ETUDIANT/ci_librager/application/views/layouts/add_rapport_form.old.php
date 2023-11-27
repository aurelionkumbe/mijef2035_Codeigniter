	<section>
		<div class="row">
			<h3 class="pull-left">Rapport journalier du <input type="text" class="form-control" style="display: inline; width: 110px; font-size: 16px" disabled value="<?php echo date("Y-m-d") ?>" name="date"></h3>
			<h2 hidden class="pull-right text-muted">Digit Expert SARL</h2>
		</div>
        <p>&nbsp;</p>
		<form method="post" action="" class="form form-horizontal col-md-8 col-md-offset-2" id="ajouter-rapport">
			<fieldset class="row">
				<div class="col-md-12">
				<legend>Qui etes vous?</legend>
					<div class="col-md-6">
						<div class="input-group">
							<label class="input-group-addon" for="nom">Nom </label>
							<input class="form-control" type="text" id="nom" name="nom" placeholder="entrer votre nom" required="true" />
						</div>
					</div>
					<div class="col-md-6">
						<div class="input-group">
							<label class="input-group-addon" class="input-group-addon" for="prenom">Prenom </label>
							<input class="form-control" type="text" id="prenom" name="prenom" placeholder="entrer votre prenom" required="true" />
						</div>
					</div>
					<div class="col-md-6">
						<div class="input-group">
							<label class="input-group-addon" for="email">Email </label>
							<input class="form-control" type="text" id="email" name="email" placeholder="entrer votre email" required="true" />
						</div>
					</div>
					<div class="col-md-6">
						<div class="input-group">
							<label class="input-group-addon" for="tel">Tel </label>
							<input class="form-control" type="tel" id="tel" name="tel" placeholder="entrer votre tel" required="true" />
						</div>
					</div>
					<div class="col-md-6">
						<div class="input-group">
							<label class="input-group-addon" for="fonction">Fonction </label>
							<input class="form-control" type="text" id="fonction" placeholder="entré votre fonction ici" name="fonction" required="true" />
						</div>
					</div>
					<div class="col-md-6">
						<div class="input-group">
							<label class="input-group-addon" for="superviseur">Superviseur </label>
							<input class="form-control" type="text" id="superviseur" placeholder="entré votre superviseur ici" name="superviseurId" required="true" />
						</div>
					</div>
					<div class="col-md-6">
						<div class="input-group">
							<label class="input-group-addon" for="superviseur">Heure Debut </label>
							<input class="form-control" type="text" id="heure-debut-travail" placeholder="Quand avez vous commenceé" name="superviseurId" required="true" />
						</div>
					</div>
					<div class="col-md-6">
						<div class="input-group">
							<label class="input-group-addon" for="duree">Durée </label>
							<input class="form-control" type="number" id="heure-debut-travail" placeholder="Combiem de minutes avez vous travailler aujourd'hui" name="superviseurId" required="true" />
						</div>
					</div>
				</div>
			</fieldset>
			<p>&nbsp;</p>
			<fieldset class="row">
				<div class="col-md-12">
					<div class="input-group">
						<span class="input-group-addon">
							Objet
						</span>
						<input type="text" name="objet" class="form-control">
					</div>
				</div>
			</fieldset>

			<fieldset class="row">
				<div class="col-md-12">
					<legend>Travaux réalisés</legend>
					<div class="col-md-11" >
						<div style="margin-top: 5px;" class="jqxComboBox" id='jqxComboBox-travaux'>
						</div>
					</div>
					<div class="col-md-1">
						<a class="btn btn-primary" id="ajouter-travail-btn"><span class="glyphicons glyphicon-plus"></span></a>
					</div>
				</div>
				<input type="hidden" id="log-travaux" value="" name="travaux">

				<div class="col-md-12 well well-sm" id="ajouter-travail" hidden>
					<p>&nbsp;</p>
					<div class="input-group">
						<label for="intitule-travail" class="input-group-addon">intitulé</label>
						<input class="form-control" type="text" id="intitule-travail" name="intitule" placeholder="intitulé du travail">
						<label class="input-group-addon" for="heuredeb">heure de debut: </label>
						<input class="form-control" type="text" id="heuredeb" placeholder="entré l'heure de début" name="heuredeb" required="true" />
						<label class="input-group-addon" for="heurefin">heure de fin: </label>
						<input class="form-control" type="text" id="heurefin" placeholder="entré l'heure de fin" name="heurefin" required="true" />
					</div>
					<div class="input-group col-md-12" style="padding-top: 12px;">

						<h4 class="text-success">Problèmes rencontrés <small style="position: relative; top: 14px;" class="pull-right text-danger"><span class="mif-warning mif-ani-flash mif-ani-fast"></span>&nbsp;respecter le format, un probleme par ligne</small></h4>
						<textarea class="form-control" style="width : 100%;" rows="5" cols="26" name="problemes" id="problemes" placeholder="intitule du probleme::description;;">
intitule1::description1;;
intitule2::description2;;
		....
		....
intituleN::descriptionN;;
						</textarea>
					</div>
					<a class="btn btn-success" name="ajouter-travail-submit" id="ajouter-travail-submit">Inserer</a>
				</div>
			</fieldset>
			<fieldset class="row">
				<div class="col-md-12">
					<legend>Travail a faire </legend>
					<div class="input-group">
						<label class="input-group-addon"  for="intitule">action</label>
						<input class="form-control" type="text" id="action" name="action" placeholder=""  required="true"/>
						<label class="input-group-addon"  for="assignation">assigné a</label>
						<input class="form-control" type="text" id="assignation" name="assignation" placeholder="personne designé" required="true"/>
						<!--
						<label class="input-group-addon"  for="echeance">echeance</label>
						<input class="form-control" type="text" id="echeance" name="echeance" placeholder="" required="true"/>
						-->
						<span class="input-group-btn">
						<a class="btn btn-primary" id="ajouter-action-btn"><span class="glyphicons glyphicon-plus"></span></a>
					</span>
					</div>
				</div>
				<div class="col-md-12 well well-sm" id="ajouter-action" hidden>
					<p>&nbsp;</p>
					<div class="input-group">
						<label for="intitule-action" class="input-group-addon"></label>
						<input class="form-control" type="text" id="intitule-action" name="initituleAction" placeholder="intitulé du action">
						<label for="echeance-action" class="input-group-addon"></label>
						<input class="form-control" type="text" id="action-travail" name="echeanceAction" placeholder="écheance du action">
					</div>
					<a class="btn btn-success" name="ajouter-action-submit" id="ajouter-action-submit">Inserer</a>
				</div>
			</fieldset>
			<p>&nbsp;</p>
			<div class="col-md-4 col-md-offset-4">
				<input class="btn btn-primary btn-block btn-lg" type="submit" value="valider" /> 
			</div>
		</form>							
	</section>
