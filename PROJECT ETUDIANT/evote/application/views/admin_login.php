<?php include_once 'partial/head.php' ?>
<?php //include_once 'partial/header.php' ?>


    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= base_url('index.php/home') ?>">home</a>
            </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse navbar-right">
                <ul class="nav navbar-nav">
                    <li><a href="<?= base_url('index.php/home') ?>">< Back to front</a></li>
                </ul>
            </div>

        </div>
    </div>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<div id="middle" class="middle row">
    <section class="col-md-4 col-md-offset-4">
        <form id="loginAdminForm" class="form-signin" action="" method="POST">
            <h4 class="form-signin-heading">Please sign in</h4>
            <div   >
                <?php
                if(isset($errors)){
                    // foreach($errors as $error){
                    echo "<div class='error'>".$errors."</div>";
                    //}
                    /*}else{
                        if( isset($lignes)==0){
                            echo "<div class='error'> Login ou password incorrect !</div>";
                        }else{

                        }*/
                }
                ?>
            </div>
            <input type="text" class="form-control" placeholder="Votre nom" value="<?php if(isset($_POST['login'])){echo $_POST['login'];}?>" name="login" autofocus>
            <input type="password" class="form-control" placeholder="Password" name="pwd">
            <input class="btn btn-lg btn-primary btn-block" type="submit" name="connexion" value="Se connecter"/>
        </form>
    </section>

</div>

    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
<?php include_once 'partial/footer.php' ?>
<?php include_once 'partial/foot.php' ?>