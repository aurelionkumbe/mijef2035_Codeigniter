<div class="col-lg-12">
                <h6 class="text-center text-muted"><small>numero : <?php echo $_SESSION['rapport']->num ?></small></h6>
                <form id="rapport-form"  name="send-contact" class="validateform form" method="post" action="" >
                    <div id="sendmessage">
                         le rapport a été enregistrer
                    </div>
                    <div class="row">
                        <div class="col-lg-4 field">
                            <input type="hidden" name="rapport[num]" value="<?=$_SESSION['rapport']->num?>">
                            <input type="hidden" name="rapport[date_rap]" value="<?=$_SESSION['rapport']->date_rap?>">

                            <input type="text" value="<?php echo $_SESSION['rapport']->objet ?>"  placeholder="* Objet" name="rapport[objet]" required>
                            <div class="validation">
                            </div>
                        </div>
                        <div class="col-lg-4 field">
                            <input type="text" data-msg="Please enter a valid time" data-rule="time" data-toggle="time" placeholder="* Heure de debut de service" name="rapport[hd_serv]" value="<?php echo $_SESSION['rapport']->hd_serv ?>" title="Heure de debut de service" required="">
                            <div class="validation">
                            </div>
                        </div>
                        <div class="col-lg-4 field">
                            <input type="text" data-msg="Please enter a valid time" data-rule="time" placeholder=" Heure de fin de service" name="rapport[hf_serv]" title="Heure de fin de service" value="<?php echo date('H:i:s') ?>">
                            <div class="validation">
                            </div>
                        </div>
                        <div class="col-lg-12 margintop40 field">
                            <textarea  id="textarea" data-msg="Please write something" data-rule="maxlen:500" placeholder=" Memo de ce jour..." maxlength="500" class="input-block-level" name="rapport[memo]" rows="12">
                                <?php echo $_SESSION['rapport']->memo ?>
                            </textarea>
                            <div class="validation">
                            </div>
                            <p>
                                <input type="hidden" name="postRapport" value="1">
                                <button type="submit" class="btn btn-theme margintop10 pull-left">Enregistrer</button>
                                <span class="pull-right margintop20">* veillez remplir les champs obligatoires, merci!</span>
                            </p>
                        </div>
                    </div>
                </form>
            </div>