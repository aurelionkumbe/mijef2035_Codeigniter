<div class="row">
    <ol class="breadcrumb">
        <li><a href="<?=site_url('books')?>">Acceuil</a></li>
        <li><a href="<?= isset($book)?$book['id'] :''; ?>">Resumé : <?= isset($book)?$book['slug'] :''; ?></a></li>
    </ol>
    <div class="col-md-9">
        <p>&nbsp;</p>
        <?php if (isset($book)): ?>
                <div class="page-header w3-container w3-text-theme w3-pale-green w3-bottombar w3-padding-16 w3-border-green">
                    <div class="col-md-10">
                        <h1><?=$book['titre']?></h1>
                        <p><small>
                            Catégorie : <a href="<?=  site_url('books/categorie').'/'.$book['categorieId']?>"><?=$book['nomCat']?></a>,
                            redigé par <a href="javascript:void(0)"><?=$book['nomAuteur']?></a> le <em><?=$book['dateParution']?></em>
                        </small></p>
                    </div>
                    <div class="col-md-2">
                        <img src="<?= asset_url(isset($book['imgCouverture'])?'img/'.$book['imgCouverture']:'img/'.'couverture.png')?>" alt="couverture" class="img-responsive">
                    </div>
                </div>
                <article id="<?=isset($book)?$book['id'] :''; ?>">
                    <?php if (trim($book['resumer']) !== ""): ?>
                    <h3 class="w3-container w3-text-theme w3-pale-green w3-padding-8">Resumer / Abstrat</h3>
                    <div class="w3-padding-jumbo" style=" border: 4px solid #EAD519;"><?php echo $book['resumer']; ?>  </div>
                    <?php else: ?>
                        <p class="alert alert-info">Aucun contenu.</p>
                    <?php endif ?>
                </article>

                <p>&nbsp;</p>
                <p>&nbsp;</p>
                
                <?php if (isset($book['commentaires'])): $i=1?>
                    <h3 class=" w3-container w3-padding-8  w3-bottombar w3-border-blue"><?=count($book['commentaires'])?> Commentaires</h3>
                    <?php foreach ($book['commentaires'] as $key => $c): ?>
                    <div class="row" style="margin-bottom: 24px;">
                        <div class="col-md-2">
                            <img class="img-responsive" src="<?=asset_url('img/avatar.png')?>" alt="user-avatar">
                        </div>
                        <div class="col-md-10" style="border-left: 4px solid #5597CF">
                            <p>Poster par: <strong><?=$c['nom']?></strong> le <?=$c['dateCreation']?> <!--10 hours ago--></p>
                            <p class="bg-white text-justify"><?=html_escape($c['texte'])?>  </p>
                        </div>
                    </div>
                        
                    <?php endforeach ?>
                <?php else:?>
                            <p class="alert alert-info">Aucun commentaire posté.</p>
                <?php endif; ?>

        <section class="comments">
            <h3 class="w3-container  w3-topbar w3-padding-8 w3-border-blue">Commenter ce livre</h3>
            <div hidden class="alert alert-danger"><strong>Oh non!</strong> erreurs survenues, desolé.</div>
            <?=  form_open('books/comment/'.$book['id'])?>
                <div class="row">
                <input type="hidden" name="livreId" id="livre-id" value="<?=$book['id']?>">
                <input type="hidden" name="livreSlug" id="livre-slug" value="<?=$book['slug']?>">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="email" id="user-email" name="email" class="form-control" placeholder="Votre email" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="pseudo" id="pseudo-user" placeholder="Votre pseudo">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="commentaire" rows="3" placeholder="Your comment"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Poster mon commentaire</button>
                </div>
            <?=  form_close()?>
        </section>

        <?php else:?>
            <p class="alert alert-info">Ce livre n'existe pas</p>
        <?php endif; ?>
        <hr>
    </div>
    <div class="col-md-3 sidebar">
        <p class="row">&nbsp;</p>
        <p class="row">&nbsp;</p>
        <?php include_once VIEWPATH.'/layouts/sidebar_right.php' ?>
    </div><!-- /.sidebar -->
</div>