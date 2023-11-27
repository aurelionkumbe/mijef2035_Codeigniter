<table id="admin-persons-table" class="table table-striped table-hover">
    <caption>Personnes enregistées</caption>

    <thead  class="w3-text-amber">
        <tr>
            <th class="disable-sorting">n*</th>
            <th><span class="sr-only">sexe</span></th>
            <th>nom et prenom</th>
            <th>email</th>
            <th>telephone</th>
            <th>etablissement</th>
            <th>adresse</th>
            <th>niveau</th>
            <th class="disable-sorting">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($personnes) && !empty($personnes)) {
            $i = 0;
            foreach ($personnes as $key => $p) {
                ?>
                <tr data-href="<?= $p['id'] ?>">
                    <td><?= ++$i ?></td>
                    <td><?= $p['sexe'] ?></td>
                    <td><?= $p['nom'] . ' ' . $p['prenom'] ?></td>
                    <td><?= $p['email'] ?></td>
                    <td><?= $p['telephone'] ?></td>
                    <td><?= $p['etablissement'] ?></td>
                    <td><?= $p['adresse'] ?></td>
                    <td><?= $p['level'] ?></td>
                    <td>
                        <a href="<?= site_url('admin/person/update/' . $p['id']) ?>" class="btn btn-primary"><span class="mif-pencil"></span></a>
                        <a href="<?= site_url('admin/del/person/' . $p['id']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure ?')"><span class="mif-cancel"></span></a>
                    </td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr class="text-center w3-text-red"><td colspan="100">Aucune personne enregistée</td></tr>
        <?php } ?>
    </tbody>
    <tfoot class="w3-text-khaki">
        <tr>
            <th class="disable-sorting">n*</th>
            <th><span class="sr-only">sexe</span></th>
            <th>nom et prenom</th>
            <th>email</th>
            <th>telephone</th>
            <th>etablissement</th>
            <th>adresse</th>
            <th>niveau</th>
            <th class="disable-sorting">Actions</th>
        </tr>
    </tfoot>
</table>


