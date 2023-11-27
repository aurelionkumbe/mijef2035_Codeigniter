<table id="admin-books-table" class="table table-striped table-hover w3-table">
    <caption class="text-muted">Livres disponibles</caption>

    <thead class="w3-text-amber">
        <tr>
            <th class="disable-sorting">n*</th>
            <th>Titre</th>
            <th>Tome</th>
            <th>Nb Page</th>
            <th>date de parution</th>
            <th>langue</th>
            <th>nbLecture</th>
            <th>ISBN</th>
            <th class="disable-sorting">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($books) && !empty($books)) {
            $i = 0;
            foreach ($books as $key => $book) {
                ?>
                <tr data-href="<?= $book['id'] ?>">
                    <td><?= ++$i ?></td>
                    <td><?= $book['titre'] ?></td>
                    <td><?= $book['tome'] ?></td>
                    <td><?= $book['nbPage'] ?></td>
                    <td><?= $book['dateParution'] ?></td>
                    <td><?= $book['langue'] ?></td>
                    <td><?= $book['nbLecture'] ?></td>
                    <td><?= $book['isbn'] ?></td>
                    <td>
                        <a href="<?= site_url('admin/book/update/' . $book['id']) ?>" class="btn btn-primary"><span class="mif-pencil"></span></a>
                        <a href="<?= site_url('admin/del/book/' . $book['id']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure ?')"><span class="mif-cancel"></span></a>
                    </td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr class="text-center w3-text-red"><td colspan="100">Aucun livre enregisté</td></tr>
        <?php } ?>

    </tbody>
    <tfoot class="w3-text-khaki">
        <tr>
            <th class="disable-sorting">n*</th>
            <th>Titre</th>
            <th>Tome</th>
            <th>Nb Page</th>
            <th>date de parution</th>
            <th>langue</th>
            <th>nbLecture</th>
            <th>ISBN</th>
            <th class="disable-sorting">Actions</th>
        </tr>
    </tfoot>
</table>
