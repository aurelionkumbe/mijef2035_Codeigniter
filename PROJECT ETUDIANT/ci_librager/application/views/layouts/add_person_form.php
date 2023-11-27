

<style>
</style>
<form id="addPersonForm" method="post" action="<?= base_url('index.php/admin/person/add') ?>" >
<legend style="border: 0px solid black; box-shadow: 0 6px 5px -3px black "><h4 class="text-center text-primary">ajouter une personne</h4><legend/>
    <div class="col-md-8 col-md-offset-2">
        <p style="margin-bottom:0">&nbsp</p>
        <div class="row">
            <div class="col-md-6">
                <div class="input-group col-md-12">
                    <input id="nom-personne" name="nom" type="text" class="form-control" placeholder="nom"/>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group col-md-12">
                    <input id="prenom-personne" name="prenom" type="text" class="form-control" placeholder="prenom"/>
                </div>
            </div>
            <div class="col-md-12">
                <div class="input-group col-md-12">
                    <input id="email-personne" name="email" type="text" class="form-control" placeholder="email"/>
                </div>
            </div>
        </div>
        <p>&nbsp;</p>
        <div class="row">
            <div class="col-md-6">

                <div class="input-group col-md-12">
                    <div id="sexe-personne" class="form-control">
                        <label for="sexe-personne">
                            <input id="sexe-personne-masc" name="sexe" value="M" type="radio" checked placeholder="sexe"/>homme
                        </label>
                        <label for="sexe-personne-fem">
                            <input id="sexe-personne-fem" name="sexe" value="F" type="radio" placeholder="sexe"/>femme
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group col-md-12">
                    <input id="date-naissance-personne" name="dateNaissance" type="text" class="form-control" placeholder="date de naissance" onclick="this.value=''" data-toggle="date-picker"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="input-group col-md-12">
                    <input id="mdp-personne" name="motdepasse" type="text" class="form-control" placeholder="mot de passe"/>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group col-md-12">
                    <input id="mdp-conf-personne" name="motdepasseConfirmation" type="text" class="form-control" placeholder="confirmation mot de passe"/>
                </div>
            </div>
        </div>
        <p>&nbsp;</p>
        <div class="row">
            <div class="col-md-4">
                <div class="input-group col-md-12">
                    <input id="etablissement-personne" name="etablissement" type="text" class="form-control" placeholder="etablissement"/>
                </div>
            </div>

            <div class="col-md-4">
                <div class="input-group col-md-12">
                    <input id="adress-personne" name="adresse" type="text" class="form-control" placeholder="adresse residenciel"/>
                </div>
            </div>

            <div class="col-md-4">
                <div class="input-group col-md-12">
                    <input id="telephone-personne" name="telephone" type="tel" class="form-control" placeholder="telephone"/>
                </div>
            </div>
            <p>&nbsp;</p>
            <div class="row">
                <div class="input-group col-md-12">
                    <span>Enregister cette personne comme : </span>
                    <select   id="level" name="level" type="text" class="form-control" placeholder="level">
                        <option selected="" value="undefined">-- choisir le niveau d'accès --</option>
                        <optgroup label="niveau d'Accès">
                            <option value="client">client</option>
                            <option value="libraire">libraire</option>
                        </optgroup>
                    </select>

                </div>
            </div>
        </div>


        <div class="row">
        <p>&nbsp;</p>
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-4 col-md-offset-4">
                        <button class="btn btn-primary btn-block" name="addBook" type="submit">Enregister</button>
                    </div>
                </div>   
            </div>
        </div>
    </div>   
</form>