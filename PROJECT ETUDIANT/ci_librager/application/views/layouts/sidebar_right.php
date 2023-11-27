<div class="w3-container">
    <div class="w3-container w3-text-theme w3-pale-green w3-padding-8 w3-card-2">Categories</div>

    <?php if (isset($categories)  && !empty($categories)): ?>
        <div class="w3-ul">
            <?php foreach ($categories as $key => $cat) : ?>
                <?php if (!empty($cat['nom'])): ?>
                    <a href="<?= site_url('books/categorie') . '/' . $cat['id'] ?>" class="list-group-item w3-theme-d2">
                        <span class="w3-pale-green badge"><?= $cat['quantite'] ?></span>
                        <?= $cat['nom'] ?>
                    </a>
                <?php endif; ?> 
            <?php endforeach; ?> 
        </div>
    <?php else : ?>
        <div class="text-muted text-center"style="font-size: 14px;"><b>Aucun element</b></div>'
    <?php endif; ?>
    <p></p>                
    <div class="w3-container w3-text-theme w3-pale-green w3-padding-8 w3-card-2">Les derniers ajoutés</div>
    <div class="w3-ul">
        <div id="last-books">
            <?php if (isset($lastBooks) && !empty($lastBooks)): ?>
                <?php foreach ($lastBooks as $key => $book): ?>
                    <a href="<?= site_url('books/read') . '/' . $book['slug'] ?>" class="list-group-item w3-theme-l1 w3-hover-green"><?= $book['titre'] ?></a>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="text-muted text-center"style="font-size: 14px;"><b>Aucun element</b></div>'
            <?php endif; ?>
        </div>
    </div>   
</div>
