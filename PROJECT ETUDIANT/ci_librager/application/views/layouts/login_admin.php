<div class="container">
    <div class="col⁻md-12">
        <?php echo validation_errors(); ?>
        <p class="row">&nbsp;</p>
        <form method="post" class="col-md-offset-3 col-md-6 w3-container w3-card-8 w3-theme" action="<?=site_url('admin/login')?>"><br>
                <div <?= isset($_SESSION['flash']) == false ?'hidden':''?> class="w3-container w3-section w3-orange">
        <span class="w3-closebtn" onclick="this.parentElement.style.display='none'">×</span>
        <h4><?=isset($_SESSION['flash'])?$_SESSION['flash']:'';?></h4>
        </div>
            <legend class="text-center">Accés Libraire / Administrateur</legend>
            <div class="w3-group">
                <input type="text" style="color: #333 !important;" name="email" required="" class="w3-input">
                <label class="w3-label w3-text-khaki">Email / Login</label>
            </div>
            <div class="w3-group">
                <input type="password" style="color: #333 !important;" name="motdepasse" required="" class="w3-input">
                <label class="w3-label w3-text-khaki">Mot de passe</label>
            </div>
              <div class="w3-group">
            <button name="adminLogin" class="btn btn-lg btn-primary w3-khaki btn-block" type="submit">Connexion</button>
            </div>
            

        </form>

        <!--
    <form class="form-signin" action="<?=site_url('admin/auth')?>" method="post">
        <h4 class="form-signin-heading">Connecter vous</h4>
        <input name="email" type="text" class="form-control" placeholder="Email" autofocus>
        <input  name="motdepasse" type="password" class="form-control" placeholder="Mot de Passe">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
    </form>
    -->
    </div>

</div>
<!-- /container -->