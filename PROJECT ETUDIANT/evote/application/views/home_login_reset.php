<?php include_once 'partial/head.php' ?>
<?php include_once 'partial/header.php' ?>

<div id="middle" class="middle row">

    <section class="col-md-4 col-md-offset-4">
        <form id="loginHomeForm" class="form-signin" method="POST" action="#">
            <caption>
                <h4 class="form-signin-heading" >Identifier vous !</h4>
            </caption>

            <?php
            if(isset($_SESSION['erreur'])){
                echo "<div class='alert alert-danger'>".$_SESSION['erreur']."</div>";
                unset($_SESSION['erreur']);
            }
            ?>
            <input type="text" class="form-control" name="email" placeholder="Votre email" value="<?= isset($nomelecteur) ? $nomelecteur : '';?>"/>
            <input type="text" class="form-control" name="matricule" placeholder="Votre matricule"/>
            <input class="btn btn-lg btn-primary btn-block" type="submit" name="connexion" value="Se connecter"/>
        </form>
    </section>

</div>

<?php include_once 'partial/footer.php' ?>
<?php include_once 'partial/foot.php' ?>