<div id="btn-admin-login">
    <a href="<?=site_url('admin/login')?>"  title="login" >&nbsp;</a>
</div>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand fg-green" href="<?=site_url('books')?>">
                <span class="mif-library mif-2x "></span>
                <b>Librager</b>
            </a>
        </div>
        <ul class="btn-group nav navbar-nav navbar-right">
            <li class="dropdown ">
                <a target="_blank" id="drop3" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <b class="fg-green">Connexion
                    <span class="caret"></span>
                    </b>
                </a>
                <ul id="login" class="dropdown-menu" aria-labelledby="drop3">
                    <li>
                        <form id="login-form" class="form-signin" action="<?=site_url('login/auth')?>" method="post">
                            <h4 class="form-signin-heading text-center"><small>J'accède a mon compte</small></h4>
                            <input name="email" type="text" class="input-lg form-control" placeholder="Adresse email " autofocus>
                            <input  name="motdepasse" type="password" class="input-lg form-control" placeholder="Mot de passe">
                            <button class="btn btn-lg bg-green btn-block" type="submit">Se connecter</button>
                            <hr>
                            <div class="form-group">
                            </div>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>

    </div><!-- /.container -->
</div>




<div class="row">
    <div class="w3-container w3-animate-zoom w3-center w3-green">
      <img class="w3-circle" src="<?=asset_url('img/logo.png')?>" alt="LOGO">
</div> 

</div><!-- alert flash pour les notifications sur les resutats des operations -->
