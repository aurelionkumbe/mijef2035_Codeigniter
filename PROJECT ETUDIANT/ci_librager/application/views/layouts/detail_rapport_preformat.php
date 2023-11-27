
<h1 class="col-md-12">
    <a href="<?=site_url('rapports/consulter#mes-rapports')?>" class="btn btn-lg btn-primary"><span class=" mif-2x mif-chevron-thin-left"></span>Retour</a>
    <button id="rapport-print-preformat-btn" class="btn btn-lg btn-primary"><span class="mif-printer mif-2x"></span>&nbsp;Imprimer</button>
</h1>
<div  class="col-md-12">

<div id="rapport-print-preformat"  class="bg-white" width="700px" height="1590">
    <p>&nbsp;</p>
    <h2 style="background-color: #0a73a7 ;margin-bottom: 100px"  width="100%" align="center">
        <font size="14px" color="blue">
            Rapport Journalier de Travail
        </font>
    </h2>
    <h4 style="padding: 12px; margin: 0; position: relative; top: -12px;">
        <small><span class="pull-left">Effectué le <?=date('d/m/Y')?></span> <span class="pull-right text-capitalize">Pour <?=$_SESSION['me']['nom_personne'].' '.$_SESSION['me']['prenom']?></span></small>
    </h4>


    <table class="" border="1" bgcolor="#fafad2" width="100%" cellpadding="4px" cellspacing="0" >

        <tbody>
        <tr>
            <th>Entreprise</th>
            <td class="text-capitalize"><?=isset($_SESSION['me']['nom_entreprise'])?$_SESSION['me']['nom_entreprise']:''?></td>
            <th>Date</th>
            <td><?=isset($rapport['date_enreg'])?$rapport['date_enreg']:''?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?=isset($_SESSION['me']['email'])?$_SESSION['me']['email']:''?></td>
            <th>H deb. Activité</th>
            <td><?=isset($rapport['heure_debut_service'])?$rapport['heure_debut_service']:''?></td>
        </tr>
        <tr>
            <th>Tel</th>
            <td><?=isset($_SESSION['me']['tel'])?$_SESSION['me']['tel']:''?></td>
            <th>Durée</th>
            <td><?=isset($rapport['duree'])?$rapport['duree']:''?></td>
        </tr>
        <tr>
            <th>Superviseur</th>
            <td><?=isset($_SESSION['me']['nom_personne'])?$_SESSION['me']['nom_personne']:''?></td>
            <th>Fonction</th>
            <td><?=isset($_SESSION['me']['nom_fonction'])?$_SESSION['me']['nom_fonction']:''?></td>
        </tr>
        <tr>
            <th>Nom</th>
            <td><?=isset($_SESSION['me']['nom_personne'])?$_SESSION['me']['nom_personne']:''?></td>
            <th>Prenom</th>
            <td><?=isset($_SESSION['me']['prenom'])?$_SESSION['me']['prenom']:''?></td>
        </tr>
        <p>&nbsp;</p>
        </tbody>
    </table>

        <p><b>1. Objet</b><br>
            <span><?=isset($rapport['objet'])?$rapport['objet']:''?></span>
        </p>
        <p><b>2. Problemes rencontrés</b><br>
            <?php if (isset($rapport['travaux'])): ?>
                <?php foreach ($rapport['travaux'] as  $travail): ?>
                <?php  foreach ($travail['pb'] as  $pb): ?>
                <?php  if (isset($pb)): ?>
    <div style="border-bottom: dotted 1px #ddddbb;">
                        <span class="pb-intitule"><?=$pb['intitule']?><br>
                        <small class="text-muted pb-desc"><?=$pb['description']?></small>
                        </span><br>
    </div>
                    <?php endif; ?>
                <?php endforeach; ?>
                <?php endforeach; ?>

            <?php endif ?>

        </p>
        <p><b>3. Travaux realisés<br>
                <?php if (isset($rapport['travaux'])): ?>
                    <?php foreach ($rapport['travaux'] as  $t): ?>
                        <div style="border-bottom:dotted 1px #ddddbb;">
                            <b><?=$t['travail']?></b><br>
                            <small class="text-muted"> éffectué de <?=$t['heure_debut']?> à <?=$t['heure_fin']?>, supervise par: <?=(isset($t['nom_superviseur']))?$t['nom_superviseur']:' undefined'?></small>
                            <br>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>
        </p>
        <!--
        <li><b>4. Detail travaux realisés</b><br>
            <span>exemple</span>
        </li>-->
        <p><b>5. Actions menées</b><br>
            <div>
                <?php if (isset($rapport['actions'])): ?>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Intitulé</th>
                        <th>Echéance</th>
                        <th>Assigné à</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($rapport['actions'] as  $a): ?>
                        <tr>
                            <td><?=$a['action']?></td>
                            <td><?=$a['echeance']?></td>
                            <td><?=$a['nom_concerne']?></td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
                <?php endif ?>
            </div>
        </p>
    <h4 style="border-top: solid 1px black; padding-top: 2px" class="text-center text-muted">
        <small>
            <span class="pull-left">&nbsp;&nbsp;&nbsp;Imprimé le <?=date('d/m/Y')?></span>
            <span class="pull-right">Imprime par <?=$_SESSION['me']['nom_personne'].' '.$_SESSION['me']['prenom']?>&nbsp;&nbsp;&nbsp;</span>
        </small>
    </h4>
</div>

</div>
