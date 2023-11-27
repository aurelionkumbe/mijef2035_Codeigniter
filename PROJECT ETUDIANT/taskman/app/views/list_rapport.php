<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>TASKMAN - UserSpace</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://bootstraptaste.com" />
<!-- css -->
<link href="<?= base_url('css/bootstrap.min.css')?>" rel="stylesheet" />
<link href="<?= base_url('css/w3.css')?>" rel="stylesheet">
<link href="<?= base_url('css/w3-theme-blue.css')?>" rel="stylesheet">
<link href="<?= base_url('css/font-awesome.min.css')?>" rel="stylesheet">
<link href="<?= base_url('css/fancybox/jquery.fancybox.css')?>" rel="stylesheet">
<link href="<?= base_url('css/jcarousel.css')?>" rel="stylesheet">
<link href="<?= base_url('css/flexslider.css')?>" rel="stylesheet">
<link href="<?= base_url('css/lobibox/lobibox.css')?>" rel="stylesheet">
<link href="<?= base_url('js/select2/css/select2.min.css')?>" rel="stylesheet">
<link href="<?= base_url('js/select2/css/select2-bootstrap.min.css')?>" rel="stylesheet">
<link href="<?= base_url('js/bootstrap-datepicker/bootstrap-datetimepicker.css')?>" rel="stylesheet">


<link href="<?= base_url('css/style.css')?>" rel="stylesheet">
<link href="<?= base_url('css/main.css')?>" rel="stylesheet">

<!-- Theme skin -->
<link href="<?= base_url('skins/default.css')?>" rel="stylesheet">


