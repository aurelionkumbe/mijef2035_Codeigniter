<?php
    require_once("aut/bdconnect.php");
    require_once("aut/session.php");
?>
    <?php
            
            //var_dump($_POST); die();
            
                $pge = $_POST['idart'];
            
            if(!empty($pge))
                {
                    $reponse = $bdd ->prepare('SELECT * FROM kh_admin WHERE id_admin = ?');
                    $reponse ->execute(array($pge));
                    while ($donnees = $reponse ->fetch())
                       {
                            $id = $donnees['id_admin'];
                            $nom = $donnees['nom_admin'];
                            $login = $donnees['login_admin'];
                            $pass = $donnees['pass_admin'];
                            $da = $donnees['acces_admin'];
                            $stat = $donnees['valid_admin'];
                            
                                if($stat != 0){ $statut = 'Valide';}
                                else{ $statut = 'Invalide';}
                            
                                if($da == 0){ $dac = 'Aucun'; }
                                elseif($da == 1){ $dac = 'Tout'; }
                                elseif($da == 2){ $dac = 'Publication'; }
                                elseif($da == 3){ $dac = 'Edition'; }
                    
                                echo '<div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3>Modification de : '.$nom.'</h3>
                                            </div>
                                            <div class="col-md-12 pull-right">
                                                    Statut : <b>'.$statut.'</b>
                                            </div>
                                        </div>

                                            <div class="col-md-12" id="resultat"></div>

                                        <div class="row">
                                            <form class="form-validate form-horizontal " id="modif_form" method="post" action="modification.php">';
                                                                                                                                                                            
                                                    echo '<div class="form-group col-md-6">
                                                        <label for="nm" class="control-label">Nom : </label>
                                                        <div class="">
                                                            <p>'.$nom.'</p>
                                                            <input class="form-control " id="nm" name="nom" type="text" /> 
                                                        </div>
                                                    </div>';

                                                    echo '<div class="form-group col-md-7">
                                                        <label for="login" class="control-label col-md-offset-2">login : </label>
                                                        <div class="col-md-offset-2">
                                                            <p>'.$login.'</p>
                                                            <input class="form-control " id="login" name="login" type="text" /> 
                                                        </div>
                                                    </div>';

                                                    echo '<div class="col-md-9">
                                                        </div>';                                                        

                                                    echo '<div class="form-group col-md-6">
                                                        <label for="pass" class="control-label">Mot de passe : </label>
                                                        <div class="">
                                                            <p>'.$pass.'</p>
                                                            <input class="form-control " id="pass" name="pass" type="text" /> 
                                                        </div>
                                                    </div>';

                                                    echo '<div class="form-group col-md-7">
                                                        <label for="dac" class="control-label col-md-offset-2">Droit d\'accès : </label>
                                                        <div class="col-md-offset-2">
                                                            <p>'.$dac.'</p>
                                                            <select id="dac" class="form-control" name="dac" >
                                                                <option value="">Ne pas changer</option>
                                                                <option value="3">Edition</option>
                                                                <option value="2">Publication</option>
                                                                <option value="1">Tout</option>
                                                            </select>
                                                        </div>
                                                    </div>';                                                                                                        
                                                    
                                                    echo '<div class="row col-md-9">
                                                        <input type="hidden" name="modif" value="admin"/>
                                                        <input type="hidden" name="id_obj" value="'.$id.'"/>
                                                        <button class="btn btn-success" type="submit"> Modifier</button>
                                                        </div>';                                                    

                                                    echo '</form>
                                                    </div>
                                                    </div>
                                                </div>                                                
                                            </div>
                                    </div>';
                    
                    }
                    $reponse->closeCursor();
                }
        
       ?>
        <!-- javascripts -->
    <script src="js/jquery.js"></script>
    
    
    <script>
        $("#modif_form").submit(function(e)
            { 
                var formObj = $(this);
                var formURL = formObj.attr("action");
                var formData = new FormData(this);
                $.ajax({
                    url: formURL,
                    type: 'POST',
                    data:  formData,
                    mimeType:"multipart/form-data",
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data){
                        if(data!='')
                            {
                                
                                $("#resultat").html('<div class="alert alert-success" style="display: block"><a class="close" data-dismiss="alert">×</a>'+data+'</div>');
                                $("#modif_form").get(0).reset();
                            }
                    }
            });             
           e.preventDefault();
            });$("#modif_form").submit(); //EOF
    </script>