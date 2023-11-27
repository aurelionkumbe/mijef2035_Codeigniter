
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="media w3-padding">
                    <div class="pull-left">
                        <img class="img-responsive img-appart " src="<?=base_url('images/appart.png' )?>" alt="appart">
                    </div>
                    <div class="media-body">
                        <div class="row">
                          <div class="col-md-12">
                              <div class="row well well-sm">
                                  <div class="col-md-8">
                                      <h3 class="media-heading"><span class="fa fa-location-arrow"></span> <?=$data['Quartier']?> - <?=$data['Type']?> </h3>
                                      <p>&nbsp;</p>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="">
                                          <span class="prix badge"><?= $data['Prix_location']?> FCFA</span>
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12 clearfix">
                                      <p><?=$data['Description']?></p>
                                  </div>
                                  <div class="col-md-12 btn-group" >
                                      <?php if($page == 'locations'): ?>
                                          <a  onclick="alert('cette option n\'est pas encore disponible')"  title="pas encore disponible"  data-toggle="tooltip"   href="<?= base_url("location/louer?choix=$choix&id=$id")?>" class="btn disabled btn-primary btn-block"> <i class="fa fa-hand-o-up"></i> Louer</a>
                                      <?php elseif($page == 'achat'): ?>
                                          <a  onclick="alert('cette option n\'est pas encore disponible')"  title="pas encore disponible"  data-toggle="tooltip"   href="<?= base_url("location/louer?choix=$choix&id=$id")?>" class="btn disabled btn-primary btn-block"> <i class="fa fa-hand-o-up"></i> Acheter</a>
                                      <?php endif ?>
                                  </div>
                              </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>   
            <hr>
        </div><!--/.col-md-12-->
    </div>
    <section id="portfolio" class="container">
        <ul class="portfolio-filter hide">
            <li><a class="btn btn-default active" href="#" data-filter="*">All</a></li>
            <li><a class="btn btn-default" href="#" data-filter=".bootstrap">Bootstrap</a></li>
            <li><a class="btn btn-default" href="#" data-filter=".html">HTML</a></li>
            <li><a class="btn btn-default" href="#" data-filter=".wordpress">Wordpress</a></li>
        </ul><!--/#portfolio-filter-->

        <ul class="portfolio-items col-3">
            <?php
            for ($i = 0; $i < 10 ; $i++):

                $photo = $data["Photo$i"];

                if ($photo != ""):
                    $upload_data = json_decode($photo);
                    //$this->dump($upload_data);
                    $file_name = $upload_data->file_name;
                    $ext = $upload_data->file_ext;
                    $thumb = $upload_data->raw_name . '_thumb' . $ext;

            ?>
            <li class="portfolio-item apps">
                <div class="item-inner">
                    <?php     echo "<img src='".base_url("images/portfolio/$thumb")."' alt=''> <br>"; ?>
                    <h5><?="Photo$i"?></h5>
                    <div class="overlay">
                        <a class="preview btn btn-danger" href="<?=base_url('images/portfolio/'.$file_name)?>" rel="prettyPhoto"><i class="icon-eye-open"></i></a>
                    </div>           
                </div>           
            </li><!--/.portfolio-item-->
            <?php
            endif;
            endfor;
            ?>
        </ul>
    </section><!--/#portfolio-->
                
                