<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body ng-app="TASKMAN">
<div id="wrapper">
	<!-- start header -->
	<header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><span>T</span>ASKMAN</a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav" style="margin-right: 35px;">
                        <li><a href="<?=site_url('user')?>">BUREAU</a></li>
                        <?php if ($user->is_admin): ?>
                        	<li><a style="border-bottom: 4px solid blue; color: blue;"  href="<?=site_url('user/rapports')?>">LISTE DES RAPPORTS</a></li>
                            <li><a href="<?=site_url('user/personnel')?>">LISTE DU PERSONNEL</a></li>
                       	<?php else: ?>
                        	<li><a href="<?=site_url('user/rapports')?>">MES RAPPORTS</a></li>
                        <?php endif ?>

                        <li class="dropdown active">
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false"><span class="w3-text-theme w3-large">MOI</span><b class=" icon-angle-down"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#" class="w3-center"><i class="fa  fa-user fa-4x"></i></a></li>
                                <li><a href="#" class="w3-center"><?php echo $user->nom_pers ?></a></li>
                                <li><a href="<?=site_url('user/profil')?>">Parametres</a></li>
                                <li class="divider"></li>

								<li><a class="btn btn-primary" href="<?=site_url('user/logout')?>"><i class="fa fa-signout"></i> Deconnection</a></li>
                            </ul>
                        </li>
                        <!--
                        <li><a href="portfolio.html">Portfolio</a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        -->
                    </ul>
                </div>
            </div>
        </div>
	</header>
	<!-- end header -->
	<section id="inner-headline">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="#"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
					<li><a href="#">Personnel</a><i class="icon-angle-right"></i></li>
					<li class="active">Liste des rapports</li>
				</ul>
			</div>
		</div>
	</div>
	</section>
	<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
			<div class="w3-row w3-card-2 w3-padding">
				<div class="col1">
					
				<h4>Liste des rapports </h4>
				</div>

			</div>
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#one"><i class="icon-briefcase"></i> Les miens</a></li>
                            <?php if ($user->is_admin): ?>    
                            <li class=""><a data-toggle="tab" href="#two">Les autres</a></li>
                            <li class=""><a data-toggle="tab" href="#three" class="w3-text-red"><i class="fa fa-trash"></i> Corbeille</a></li>
                            <?php endif ?>
                        </ul>
						<div class="tab-content">
							<div id="one" class="tab-pane active">
								<table id="mesRapports" class="w3-table">
                                <tr>
                                  <th>#</th>
                                  <th>Date</th>
                                  <th>Objet</th>
                                  <th>Numero</th>
                                  <th>Actions</th>

                                </tr>
                                <?php $i = 1; foreach ($_SESSION['rapports'] as $key => $rap): ?>
                                <?php if ($rap->personne_id === $user->id_pers): ?>
                                    <tr title="<?='De ' . $rap->nom_pers .' '.$rap->prenom_pers?>" id="rapport<?=$rap->num?>">
                                      <td><?=$i++?></td>
                                      <td><?=$rap->date_rap?></td>
                                      <td><?=$rap->objet?></td>
                                      <td><?=$rap->num?></td>
                                      <th><div class="btn-group">
                                          <a href="<?=site_url('user/edit_rapport/'.$rap->num)?>" title="Editer" class="btn btn-success btn-edit"><i class="fa fa-edit"></i></a>
                                          <a href="<?=site_url('user/print_rapport/'.$rap->num)?>" title="Imprimer" class="btn btn-success btn-print"><i class="fa fa-print"></i></a>
                                          <a hidden=""> href="<?=site_url('user/disable_rapport/'.$rap->num)?>" title="Desactiver" class="btn btn-success"><i class="fa fa-remove"></i></a>
                                          <a href="<?=site_url('user/del_rapport/'.$rap->num)?>" title="Supprimer" class="btn btn-success btn-delete"><i class="fa fa-remove"></i></a>
                                      </div></th>
                                    </tr>
                                <?php endif ?>
                                <?php endforeach ?>
                                </table>
							</div>
                            <?php if ($user->is_admin): ?>    
                            <div id="two" class="tab-pane">
                            <table id="mesRapports" class="w3-table">
                                <tr>
                                  <th>#</th>
                                  <th>Date</th>
                                  <th>Objet</th>
                                  <th>numero</th>
                                  <th>Actions</th>

                                </tr>
                                <?php $i = 1; foreach ($_SESSION['rapports'] as $key => $rap): ?>
                                <?php if ($rap->personne_id !== $user->id_pers): ?>
                                    <tr title="<?='De ' . $rap->nom_pers .' '.$rap->prenom_pers?>" id="rapport<?=$rap->num?>">
                                      <td><?=$i++?></td>
                                      <td><?=$rap->date_rap?></td>
                                      <td><?=$rap->objet?></td>
                                      <td><?=$rap->num?></td>
                                      <th><div class="btn-group">
                                          <a href="<?=site_url('user/edit_rapport/'.$rap->num)?>" title="Editer" class="btn btn-success btn-edit"><i class="fa fa-edit"></i></a>
                                          <a href="<?=site_url('user/print_rapport/'.$rap->num)?>" title="Imprimer" class="btn btn-success btn-print"><i class="fa fa-print"></i></a>
                                          <a hidden=""> href="<?=site_url('user/disable_rapport/'.$rap->num)?>" title="Desactiver" class="btn btn-success"><i class="fa fa-remove"></i></a>
                                          <a href="<?=site_url('user/del_rapport/'.$rap->num)?>" title="Supprimer" class="btn btn-success btn-delete"><i class="fa fa-remove"></i></a>
                                      </div></th>
                                    </tr>
                                <?php endif ?>
                                <?php endforeach ?>
                                </table>
                                
                            </div>
                            <div id="three" class="tab-pane">
                                bientot !!! (site en construction)
                            </div>
                            <?php endif ?>
						</div>
					</div>
			<div class="col-lg-4">
				<aside class="right-sidebar">
				<div class="widget">
					<form class="form-search">
						<input type="text" placeholder="Search.." class="form-control">
					</form>
				</div>
				<div hidden="" class="widget">
					<h5 class="widgetheading">Archive</h5>
					<ul class="cat">
						<li><i class="icon-angle-right"></i><a href="#">Web design</a><span> (20)</span></li>
					</ul>
				</div>
				
				<div class="widget">
					<h5 class="widgetheading">Anciennes taches non résolues</h5>
					<ul class="recent">
                        <?php foreach ($_SESSION['unsolvedTask']  as $key => $task): ?>
                            <img alt="" class="pull-left" src="<?=base_url('img/dummies/blog/65x65/thumb1.jpg')?>">
                        <h6><a href="#"><?=$task->nom_act?></a>
                            <br><small>écheance : <?=$task->echeance?></small>
                        </h6>
                        <p>
                             <?php echo '';// echo $task->desc_act // TODO ce champ doit etre cree?>
                        </p>
                        <?php endforeach ?>
						<li>
						
						</li>
					</ul>
				</div>
				
				</aside>
			</div>
		</div>
	</div>
	</section>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>


