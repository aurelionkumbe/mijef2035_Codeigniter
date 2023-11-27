
<?= form_open_multipart('admin/book/add', 'class="form" id="addBookForm"') ?>
<legend style="border: 0px solid black; box-shadow: 0 6px 5px -3px black "><h4 class="text-center text-primary">ajouter un livre</h4><legend/>
    <div class="col-md-8 col-md-offset-2">
        <p style="margin-bottom:0">&nbsp</p>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <div class="input-group col-md-12">
                        <input id="titre" name="titre" type="text" class="form-control" placeholder="titre"/>
                    </div>
                    <div class="input-group col-md-12">
                        <input id="isbn" name="isbn" type="text" class="form-control" placeholder="ISBN"/>
                    </div>
                    <div class="input-group col-md-12">
                        <input id="nbpage" name="nbPage" type="number" class="form-control" placeholder="nombre de pages"/>
                    </div>
                    <div class="input-group col-md-12">
                        <select id="tome" name="tome" type="text" class="form-control" placeholder="tome">
                            <optgroup label="n* de tome">
                                <option value="1">TOME I</option>
                                <option value="2">TOME II</option>
                                <option value="3">TOME III</option>
                            </optgroup>

                        </select>
                    </div>
                    <div class="input-group col-md-12">
                        <select   id="langue" name="langue" type="text" class="form-control" placeholder="langue">
                            <optgroup label="rediger en">
                                <option value="ENG"> ANGLAIS</option>
                                <option value="FR">FRANCAIS</option>
                                <option value="DE">ALLEMAND</option>
                                <option value="CH">CHINOIS</option>
                            </optgroup>
                        </select>

                    </div>
                    <div class="input-group col-md-12">
                        <input id="dateParution" name="dateParution" type="text" class="form-control" value="" placeholder="data parution"/>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-md-offset-1">
                <div class="form-group row">
                    <div class="input-group col-md-12">
                        <?php if (isset($auteurs)): ?>
                            <select class="form-control" id="auteur" name="auteurId">
                                <optgroup label="nom de l'auteur">
                                    <?php foreach ($auteurs as $auteur): ?>
                                        <option value="<?= $auteur['id'] ?>"><?= $auteur['nom'] ?></option>
                                    <?php endforeach; ?>
                                </optgroup>
                            </select>
                        <?php else: ?>
                            <input type="text" class="form-control" disabled placeholder="Aucun auteur enregisté"/>
                        <?php endif; ?>
                    </div>
                    <div class="input-group col-md-12">
                        <?php if (isset($editions)): ?>
                            <select class="form-control" id="edition" name="editionId">
                                <optgroup label="nom de l'edition">
                                    <?php foreach ($editions as $edition): ?>
                                        <option value="<?= $edition['id'] ?>"><?= $edition['nom'] ?></option>
                                    <?php endforeach; ?>
                                </optgroup>
                            </select>
                        <?php else: ?>
                            <input type="text" class="form-control" disabled placeholder="Aucune edition enregistée"/>
                        <?php endif; ?>
                    </div>
                    <div class="input-group col-md-12">
                        <?php if (isset($categories)): ?>
                            <select class="form-control" id="categorie" name="categorieId">
                                <optgroup label="nom de la categorie">
                                    <?php foreach ($categories as $categorie): ?>
                                        <option value="<?= $categorie['id'] ?>"><?= $categorie['nom'] ?></option>
                                    <?php endforeach; ?>
                                </optgroup>
                            </select>
                        <?php else: ?>
                            <input type="text" class="form-control" disabled placeholder="Aucune categorie enregistée"/>
                        <?php endif; ?>
                    </div>
                    <div class="input-group col-md-12">
                        <?php if (isset($catalogues)): ?>
                            <select class="form-control" id="catalogue" name="catalogueId">
                                <optgroup label="nom du catalogue">
                                    <?php foreach ($catalogues as $catalogue): ?>
                                        <option value="<?= $catalogue['id'] ?>"><?= $catalogue['nom'] ?></option>
                                    <?php endforeach; ?>
                                </optgroup>
                            </select>
                        <?php else: ?>
                            <input type="text" class="form-control" disabled placeholder="Aucun catalogue enregisté"/>
                        <?php endif; ?>
                    </div>
                    <div class="input-group col-md-12">
                        <input id="rayon" name="rayon" type="number" min="1" class="form-control" placeholder="N° Rayon"/>
                    </div>
                </div>
            </div>
        </div>
        <!--
        <div class="row">
            <div class="col-md-0 text-edit">
                <div class="form-group">
                <p class="label label-default">presentation ou resumer du livre</p>
                    <div class="input-group col-md-12">
                        <textarea id="resumer" name="resumer" rows="6" cols="12" type="text" class=" jqte-test form-control" placeholder="resumer">
                        </textarea>
                    </div>
                </div>
            </div>
        </div>
        -->
        <div class="row">
            <div class="col-md-12">
                <!--
            <div class="form-group">
                <div class="input-group col-md-12">
                    <div class="upload">
                        <input id="img_couverture" name="imgCouverture" type="file" class="form-control" placeholder="image de couverture"/>
                    </div>
                </div>

                <div class="input-group col-md-12">
                    <div class="upload">
                        <input id="fichier-pdf" name="fichierpdf" type="file" class="form-control" placeholder="fichier PDF"/>
                    </div>
                </div>
             </div>
                -->
            </div>
        </div>
        <p>&nbsp;</p>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-4 col-md-offset-4">
                        <button class="btn btn-primary btn-block btn-lg" name="addBook" type="submit">Enregister</button>
                    </div>
                </div>   
            </div>
        </div>
        <p>&nbsp;</p>
        <h5 class="text-info text-center" style="font-size:9px"><b>vous pouvez editer le contenu du livre avec le bouton de modification</b></h5>
    </div>   
    <?= form_close() ?> 
