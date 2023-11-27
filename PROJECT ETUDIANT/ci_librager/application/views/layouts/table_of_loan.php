<table id="admin-loans-table" class="table table-striped table-hover">
    <caption>Emprunts enregistés</caption>
    <thead>
        <tr  class="w3-text-amber">
            <th class="disable-sorting">n*</th>
            <th>livre</th>
            <th>isbn</th>
            <th>emprunteur</th>
            <th>date d'emprunt</th>
            <th>date de retour</th>
            <th>etat du livre retourné</th>
            <th class="disable-sorting">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($locations) && !empty($locations)) {
            $i = 0;
            foreach ($locations as $key => $l) {
                ?>
                <tr data-href="<?= $l['id'] ?>">
                    <td><?= ++$i ?></td>
                    <td><?= $l['titre'] ?></td>
                    <td><?= $l['isbn'] ?></td>
                    <td><?= $l['nom'] . ' ' . $l['prenom'] ?></td>
                    <td><?= $l['dateEmprunt'] ?></td>
                    <td><?= $l['dateRetour'] ?></td>
                    <td><?= (empty($l['etatlivreRetourne'])) ? 'Aucun commentaire' : $l['etatlivreRetourne'] ?></td>
                    <td style="min-width: 85px;">
                        <a href="<?= site_url('admin/loan/update/' . $l['personneId'] . '/' . $l['livreId']) ?>" class="btn btn-primary"><span class="mif-pencil"></span></a>
                        <a href="<?= site_url('admin/loan/delete/' . $l['personneId'] . '/' . $l['livreId']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure ?')"><span class="mif-cancel"></span></a>
                    </td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr class="text-center w3-text-red"><td colspan="100">Aucun emprunt enregisté</td></tr>
        <?php } ?>

    </tbody>
    <tfoot class="w3-text-khaki">
        <tr>
            <th class="disable-sorting">n*</th>
            <th>livre</th>
            <th>isbn</th>
            <th>emprunteur</th>
            <th>date d'emprunt</th>
            <th>date de retour</th>
            <th>etat du livre retourné</th>
            <th class="disable-sorting">Actions</th>
        </tr>
    </tfoot>
</table>