<!-- The Modal nouvell fonction -->
<div id="id03" class="w3-modal" style="z-index: 4">
  <div class="w3-modal-content">
    <div class="w3-container"><br>
      <span onclick="document.getElementById('id03').style.display='none'"
      class="w3-closebtn">&times;</span>
          	<h4>Inserer nouvelle fonction</h4>
    <form  name="send-travail" class="validateform form form-inline" method="post" action="" id="contactform">
    <input type="hidden" name="rapport[num]" value="<?=$_SESSION['rapport']->num?>">
        <div class="row">
            <div class="col-lg-4 field">
                <input type="text" data-msg="Please enter at least 25 chars" data-rule="maxlen:25" placeholder="* nom" name="fonction[nom_fonc]">
                <div class="validation">
            	</div>
            </div>
            <div class="col-lg-7 field">
                <input type="text" data-msg="Please enter at least 255 chars" data-rule="maxlen:255" placeholder="description" name="fonction[desc_fonc]">
                <div class="validation">
                </div>
            </div>
            <button class="w3-btn" type="submit" name="postFonction">Inserer</button>
        </div>
	</form>
</div>
  </div>
</div>
<!-- The Modal nouveau travail-->
<div id="id01" class="w3-modal">
  <div class="w3-modal-content">
    <div class="w3-container"><br>
      <span onclick="document.getElementById('id01').style.display='none'"
      class="w3-closebtn">&times;</span>
      <h4>Inserer nouvelle tache déja realisée</h4>
    <form  name="send-travail" class="validateform form form-inline" method="post" action="" id="workform">
    <input type="hidden" name="travail[rapport_num]" value="<?=$_SESSION['rapport']->num?>">
        <div id="sendmessage">
             le travail a été enregistrer
        </div>
        <div class="row">
			<div class="col-lg-4 field">
                    <input type="text" placeholder="* nom de la tache" name="travail[nom_trav]">
                    <div class="validation">
                    </div>
                </div>
            	<div class="col-lg-4 field">
                    <input type="text" data-toggle="time" placeholder="* heure de debut" name="travail[hd_trav]">
                    <div class="validation">
                    </div>
                </div>   
            	<div class="col-lg-4 field">
                    <input type="text" data-toggle="time" value="<?php echo date('H:i:s') ?>" placeholder=" heure de fin" name="travail[hf_trav]">
                    <div class="validation">
                    </div>
                </div>     
            </div>
            <div class="row">      	
                <div class="col-lg-4 field">
                	<label for="superviseur">Superviseur </label>
                	<?php if (isset($personnes)): ?>
                		<?php foreach ($personnes as $key => $pers): ?>
                			<select name="travail[sup_id]" class="form-control" id="superviseur">
		                		<option value="<?php $pers->id_pers ?>"><?php echo $pers->nom_pers ?></option>
		                	</select>
		                    <div class="validation">
		                    </div>
                		<?php endforeach ?>
                	<?php endif ?>
                </div>  
            <button class="w3-btn pull-rigth" name="postTravail" type="submit" >Inserer au rapport</button>
        </div>
	</form>
</div>
  </div>
</div>
<!-- The Modal nouvelle tache todo -->
<div id="id02" class="w3-modal">
  <div class="w3-modal-content">
    <div class="w3-container"><br>
      <span onclick="document.getElementById('id02').style.display='none'"
      class="w3-closebtn">&times;</span>
      <h4>Inserer nouvelle tache a realisée</h4>
        <form  name="send-action" class="validateform form form-inline" method="post" action="" id="todoform">
        <input type="hidden" name="action[rapport_num]" value="<?=$_SESSION['rapport']->num?>">
            <div id="sendmessage">
                 le todo a été enregistrer
            </div>
            <div class="row">
                <div class="col-lg-4 field">
                    <input type="text" placeholder="* nom de la tache" name="action[nom_act]">
                    <div class="validation">
                    </div>
                </div>
            	<div class="col-lg-4 field">
                    <input type="text" data-toggle="date" placeholder="* echeance" name="action[echeance]">
                    <div class="validation">
                    </div>
                </div>            	
                <div class="col-lg-4 field">
                	<label for="ass1-list">Assistant n*1 </label>
                	<select name="action[ass1_id]" class="form-control" id="ass1-list">
	                	<?php if (isset($personnes)): ?>
	                		<?php foreach ($personnes as $pers): ?>
			                		<option value="<?php $pers->id_pers ?>"><?php echo $pers->nom_pers ?></option>
	                		<?php endforeach ?>
	                	<?php endif ?>
                	</select>
                    <div class="validation">
                    </div>
                </div>  
                <div class="col-lg-4 field">
                	<label for="ass2-list" >Assistant n*2 </label>
					<select class="form-control" name="action[ass2_id]" id="ass2-list">
	                	<?php if (isset($personnes)): ?>
	                		<?php foreach ($personnes as $pers): ?>
			                		<option value="<?php $pers->id_pers ?>"><?php echo $pers->nom_pers ?></option>
	                		<?php endforeach ?>
	                	<?php endif ?>
		            </select>
                    <div class="validation">
                    </div>
                </div>            	<br>
				<div class="clearfix"><button name="postAction" type="submit" class="w3-btn pull-left">Inserer au rapport</button></div>
            </div>
		</form>
    </div>
  </div>
