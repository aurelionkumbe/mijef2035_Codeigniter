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

<style>
  

</style>

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
                        	<li> <a href="<?=site_url('user/rapports')?>">LISTE DES RAPPORTS</a></li>
                            <li><a style="border-bottom: 4px solid blue; color: blue;"  href="<?=site_url('user/personnel')?>">LISTE DU PERSONNEL</a></li>
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
					<li><a href="#">Rapport</a><i class="icon-angle-right"></i></li>
					<li class="active">Liste du personnel</li>
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
					
				<h4>Liste du personnel </h4>
				</div>

			</div>
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#one"><i class="icon-briefcase"></i>Employés</a></li>
              <?php if ($user->is_super_admin): ?>
              <li class=""><a data-toggle="tab" href="#two">Les Admins</a></li>
              <?php endif ?>
							<li class=""><a data-toggle="tab" href="#three" class="w3-text-red"><i class="fa fa-trash"></i> Corbeille</a></li>
						</ul>
						<div class="tab-content">
							<div id="one" class="tab-pane active">
								<table id="personnes" class="w3-table">
                  <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>tel</th>
                    <th>email</th>
                    <th>est admin</th>
                    <th>action</th>

                  </tr>
                  <?php $i = 1; foreach ($_SESSION['personnel'] as $key => $pers): ?>
                    <?php if (!$pers->is_admin): ?>
                      
                      <tr id="user<?=$pers->id_pers?>">
                        <td class=""><?=$i++?></td>
                        <td class="nom"><?=$pers->nom_pers?></td>
                        <td class="prenom"><?=$pers->prenom?></td>
                        <td class="tel"><?=$pers->tel_pers?></td>
                        <td class="email"><?=$pers->email?></td>
                        <td class="is_admin"><?=($pers->is_admin)? 'oui':'non'?></td>

                        <td class="action"><div class="btn-group">
                            <a href="#<?=$pers->id_pers?>"  data-user-id="<?=$pers->id_pers?>" title="Editer" class="btn btn-success btn-edit" onclick="document.getElementById('id01').style.display='block'"><i class="fa fa-edit"></i></a>
                            <a href="<?=site_url('user/del_user/'.$pers->id_pers)?>" title="Supprimer" class="btn btn-success btn-delete"><i class="fa fa-remove"></i></a>
                        </div></td>
                      </tr>
                    <?php endif ?>
                  <?php endforeach ?>
                  </table>
							</div>
              <?php if ($user->is_super_admin): ?>
              <div id="two" class="tab-pane">
                <table id="admins" class="w3-table">
                  <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>tel</th>
                    <th>email</th>
                    <th>est admin</th>
                    <th>action</th>

                  </tr>
                  <?php $i = 1; foreach ($_SESSION['personnel'] as $key => $pers): ?>
                    <?php if ($pers->is_admin): ?>
                      
                      <tr id="user<?=$pers->id_pers?>">
                        <td class=""><?=$i++?></td>
                        <td class="nom"><?=$pers->nom_pers?></td>
                        <td class="prenom"><?=$pers->prenom?></td>
                        <td class="tel"><?=$pers->tel_pers?></td>
                        <td class="email"><?=$pers->email?></td>
                        <td class="is_admin"><?=($pers->is_admin)? 'oui':'non'?></td>

                        <td class="action"><div class="btn-group">
                            <a href="#<?=$pers->id_pers?>"  data-user-id="<?=$pers->id_pers?>" title="Editer" class="btn btn-success btn-edit" onclick="document.getElementById('id01').style.display='block'"><i class="fa fa-edit"></i></a>
                            <a href="<?=site_url('user/del_user/'.$pers->id_pers)?>" title="Supprimer" class="btn btn-success btn-delete"><i class="fa fa-remove"></i></a>
                        </div></td>
                      </tr>
                    <?php endif ?>
                  <?php endforeach ?>
                  </table>
              </div>
              <?php endif ?>
							<div id="three" class="tab-pane">
								bientot !!! (site en construction)
							</div>
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
        <?php if ($user->is_admin): ?>
                <div class="widget">
                    
          <div class="w3-accordion w3-light-grey">
  <button onclick="myFunction('Demo1')" class="w3-btn-block w3-left-align">
    <i class="fa fa-users"></i> Ajouter une personne
  </button>
  <div id="Demo1" class="w3-accordion-content w3-container">
    <form action="" method="post" class="form form-horizontal">
      <div class="form-group">
        <input class="form-control" type="text" name="user[nom_pers]" placeholder="nom" required="">
        <input class="form-control" type="text" name="user[prenom]" placeholder="prenom">
        <input class="form-control" type="text" name="user[email]" placeholder="Email">
        <input class="form-control" type="text" name="user[tel_pers]" placeholder="Telephone" required="">

      <div class="input-group">
        <input type="text" name="user[pass]" placeholder="mot de passe" required="">
        <span class="input-group-btn"><button type="button" title="generer auto"><i class="fa fa-refresh"></i></button></span>
      </div>
      <div class="input-group">
        <label for="fonction-list" class="input-group-addon">Fonction &nbsp;</label>
          <select data-toggle="select"  class="form-control" name="user[fonction_id]" id="fonction-list" required="">
            <option class="w3-theme" value="" >Choisir une fonction</option>
            <?php if (isset($fonctions) && !empty($fonctions)): ?>
              <?php foreach ($fonctions as $f): ?>
                <option title="<?php echo $f->desc_fonc ?>" value="<?php echo $f->id_fonc ?>"><?php echo $f->nom_fonc ?></option>
              <?php endforeach ?>
            <?php else: ?>
            <option>Aucune fonction enregistrée</option>
            <?php endif ?>
          </select>
        <span class="input-group-btn"><button type="button" title="Nouvelle fonction"
        onclick="document.getElementById('id03').style.display='block'"
        ><i class="fa fa-plus"></i></button></span>
      </div>
      <?php if ($user->is_super_admin): ?>
      <div class="input-group checkbox">
        <label for="is-admin-ckb"><input class="checkbox" type="checkbox" name="user[is_admin]" id="is-admin-ckb"> Est un admin ?</label>
      </div> 
      <?php endif ?> 
      <br>
      <div class="input-group">
          <input type="submit" class="btn btn-primary w3-right" name="postUser" value="Enregister">
        </div>


      </div>
    </form>
  </div>
  <?php if (0): ?>
    
  <button onclick="myFunction('Demo2')" class="w3-btn-block w3-left-align">
    Ajouter un super admin
  </button>
  <div id="Demo2" class="w3-accordion-content w3-container">
    <p>Some text..</p>
  </div>
  <?php endif ?>
