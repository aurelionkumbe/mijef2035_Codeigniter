<header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><img  src="<?=base_url('images/logo.png')?>" alt="logo">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Yaoundé Immobilier</span>
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="<?php echo $page == 'accueil' ? 'active' : '' ?>"><a href="<?= base_url()?>">Accueil</a></li>
                <li class="<?php echo $page == 'locations' ? 'active' : '' ?>"><a href="<?= base_url('location')?>">je veux louer</a></li>
                <li class="<?php echo $page == 'achats' ? 'active' : '' ?>"><a href="<?= base_url('achat')?>">Je veux Acheter</a></li>
                <li class="<?php echo $page == 'services' ? 'active' : '' ?> hide"><a href="<?= base_url('service')?>">Services</a></li>
                <li class="<?php echo $page == 'apropos' ? 'active' : '' ?> hide"><a href="<?= base_url('apropos')?>">Qui somme nous ?</a></li>


                <!--li><a href="about-us.html">A propos</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="portfolio.html">Portfolio</a></li-->

                <li class="<?php echo $page == 'contacts' ? 'active' : '' ?>"><a href="<?= base_url('contact')?>">Contact</a></li>
            </ul>
        </div>
    </div>
</header><!--/header-->
