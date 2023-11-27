
<form id="addLoanForm" method="post" action="">   
    <legend style="border: 0px solid black; box-shadow: 0 6px 5px -3px black "><h4 class="text-center text-primary">Modifier un emprunt</h4><legend/>
    <div class="col-md-8 col-md-offset-2">
        <p style="margin-bottom:0">&nbsp</p>
        
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <div class="input-group col-md-12">
                        <!--
                        <input id="dateEmprunt" onclick="this.value='<?=$loan['dateEmprunt']?>'" name="dateEmprunt" type="text" class="form-control datetimepicker" value="" placeholder="data emprunt"/>
                        <label for="dateRetour" class="input-group-addon"></label>
                        -->
                        <input id="dateRetour" name="dateRetour" onclick="this.value='<?=$loan['dateRetour']?>'" type="text" class="form-control datetimepicker input-lg" value="" placeholder="data retour"/>
                    </div>
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
                        <button class="btn btn-primary btn-block btn-lg" name="updateLoan" type="submit">Prolonger</button>
                    </div>
                </div>   
            </div>
        </div>
        <p>&nbsp;</p><p>&nbsp;</p>
        <div class="row">
            <div class="col-md-12">
                Location effetuée par <span class="text-primary"><?=$loan['nom']?></span>,<br>
                Email: <span class="text-primary"><?=$loan['email']?></span>, Tel: <span class="text-primary"><?=$loan['telephone']?></span><br>
                A emporter le livre dont le titre est <span class="text-primary"><?=$loan['titre']?></span> le
                <span class="text-primary"><?=$loan['dateEmprunt']?></span><br>
                <b>detail du livre</b><br>
                langue :  <span class="text-primary"><?=$loan['langue']?></span><br>
                ISBN :  <span class="text-primary"><?=$loan['isbn']?></span><br>
                
            </div>
        </div>
    </div>   
</form>