<section>
    <div class="row">

        <?php
        if (isset($rapport)):
            //var_dump($rapport); die;
            ?>

            <h4 class="pull-left col-md-10">Rapport journalier numero <span class="text-primary">
                    <?php echo isset($rapport['numero']) ? $rapport['numero'] : "le formulaire n a pas ete cree, verifier la base de donnee" ?>
                </span> du <input type="text" class="form-control" style="display: inline; width: 120px; font-size: 16px"
                                  disabled value="<?php echo $rapport['date_enreg'] ?>" name="date">
                <a class="pull-right btn btn-warning" href="<?= site_url('rapport/consulter') ?>"><span
                        class="mif-chevron-thin-left"></span>&nbsp;Retour</a>
            </h4>
            <h2 hidden class="pull-right text-muted">Digit Expert SARL</h2>
        </div>
        <p>&nbsp;</p>


        <form id="modifier-rapport-form" method="post" action="<?= site_url('rapport/remplir') ?>"
              class="form form-horizontal col-md-8 col-md-offset-2" id="ajouter-rapport">

            <!-- infos personne -->
            <fieldset class="row">
                <input type="hidden" id="pers-id" width="100%" name="pers['id']" required>
                <input type="hidden" id="nom" width="100%" name="pers['id']" required>
                <input type="hidden" id="prenom" width="100%" name="pers['id']" required>
                <input type="hidden" id="tel" width="100%" name="pers['id']" required>
                <input type="hidden" id="email" width="100%" name="pers['email']" required>
                <input type="hidden" id="tel" width="100%" name="pers['tel']" required>
                <div class="col-md-12">
                    <legend style="margin-bottom: 0">detail de la personne</legend>
                    <div id="profile-card" class="col-md-12 bg-lime ">
                        <h4 class="text-left" style="color: #f8ffd6"> Rapport de
                            <b><?= $rapport['nom'] . ' ' . $rapport['prenom'] ?></b> employé comme
                            <b title="<?= $rapport['description'] ?>"><?= $rapport['fonction'] ?></b> à
                            <b><?= $rapport['entreprise'] ?></b></h4>
                        <div class="col-md-10" style="padding: 0;padding-right: 12px; ">
                            <div>Autres informations :</div>
                            <span>Telephone : <?= $rapport['tel'] ?></span><br>
                            <span>Email : <?= $rapport['email'] ?></span><br>
                        </div>
                        <p>&nbsp;</p>
                    </div>
                </div>
            </fieldset> <!-- END OF infos personne -->

            <!-- aujourd hui -->
            <fieldset class="row">
                <div class="col-md-12">
                    <legend>Aujourdh ' hui</legend>
                    <div class="input-group">
                        <input type="hidden" id="rapport-numero" width="100%" name="numero"
                               value="<?php echo isset($rapport['numero']) ? $rapport['numero'] : '' ?>" required>
                        <label class="input-group-addon">Objet</label>
                        <input type="text" id="objet" width="100%" name="objet" value="<?php echo isset($rapport['objet']) ? $rapport['objet'] : '' ?>" placeholder="objet du rapport"
                               class="form-control" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <input class="form-control disabled" type="hidden" id="personneid" name="personne_id" required="true"/>
                    <div class="input-group col-md-12">
                        <label class="input-group-addon" for="heure-debut-travaux">Heure Debut </label>
                        <input class="form-control" type="text" id="heure-debut-travail" value="<?php echo isset($rapport['heure_deb']) ? $rapport['heure_deb'] : '' ?>"
                               placeholder="Quand avez vous commencé" name="heureDebutTravail" required="true"/>
                        <label class="input-group-addon" for="duree">Durée </label>
                        <input class="form-control" type="number" id="duree-travail"
                               placeholder="Combien de minutes avez vous travailler aujourd'hui" min="0" max="1440" name="duree"
                               value="<?php echo isset($rapport['duree']) ? $rapport['duree'] : '' ?>"    required="true"/>
                    </div>
                </div>
            </fieldset><!--END OF  aujourd hui -->
            <p>&nbsp;</p>

            <!-- travaux realises -->
            <fieldset class="row">
                <div class="col-md-12">
                    <legend>Travaux déja réalisés
                        <span class="btn-group pull-right">
                            <span disabled class="btn btn-info">
                                <span id="nbr-trav-label" class="badge">0</span>
                            </span>
                            <a onclick="$('#w-travail').window('open')" class="btn btn-primary pull-right"
                               id="ajouter-travail-btn"><span class="glyphicons glyphicon-plus"></span> Nouveau</a>
                        </span>
                    </legend>
                    <ul id="liste-des-travaux" class="list-group">
                        <?php $i = 0;
                        if (isset($rapport['travaux']) && !empty($rapport['travaux'])):
                            ?>
        <?php foreach ($rapport['travaux'] as $key => $trav): ?>
                                <li class="list-group-item">
                                    <b><?= $trav['travail'] ?></b><br>
                                    <small class="text-muted"> éffectué de <?= $trav['heure_debut'] ?>
                                        à <?= $trav['heure_fin'] ?>, supervisé
                                        par: <?= (isset($trav['nom_superviseur'])) ? $trav['nom_superviseur'] : ' undefined' ?></small>
                                    <span class=" pull-right">
                                        <button class="btn btn-sm btn-default show-pb-btn" type="button"
                                                data-slidetoggle="#pb-de-<?= html_escape($trav['id']) ?>">problemes liés
                                            <span class="caret"></span>
                                        </button>
                                        <a title="supprimés ce travail" class=" badge remove-travail"
                                           href="<?= site_url('travail/supprimer/' . $trav['id']) ?>">
                                            <span class="mif-bin mif-1x">suppimé</span>
                                        </a>&nbsp;&nbsp;
                                    </span>
                                    <div hidden id="pb-de-<?= html_escape($trav['id']) ?>" class="col-md-12 well well-sm pb">
                                        <?php if (isset($trav['pb']) && !empty($trav['pb'])): ?>
                <?php foreach ($trav['pb'] as $pb): ?>
                                                <div class="col-md-12" style="border-bottom: 1px dotted white;">
                                                    <b><?= html_escape($pb['intitule']) ?></b><br>
                                                    <span
                                                        style="overflow: hidden;"><?= html_escape($pb['description']) ?></span>
                                                </div>
                                            <?php endforeach ?>
                                        <?php else: ?>
                                            <div class="text-center text-success">Aucun probleme rencontré.</div>
            <?php endif ?>

                                    </div>
                                </li>
                                <?php $i++;
                            endforeach ?>

                        <?php else: ?>
                            <p class="text-center text-success">Aucun travail n'a encore été ajouté.</p>
    <?php endif ?>
                    </ul>

                    <input type="hidden" value="<?= $i ?>" name="nbTrav" id="nb-trav">

                    <div class="input-group" hidden="">
                        <select id="travauxId" data-toggle="select2" name="travauxId[]" multiple class="form-control">
    <?php if (isset($travaux) && !empty($travaux)): ?>
                                        <?php foreach ($travaux as $key => $trav): ?>
                                    <option style="height: auto;"
                                            value="<?= $trav['id'] ?>"><?= $trav['intitule'] ?></option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option value="-1" disabled>aucun travail enregisté</option>
    <?php endif ?>
                        </select>
                    </div>
            </fieldset><!-- END OF travaux realises -->

            <!-- TAF -->
            <fieldset class="row">
                <div class="col-md-12">
                    <legend>Travaux/actions a faire                     
                        <span class="pull-right btn-group">
                            <span disabled class="btn btn-info">
                                <span id="nbr-act-label" class="badge">0</span>
                            </span>
                            <a onclick="$('#w-action').window('open')" class="btn btn-primary" id="ajouter-action-btn"><span
                                    class="glyphicons glyphicon-plus"></span> Nouveau</a>
                        </span></legend>
                    <ul id="liste-des-actions" class="list-group">
                        <?php $i = 0;
                        if (isset($rapport['actions']) && !empty($rapport['actions'])):
                            ?>
        <?php foreach ($rapport['actions'] as $key => $act): ?>
                                <li class="list-group-item">
                                    <b><?= $act['action'] ?></b><br>
                                    <small class="text-muted">à éffectué avant <?= $act['echeance'] ?> minutes
                                        par <?= (isset($act['nom_concerne'])) ? $act['nom_concerne'] : ' undefined' ?></small>
                                    <a title="supprimé cette tache" class="badge remove-action pull-right"
                                       href="<?= site_url('action/supprimer/' . $act['id']) ?>">
                                        <span class="mif-bin mif-1x">supprimé</span>
                                    </a>
                                </li>
                                <?php $i++;
                            endforeach ?>
    <?php else: ?>
                            <p class="text-center text-success">Aucune action n'a encore été ajoutée.</p>
    <?php endif ?>
                    </ul>
                </div>

                <div class="col-md-12"><input type="hidden" value="<?= $i ?>" name="nbAct" id="nb-act"></div>
                <div class="input-group col-md-12" hidden="">
                    <select id="actionsId" data-toggle="select2" name="actionsId[]" multiple class="form-control">
                        <?php if (isset($actions) && !empty($actions)): ?>
                            <?php foreach ($actions as $key => $act): ?>
                                <option style="height: auto;" value="<?= $act['id'] ?>"><?= $act['intitule'] ?> assigné
                                    à <?= $act['intitule'] ?></option>
        <?php endforeach; ?>
    <?php else: ?>
                            <option value="-1" disabled>aucun travail planifié (action) enregisté</option>
    <?php endif ?>
                    </select>
                </div>
            </fieldset><!-- END OF TAF -->
            <p>&nbsp;</p>

            <div class="col-md-4 col-md-offset-4">
                <input class="btn btn-primary btn-block btn-lg" type="submit" name="update_rapport"
                       value="Mettre à jour"/>
            </div>
        </form>
