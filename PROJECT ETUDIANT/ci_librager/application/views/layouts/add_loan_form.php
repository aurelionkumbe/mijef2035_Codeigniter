
<form id="addLoanForm" method="post" action="<?=base_url('index.php/admin/loan/add')?>">   
    <legend style="border: 0px solid black; box-shadow: 0 6px 5px -3px black "><h4 class="text-center text-primary">ajouter un emprunt</h4><legend/>
    <div class="col-md-8 col-md-offset-2">
        <p style="margin-bottom:0">&nbsp</p>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <div class="input-group col-md-12">
                        <input id="dateEmprunt" name="dateEmprunt" type="text" class="form-control datetimepicker" value="" placeholder="data emprunt"/>
                        <label for="dateRetour" class="input-group-addon"></label>
                        <input id="dateRetour" name="dateRetour" type="text" class="form-control datetimepicker" value="" placeholder="data retour"/>
                    </div>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="form-group row">
                    <div class="input-group col-md-12">
                        <?php if (isset($books) && !empty($books)): ?>
                        <select class="form-control" id="livre" name="livreId" size="6">
                            <optgroup label="titre du livre">
                            <?php foreach ($books as $livre): ?>
                                <option value="<?=$livre['id']?>"><?=$livre['titre']?></option>
                            <?php endforeach; ?>
                            </optgroup>
                        </select>
                        <?php else:?>
                        <input type="text" class="form-control" disabled placeholder="Aucun livre enregisté"/>
                        <?php endif; ?>
                    </div>
                    <div class="input-group col-md-12">
                        <?php if (isset($personnes) && !empty($personnes)): ?>
                        <select class="form-control" id="personne" name="personneId" size="6">
                            <optgroup label="nom de l'emprunteur">
                                <?php foreach ($personnes as $personne): ?>
                                    <option value="<?=$personne['id']?>"><?=$personne['nom']?></option>
                                <?php endforeach; ?>
                            </optgroup>
                        </select>
                        <?php else:?>
                        <input type="text" class="form-control" disabled placeholder="Aucune personne enregistée dans la base de donnée, "/>
                        <?php endif; ?>
                    </div>
                </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-4 col-md-offset-4">
                        <button class="btn btn-primary btn-block" name="addLoan" type="submit">Enregister</button>
                    </div>
                </div>   
            </div>
        </div>
    </div>   
</form>