</div>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?=base_url('js/jquery.js')?>"></script>
<script src="<?=base_url('js/jquery.easing.1.3.js')?>"></script>
<script src="<?=base_url('js/bootstrap.min.js')?>"></script>
<script src="<?=base_url('js/jquery.fancybox.pack.js')?>"></script>
<script src="<?=base_url('js/jquery.fancybox-media.js')?>"></script>
<script src="<?=base_url('js/google-code-prettify/prettify.js')?>"></script>
<script src="<?=base_url('js/portfolio/jquery.quicksand.js')?>"></script>
<script src="<?=base_url('js/jquery.flexslider.js')?>"></script>
<script src="<?=base_url('js/custom.js')?>"></script>
<script src="<?=base_url('js/animate.js')?>"></script>
<script src="<?=base_url('js/tinymce/tinymce.min.js')?>"></script>
<script src="<?=base_url('js/lobibox/js/lobibox.min.js')?>"></script>
<script src="<?=base_url('js/select2/js/select2.min.js')?>"></script>
<script src="<?=base_url('js/moment.min.js')?>"></script>
<script src="<?=base_url('js/moment-timezone.js')?>"></script>
<script src="<?=base_url('js/bootstrap-datepicker/bootstrap-datetimepicker.js')?>"></script>

<script src="<?=base_url('js/main.js')?>"></script>

<script>
    $(document).ready(function () {
//----------------------------------------------------------------------------------------------------------
        tinymce.init({
            selector: '#textarea',
            elementpath: false,
            plugins: 'autolink image',
            //toolbar: 'undo redo | styleselect | bold italic | link image',
            //menubar: false,
            resize: false,
            images_upload_base_path: 'images/test/'
        });

//------------------------------LOBIBOX---------------------------------------------
<?php unset($_SESSION['alert'])?>
<?php if (isset($_SESSION['alert'])): ?>
            Lobibox.notify('<?= $_SESSION['alert']['type'] ?>', {
                msg: "<?= $_SESSION['alert']['msg'] ?>"
            });
<?php endif; ?>
<?php if (isset($_SESSION['error'])): ?>
            Lobibox.notify('error', {
                msg: "<?= $_SESSION['error'] ?>"
            });
<?php endif; ?>
<?php if (isset($_SESSION['success'])): ?>
            Lobibox.notify('success', {
                msg: "<?= $_SESSION['success'] ?>"
            });
<?php endif; ?>

//------------------------------SELECT 2---------------------------------------------
		
	
    	 $('[data-toggle="select"]').select2({
            theme: "bootstrap",
            placeholder: "choix multiple",
            //maximumSelectionSize: 6,
        });
//------------------------------DATETIME----------------------------------------------
	    $('[data-toggle="datetime"]').datetimepicker({
	        format: 'YYYY-MM-DD hh:mm:ss',
	    });
		$('[data-toggle="time"]').datetimepicker({
		    format: 'hh:mm:ss',
		});
		$('[data-toggle="date"]').datetimepicker({
        	format: 'YYYY-MM-DD',
 	   	});
 	   	/*
		$('body').on('click', '[data-toggle="jconfirm"]', function (e) {
	        e.preventDefault();
	        $(this).jConfirm({
	            message: 'Supprimer vraiment?',
	            confirm: 'OUI',
	            cancel: 'NON!',
	            openNow: this,
	            callback: function (elem) {
	                console.log('confirm callback in action');
	                document.location.href = $(elem).attr('href');
	            }
	        });
	    });
	     $('[data-toggle="table"]').DataTable();
	     */
//---------------------------------------------------------------------------
		$('#postRapport').click(function(e) {
			e.preventDefault();
			$('form#rapport-form').submit();
		});

        setTimeout(function () {
            $('.alert').fadeOut();
        }, 3000);


    });
    //KqzT0091Hejp
</script>

<!-- w3 accordion -->
<script>
function myFunction(id) {
    document.getElementById(id).classList.toggle("w3-show");
}
</script>

<!-- javascript AngularJS 1.4.5
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!--
<script src="<?=base_url('js/angular.min.js')?>"></script>
<script src="<?=base_url('app/app.js')?>"></script>
-->
<?php
unset($_SESSION['error']);
unset($_SESSION['success']);
unset($_SESSION['alert']);
?>
</body>
</html>