<?php else: ?>
        <p class="text-center bg-white col-md-12">le rapport demandé n'existe pas.</p>
<?php endif ?>
</section>

<div id="w-travail" class="easyui-window " title="Ajouter un travail dans la liste des choix"
     data-options="modal:true,closed:true,iconCls:''" style="width:620px;height:auto;padding:20px;">
    <div class="col-md-12 well well-sm" id="ajouter-travail" style="margin-top: 24px;">
        <p>nouveau travail</p>
        <div class="input-group col-md-12 ">
            <label for="intitule-travail" class="input-group-addon">intitulé&nbsp;&nbsp;</label>
            <input class="form-control" type="text" id="intitule-travail" name="intitule"
                   placeholder="intitulé du travail">
            <label class="input-group-addon" for="superviseur">Superviseur </label>
            <select class="form-control dropdown" width="100%" name="superviseurId" id="superviseur">
                <?php if (isset($superviseurs)): ?>
                    <?php foreach ($superviseurs as $sup): ?>
                        <option value="<?= $sup['id'] ?>">
                        <?= $sup['nom'] ?>
                        </option>
    <?php endforeach ?>
<?php else: ?>
                    <option disabled value="-1">no values</option>
<?php endif ?>
            </select>
        </div>
        <div class="input-group col-md-12 ">
            <label class="input-group-addon" for="heuredeb">heure de debut: </label>
            <input class="form-control" type="text" id="heuredeb" placeholder="entré l'heure de début"
                   name="heuredeb"/>
            <label class="input-group-addon" for="heurefin">heure de fin: </label>
            <input class="form-control" type="text" id="heurefin" placeholder="entré l'heure de fin"
                   name="heurefin"/>
        </div>
        // problemes rencontre
        <div class="input-group col-md-12" style="padding-top: 12px;">
            <h4 class="text-success">Problèmes rencontrés pendant ... <span id="nbr-pb-label" class="badge">0</span></h4>
            <input type="hidden" value="0" name="nbrPb" id="nbr-pb">
            <table id="liste-pb" class="table table-bordered col-md-12">
                <caption></caption>
                <thead>
                    <tr>
                        <td colspan="2">
                            <div class="input-group" style="width:100%">
                                <input class="form-control" type="text" id="intitule-pb"
                                       placeholder="intitule du probleme" name="intitulePb"/>
                                <span class="input-group-addon"></span>
                                <input class="form-control" type="text" id="description-pb"
                                       placeholder="description du probleme" name="descriptionPb"/>
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
</div> <!-- END OF #w-travail -->
<div id="w-action" class="easyui-window" title="Ajouter une Action" data-options="closed:true,modal:true,iconCls:''"
     style="width:600px;height:400px;padding:10px;">
    <p class="row">&nbsp;</p>
    <p class="row">&nbsp;</p>
    <form action="<?php echo site_url('action/ajouter') ?>" id="ajouter-action-form">
    
            <div class="col-md-12">
                <div class="input-group ">
                    <label class="input-group-addon" for="intitule">action</label>
                    <input class="form-control" type="text" id="intitule-action" name="intituleAction" placeholder=""
                           required="true"/>
                </div>
                <div class="col-md-12">
                    <div class="input-group "><label for="echeance-action" class="input-group-addon">Echéance</label>
                        <input class="form-control" type="number" id="echeance-action" name="echeanceAction"
                               placeholder="écheance du action">
                    </div>
                    <div class="input-group">
                        <label class="input-group-addon" for="assignation">assigné a</label>
                        <select data-toggle="" class="form-control" style="width:100%" id="personne-assigne-action"
                                name="personneAssigne" id="personne-assigne">
                            <?php if (isset($superviseurs)): ?>
                                <?php foreach ($superviseurs as $sup): ?>
                                    <option value="<?= $sup['id'] ?>">
                                    <?= $sup['nom'] ?>
                                    </option>
    <?php endforeach ?>
<?php else: ?>
                                <option disabled value="-1">no values</option>
<?php endif ?>
                        </select>
                    </div>
                </div>
                <p>&nbsp;</p>
                <a class="btn btn-success col-md-offset-1" name="ajouterActionSubmit" id="ajouter-action-submit">Inserer</a>
    </form>
</div> <!-- END OF #w-action -->
