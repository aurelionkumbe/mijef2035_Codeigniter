<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php //var_dump($book); die; ?>
<?php if (isset($book)): ?>
    
<?= form_open_multipart('admin/book/update/'.$book['id'], 'id="updateBookForm" class="form form-horizontal"')?>
    <div class="col-md-12">
        <div class="col-md-3">
            <div class="form-group row">
                <h4 class="w3-card-2 w3-theme-d4 w3-padding">Informations principales du livre</h4>
                    <div class="input-group col-md-12">
                        <input id="titre" name="titre" type="text" class="form-control" onclick="this.value='<?=$book['titre']?>'" placeholder="Titre"/>
                    </div>
                     <div class="input-group col-md-12">
                        <input id="isbn" name="isbn" type="text" class="form-control" onclick="this.value='<?=$book['isbn']?>'" placeholder="ISBN"/>
                    </div>
                    <div class="input-group col-md-12">
                            <input id="nbpage" name="nbPage" type="number" class="form-control" placeholder="nombre de pages" <?=$book['nbPage']?>/>
                    </div>
                    <div class="input-group col-md-12">
                        <input id="dateParution" name="dateParution" type="text" class="form-control" onclick="this.value='<?=$book['dateParution']?>'" placeholder="data parution"/>
                    </div>
                    <div class="input-group col-md-12">
                            <select id="tome" name="tome" type="text" class="form-control" placeholder="tome">
                                <option value="0">-- choisir le tome --</option>
                                <optgroup label="n* de tome">
                                    <?php foreach ($tomes as $t):?>
                                        <option  <?php ($t['code'] === $book['tome']) ? 'selected':'' ?> value="<?=$t['code'] ?>"><?= $t['nom']?></option>
                                    <?php endforeach; ?>
                                </optgroup>
                                
                            </select>
                    </div>
                    <div class="input-group col-md-12">
                            <select   id="langue" name="langue" type="text" class="form-control" placeholder="langue">
                                <option >-- langue de redation --</option>
                                <optgroup label="rediger en">
                                    <?php foreach ($locales as $locale):?>
                                    <option  <?php ($locale['code'] === $book['langue']) ? 'selected':'' ?> value="<?=$locale['code'] ?>"><?= $locale['nom']?></option>
                                    <?php endforeach; ?>
                                </optgroup>
                            </select>

                    </div>
                </div>
                <div class="form-group row">
                    <h4 class="w3-card-2 w3-theme-d4 w3-padding">Informations complementaires du livre</h4>
                    <div class="input-group col-md-12">
                        <?php if (isset($auteurs)): ?>
                        <select class="form-control" id="auteur" name="auteurId">
                            <option >-- nom de l'auteur --</option>
                            <optgroup label="nom de l'auteur">
                            <?php foreach ($auteurs as $auteur): ?>
                                <option 
								<?php if($auteur['id'] == $book['auteurId'] ){echo 'style="background-color: green" selected';}?>
                                value="<?=$auteur['id']?>"><?=$auteur['nom']?></option>
                            <?php endforeach; ?>
                            </optgroup>
                        </select>
                        <?php else:?>
                        <input type="text" class="form-control" disabled placeholder="Aucun auteur enregisté"/>
                        <?php endif; ?>
                    </div>
                    <div class="input-group col-md-12">
                        <?php if (isset($editions)): ?>
                        <select class="form-control" id="edition" name="editionId">
                            <option >-- selectioner une edition --</option>
                            <optgroup label="nom de l'edition">
                                <?php foreach ($editions as $edition): ?>
                                    <option 
									<?php if($edition['id'] == $book['editionId'] ){echo 'style="background-color: green" selected';}?>
                                    value="<?=$edition['id']?>"><?=$edition['nom']?></option>
                                <?php endforeach; ?>
                            </optgroup>
                        </select>
                        <?php else:?>
                        <input type="text" class="form-control" disabled placeholder="Aucune edition enregistée"/>
                        <?php endif; ?>
                    </div>
                    <div class="input-group col-md-12">
                        <?php if (isset($categories)): ?>
                        <select class="form-control" id="categorie" name="categorieId">
                            <optgroup label="nom de la categorie">
                                <option >-- selectioner une categorie --</option>
                                <?php foreach ($categories as $categorie): ?>
                                    <option 
										<?php if($categorie['id'] == $book['categorieId'] ){echo 'style="background-color: green" selected';}?>
                                    value="<?=$categorie['id']?>"><?=$categorie['nom']?></option>
                                <?php endforeach; ?>
                            </optgroup>
                        </select>
                        <?php else:?>
                        <input type="text" class="form-control" disabled placeholder="Aucune categorie enregistée"/>
                        <?php endif; ?>
                    </div>
                    <div class="input-group col-md-12">
                        <?php if (isset($catalogues)): ?>
                        <select class="form-control" id="catalogue" name="catalogueId">
                            <option >-- selectioner un catalogue --</option>
                            <optgroup label="nom du catalogue">
                                <?php foreach ($catalogues as $catalogue): ?>
                                  
                                    <option <?php if($catalogue['id'] == $book['catalogueId'] ){echo 'style="background-color: green" selected';}?> value="<?=$catalogue['id']?>"><?=$catalogue['nom']?></option>
                                <?php endforeach; ?>
                            </optgroup>
                        </select>
                        <?php else:?>
                        <input type="text" class="form-control" disabled placeholder="Aucun catalogue enregisté"/>
                        <?php endif; ?>
                    </div>
                    <div class="input-group col-md-12">
                        <input class="from-control" type="number" min="0" placeholder="N° Rayon" value="<?=$book['rayon'] ?>"/>
                    </div>
                </div>


        </div>
        <div class="col-md-6 col-md-offset-1">
            
            <div class="row text-edit">
                <div class="form-group">
                <p class="label label-default">presentation ou resumer du livre</p>
                    <div class="input-group col-md-12">
                        <textarea id="resumer" name="resumer" type="text" class=" jqte-test form-control" placeholder="resumer">
                            <?=$book['resumer']?>
                        </textarea>
                    </div>
                </div>
            </div>
        </div>
        <?php if(0): ?>
        <div class="col-md-2">
                <p class="text-center">cliquez sur l'image pour modifier la couverture du livre</p>
            <div class="form-group">
                <div class="input-group col-md-12">
                    <div class="upload">
                        <label for="img-couverture"><img class="img-responsive" src="<?=asset_url('img/'.$book['imgCouverture'])?>" alt="couverture image"></label>
                        <input id="img-couverture" accept="image/jpeg,image/gif,image/png" name="imgCouverture" type="file" class="form-control" placeholder="image de couverture"/>
                    </div>
                </div>
                <hr>
                <p class="text-center">cliquez sur l'image pour importer le fichier PDF</p>
                <div class="input-group col-md-12">
                    <div class="upload">
                        <label for="fichier-pdf"><img class="img-responsive" src="<?=asset_url('img/pdf.png')?>" alt="pdf document"></label>
                        <input id="fichier-pdf" name="fichierpdf" type="file" accept=".pdf, .txt" class="form-control" placeholder="fichier PDF"/>
                    </div>
                </div>
             </div>
            </div>
            <?php endif ?>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-4 col-md-offset-4">
                        <button class="btn btn-primary btn-block btn-lg" name="updateBook" type="submit">Enregister</button>
                    </div>
                </div>   
            </div>
        </div>
    </div>
    <div class=""></div>   
    
<?=form_close()?>

<?php else: ?>
<h1 class="row text-center"> <b class="text-capitalize">ce livre n'est pas enregistré</b></h1>
<?php endif ?>
