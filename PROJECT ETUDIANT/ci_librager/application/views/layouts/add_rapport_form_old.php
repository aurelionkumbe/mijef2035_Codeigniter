<section>
    <div class="row">
        <h3 class="pull-left col-md-10">Rapport journalier numero <span class="text-primary">
        	<?php echo isset($numero) ? $numero : "le formulaire n a pas ete cree, verifier la base de donnee" ?>
        </span> du <input type="text" class="form-control" style="display: inline; width: 110px; font-size: 16px" disabled value="<?php echo date("Y-m-d") ?>" name="date">
            <a title="retour a la page de consultation" class="pull-right btn btn-warning" href="<?=site_url('rapports/consulter#mes-rapports')?>"><span class="mif-chevron-thin-left"></span>&nbsp;Retour</a>
        </h3>
        <h2 hidden class="pull-right text-muted">Digit Expert SARL</h2>
    </div>
    <p>&nbsp;</p>
    <form method="post" action="<?=site_url('rapports/remplir')?>" class="form form-horizontal col-md-8 col-md-offset-2" id="ajouter-rapport">
        <fieldset class="row">
            <div class="col-md-12">
                <legend>Aujourdh ' hui</legend>
                <div class="input-group">
                    <label class="input-group-addon">Objet</label>
                    <input type="text" id="objet" width="100%" name="objet" placeholder="objet du rapport" class="form-control" required>
                </div>
            </div>
            <div class="col-md-12">
                <input class="form-control disabled" type="hidden" id="personneid" name="personneid" required="true" value="<?=isset($_SESSION['myId']) ? $_SESSION['myId'] : '' ?>" />
                <div class="input-group col-md-12">
                    <label class="input-group-addon" for="heure-debut-travaux">Heure Debut </label>
                    <input class="form-control" type="text" id="heure-debut-travail" placeholder="Quand avez vous commencé" name="heureDebutTravail" required="true" />
                    <label class="input-group-addon" for="duree">Durée </label>
                    <input class="form-control" type="number" id="duree-travail" placeholder="Combien de minutes avez vous travailler aujourd'hui" name="duree" required="true" />
                </div>
            </div>
        </fieldset>
        <p>&nbsp;</p>
        <fieldset class="row">
            <div class="col-md-12">
                <legend>Travaux réalisés
                    <a onclick="$('#w-travail').window('open')" class="btn btn-primary pull-right" id="ajouter-travail-btn"><span class="glyphicons glyphicon-plus"></span></a></legend>

                <select id="travauxId" data-toggle="select2"  name="travauxId[]" multiple class="form-control">
                    <?php if (isset($travaux) && !empty($travaux)): ?>
                        <?php foreach ($travaux as $key => $trav): ?>
                            <option style="height: auto;" value="<?=$trav['id']?>"><?=$trav['intitule']?></option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="-1" disabled>aucun travail enregisté</option>
                    <?php endif ?>
                </select>

        </fieldset>
        <!-- TAF -->
        <fieldset class="row">

            <div class="col-md-12">
                <legend>Travail a faire                     
                <span class="pull-right btn-group">
                		<a class="btn btn-info" id="ajouter-action-btn">
                    	<span id="nbr-act-label" class="badge">0</span>
						</a>
						<a onclick="$('#w-action').window('open')" class="btn btn-primary" id="ajouter-action-btn"><span class="glyphicons glyphicon-plus"></span></a>
                    </span></legend>
                    <input type="hidden" value="0" name="nbrAct" id="nbr-pb">
                <div class="input-group ">
                    <label class="input-group-addon" for="intitule">action</label>
                    <input class="form-control" type="text" id="action" name="action" placeholder="" required="true" />
                    <label for="echeance-action" class="input-group-addon">Echéance</label>
                    <input class="form-control" type="number" id="echeance-action" name="echeanceAction" placeholder="écheance du action">
                    <label class="input-group-addon" for="assignation">assigné a</label>
                    <select class="form-control" style="width:100%" name="personneAssigne" id="personne-assigne">
                        <?php if (isset($superviseurs)): ?>
                        <?php foreach ($superviseurs as $sup): ?>
                        <option value="<?=$sup['id']?>">
                            <?=$sup['nom']?>
                        </option>
                        <?php endforeach ?>
                        <?php else: ?>
                        <option disabled value="-1">no values</option>
                        <?php endif ?>
                    </select>
                  
                    <span class="input-group-btn">
						<a class="btn btn-danger remove" id="ajouter-action-btn"><span class="glyphicons glyphicon-minus"></span></a>
                    </span>
                </div>
            </div>
           
        </fieldset>

        <div id="w-action" class="easyui-window" title="Ajouter une Action" data-options="closed:true,iconCls:''" style="width:500px;height:200px;padding:10px;">
            The window content.
        </div>
        <div id="w-travail" class="easyui-window " title="Ajouter un travail dans la liste des choix" data-options="modal:true,closed:true,iconCls:''" style="width:600px;height:auto;padding:10px;">
            <div class="col-md-12 well well-sm" id="ajouter-travail"  style="margin-top: 24px;">
                <p>nouveau travail</p>
                <div class="input-group col-md-12 ">
                    <label for="intitule-travail" class="input-group-addon">intitulé&nbsp;&nbsp;</label>
                    <input class="form-control" type="text" id="intitule-travail" name="intitule" placeholder="intitulé du travail">
                    <label class="input-group-addon" for="superviseur">Superviseur </label>
                    <select class="form-control dropdown" width="100%" name="superviseurId" id="superviseur">
                        <?php if (isset($superviseurs)): ?>
                            <?php foreach ($superviseurs as $sup): ?>
                                <option value="<?=$sup['id']?>">
                                    <?=$sup['nom']?>
                                </option>
                            <?php endforeach ?>
                        <?php else: ?>
                            <option disabled value="-1">no values</option>
                        <?php endif ?>
                    </select>
                </div>
                <div class="input-group col-md-12 ">
                    <label class="input-group-addon" for="heuredeb">heure de debut: </label>
                    <input class="form-control" type="text" id="heuredeb" placeholder="entré l'heure de début" name="heuredeb"  />
                    <label class="input-group-addon" for="heurefin">heure de fin: </label>
                    <input class="form-control" type="text" id="heurefin" placeholder="entré l'heure de fin" name="heurefin"  />
                </div>
                <div class="input-group col-md-12" style="padding-top: 12px;">
                    <h4 class="text-success">Problèmes rencontrés pendant ... <span id="nbr-pb-label" class="badge">0</span></h4>
                    <input type="hidden" value="0" name="nbrPb" id="nbr-pb">
                    <table id="liste-pb" class="table table-bordered col-md-12">
                        <caption></caption>
                        <thead>
                        <tr>
                            <td colspan="2">
                                <div class="input-group" style="width:100%">
                                    <input class="form-control" type="text" id="intitule-pb" placeholder="intitule du probleme" name="intitulePb" />
                                    <span class="input-group-addon"></span>
                                    <input class="form-control" type="text" id="description-pb" placeholder="description du probleme" name="descriptionPb" />
                                    <span class="input-group-btn">
										<a class="btn btn-primary" id="ajouter-pb">
                                            <span class="mif-plus"></span>
                                        </a>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <a class="btn btn-success" name="ajouter-travail-submit" id="ajouter-travail-submit">Inserer</a>
            </div>
        </div>


        <p>&nbsp;</p>
        <div class="col-md-4 col-md-offset-4">
            <input class="btn btn-primary btn-block btn-lg" type="submit" name="ajouterNouveauRapport" value="valider" />
        </div>
    </form>
</section>
