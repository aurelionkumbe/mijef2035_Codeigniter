
<?= (isset($activeMenu) && ($activeMenu == '')) ? 'active' : '';  ?>
<header id="header" class="row">
    <div class="container">
        <!--
        <div class="banniere col-md-12">
            <div class="col-md-2 pull-left">
                <img id="logo" src="<?=base_url('images/logo.png')?>" class="img-responsive">
            </div>
        </div>
        -->
        <nav class="navbar navbar-default col-md-12">
            <div class="col-md-2 col-md-offset-5 text-center">
                <img id="logo" src="<?=base_url('images/logo.png')?>" class="img-responsive">
            </div>
            <!--
            <ul class="navbar-nav nav nav-tabs navbar-left">
                <li class="<?= (isset($activeMenu) && ($activeMenu == 'home')) ? 'active' : '';  ?>"><a href="<?= base_url('index.php/home') ?>"><i class="glyphicon glyphicon-home"></i></a></li>
            </ul>
            <ul class="navbar-nav nav nav-tabs navbar-left">
                <li hidden class="<?= (isset($activeMenu) && ($activeMenu == 'infos')) ? 'active' : '';  ?>"><a href="<?= base_url('index.php/home/candidat') ?>">Informations</a></li>
                <li  class="<?= (isset($activeMenu) && ($activeMenu == 'vote')) ? 'active' : '';  ?>"><a href="<?= base_url('index.php/home/login') ?>">Je veux voté</a></li>
            </ul>

            <ul class="navbar-nav nav nav-pills navbar-right" hidden>
            <li><a href="<?= base_url('index.php/admin/login') ?>"><b>Admin</b></a></li>
             </ul>
              -->
        </nav>
    </div>

</header>