</div>
        </div>
                <?php endif ?>
				

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

<!-- The Modal modifier personnes-->
<div id="id01" class="w3-modal">
  <div class="w3-modal-content">
    <div class="w3-container"><br>
      <span onclick="document.getElementById('id01').style.display='none'"
      class="w3-closebtn">&times;</span>
      <h4>Modification</h4>
      <form action="" method="post" class="form form-horizontal">
      <div class="form-group">
        <input class="form-control " type="hidden" name="id_pers" required="">
        <input class="form-control " type="text" name="user[nom_pers]" placeholder="nom" required="">
        <input class="form-control" type="text" name="user[prenom]" placeholder="prenom">
        <input class="form-control" type="text" name="user[email]" placeholder="Email">
        <input class="form-control" type="text" name="user[tel_pers]" placeholder="Telephone" required="">

      <div class="input-group">
        <input type="text" name="user[pass]" placeholder="mot de passe">
        <span class="input-group-btn"><button type="button" title="generer auto"><i class="fa fa-refresh"></i></button></span>
      </div>
      <div class="input-group">
        <label for="fonction-list" class="input-group-addon">Fonction &nbsp;</label>
          <select data-toggle="select"  class="form-control" name="user[fonction_id]" id="fonction-list" required="">
            <option class="w3-theme" value="" >Choisir une fonction</option>
            <?php if (isset($fonctions) && !empty($fonctions)): ?>
              <?php foreach ($fonctions as $f): ?>
                <option title="<?php echo $f->desc_fonc ?>" value="<?php echo $f->id_fonc ?>"><?php echo $f->nom_fonc ?></option>
              <?php endforeach ?>
            <?php else: ?>
            <option>Aucune fonction enregistrée</option>
            <?php endif ?>
          </select>
        <span class="input-group-btn"><button type="button" title="Nouvelle fonction"
        onclick="document.getElementById('id03').style.display='block'"
        ><i class="fa fa-plus"></i></button></span>
      </div>
      <?php if ($user->is_super_admin): ?>
        
      <div class="input-group checkbox">
        <label for="is-admin-ckb"><input class="checkbox" type="checkbox" name="user[is_admin]" id="is-admin-ckb" > Est un admin ?</label>
      </div>  
      <?php endif ?>
      <br>
      <div class="input-group">
          <input type="submit" class="btn btn-primary w3-right" name="pathUser" value="Enregister">
        </div>


      </div>
    </form>
    
</div>
  </div>
</div> <!-- end modal -->

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
//-----------------------------------------PEUPLAGE DU FORM POUR LA MODIFICATION DUN USER --------------------------------
//
  $('.btn-edit').click(function(event) {
    event.preventDefault();
    var cible = $(this).attr('data-user-id');
    var nom = $('#user'+cible+' .nom').text();
    var prenom = $('#user'+cible+' .prenom').text();
    var tel = $('#user'+cible+' .tel').text();
    var email = $('#user'+cible+' .email').text();
    var is_admin = $('#user'+cible+' .is_admin').text();

    $('input[name="id_pers"]').val(cible);
    $('input[name="user[nom_pers]"]').val(nom);
    $('input[name="user[prenom]"]').val(prenom);
    $('input[name="user[email]"]').val(email);
    $('input[name="user[tel_pers]"]').val(tel);

  });


//----------------------------------TINYMCE------------------------------------------------------------------------
//
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