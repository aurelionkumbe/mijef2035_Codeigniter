<div class="page-header w3-pale-green w3-bottombar w3-padding-16 w3-border-green">
    <h5 class="text-center">Bibliotheque numerique en ligne</h5>
</div>
<div class="row">
    <div class="col-md-9">
        <section class="row"> 
            <div class="w3-container w3-pale-green w3-padding-8">     
                <span class="w3-left">Les plus lus dabord</span>
            <form class="form-inline w3-right" action="" hidden  method="get" accept-charset="utf-8">
                <small>voir</small>
                <select id="nombre-livre" class="form-control">
                    <option value="8">8</option>
                    <option value="16">16</option>
                    <option value="24">24</option>
                    <option value="32">32</option>
                    <option value="64">64</option>
                    <option value="100">100</option>
                </select>
            </form> 
            </div> 
            <div id="Books" class="col-md-12">
                <?php if (isset($books) && !empty($books)): ?>
                    <?php foreach ($books as $key => $book): ?>
                        <article class="w3-card-4 w3-animate-zoom w3-green col-md-3 book-tile tile">
                            <h2 class="titre"><a href="<?= site_url('read/' . $book['slug'] . '') ?>"><?= $book['titre'] ?></a></h2>
                            <p class="detail"><small>
                                    Categorie : <?= $book['nomCat'] ?>,<br>
                                    de <?= $book['nomEdition'] ?>,<br>
                                    par <?= $book['nomAuteur'] ?>,<br>
                                    le <em><?= $book['dateParution'] ?></em>
                                </small><br><br>
                                <span class="btn-group">
                                    <a class="btn btn-default" href="<?= site_url('books/read/') . '/' . $book['slug'] ?>" style="font-size:15px">&nbsp;&nbsp;lire&nbsp;&nbsp;</a>
                                    <a <?= $_SESSION['user']['loggedin'] ? '' : 'hidden' ?> class="btn btn-success" href="<?= site_url('books/download/') . '/' . $book['slug'] ?>"><b class="mif-file-download w3-padding-4 " title="Telecharger"></b></a>        
                                </span>
                            </p>
                            <p></p>                               
                            <p class="text-right hidden"><a href="post.html" class="btn btn-primary">Read more...</a></p>
                        </article>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p class="alert alert-info text-center"style="font-size: 18px;"><b>Il n'y a pas de livre</b></p>'
                <?php endif; ?>
            </div>
        </section>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <div class="row"><?= $paginationLinks ?></div>
    </div>
    <div class="col-md-3 sidebar">
        <?php include_once VIEWPATH . '/layouts/sidebar_right.php' ?>
    </div><!-- /.sidebar -->
</div>