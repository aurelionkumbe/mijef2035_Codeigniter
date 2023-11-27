<div class="col-md-12">
    <h2 >Liste des rapports deja enregistrés </h2>
</div>
<table id="autres-rapports" data-toggle="datatables" style="width: 100%" class="table table-hover table-striped">
    <caption></caption>
    <thead style="background-color: grey;">
    <tr>
        <td class="text-shadow">Objet</td>
        <td class="text-shadow">Duree</td>
        <td class="text-shadow" title="heure debut de service">HDS</td>
        <td class="text-shadow">numero</td>
        <td class="text-shadow">Date</td>
        <td class="text-shadow">employé concerné</td>
        <td class="text-shadow" title="action">action&nbsp;</td>
    </tr>
    </thead>
    <tbody>
    <?php if (isset($autresRapports) && !empty($autresRapports)): ?>
        <?php foreach ($autresRapports as $rap): ?>
            <tr class="rapport" id="<?='rapport'.$rap['numero']?>">
                <td class="rapport-objet" ><?=html_escape($rap['objet'])?></td>
                <td class="rapport-duree" ><?=html_escape($rap['duree'])?></td>
                <td class="rapport-hds" ><?=html_escape($rap['heure_debut_service'])?></td>
                <td class="rapport-numero" ><?=html_escape($rap['numero'])?></td>
                <td class="rapport-date" ><?=html_escape($rap['date_enreg'])?></td>
                <td class="rapport-nom-pers" ><?=html_escape($rap['nom'].' '.$rap['prenom'])?></td>
                <td class="">
                    <a href="<?=site_url('rapport/detail/'.$rap['numero'])?>" title="detailler et imprimer" class="btn" type="button"><span class="mif-printer"></span></a>
                    <?php if($_SESSION['est_admin']):?>
                    <a title="editer" href="<?=site_url('rapport/update/'.$rap['numero'])?>" class="btn edit" type="button"><span class="mif-pencil"></span></a>
                    <a title="supprimer" class="btn remove" data-toggle="jconfirm" href="<?=site_url('rapport/delete/'.$rap['numero'])?>"><span class="mif-bin"></span></a>

                    <?php elseif($_SESSION['today_rapport'] == $rap['numero']):?>
                        <a title="editer" href="<?=site_url('rapport/modifier/'.$rap['numero'])?>" class="btn edit" type="button"><span class="mif-pencil"></span></a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach ?>
    <?php else: ?>
        <tr class="text-center fg-red"><td colspan="6">Aucun autres rapports trouvés</td></tr>
    <?php endif ?>
    </tbody>
</table>

   <div id="w-rapport-edit" class="easyui-window" data-options="title:'Modification',inline:true,closed:true" style="width:250px;height:150px;padding:10px">
        formulaire d edition de rapport
    </div>
