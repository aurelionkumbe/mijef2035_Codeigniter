<?php include_once 'partial/head.php' ?>
<?php include_once 'partial/header.php' ?>

    <!-- START HEADER -->
    <section id="header">
        <div class="container">
            <header>
                <!-- HEADLINE -->
                <h1 data-animated="GoIn"><b>COMPTE A REBOURS VOTE</b></br> Election du comité des étudiants 2015-2016
                </h1>
            </header>
            <!-- START TIMER -->
            <div id="timer" data-animated="FadeIn">
                <h2 id="message"></h2>

                <div id="days" class="timer_box"></div>
                <div id="hours" class="timer_box"></div>
                <div id="minutes" class="timer_box"></div>
                <div id="seconds" class="timer_box"></div>
            </div>
            <!-- END TIMER -->
            <div class="col-lg-4 col-lg-offset-4 mt centered">
                <form id="loginHomeForm" class="form-signin" method="POST" action="<?= base_url('index.php/home/login') ?>">
                    <caption>
                        <h4>Identifier vous !</h4>
                    </caption>

                    <?php
                    if (isset($_SESSION['erreur'])) {
                        echo "<div class='alert alert-danger'>" . $_SESSION['erreur'] . "</div>";
                        unset($_SESSION['erreur']);
                    }
                    ?>
                    <input type="text" class="form-control" name="email" placeholder="Votre email"
                           value="<?= isset($nomelecteur) ? $nomelecteur : ''; ?>"/>
                    <input type="text" class="form-control" name="matricule" placeholder="Votre matricule"/>
                    <input class="btn btn-lg btn-primary btn-block" type="submit" name="connexion"
                           value="Se connecter"/>
                </form>
            </div>

        </div>
        <!-- LAYER OVER THE SLIDER TO MAKE THE WHITE TEXTE READABLE -->
        <div id="layer"></div>
        <!-- END LAYER -->
        <!-- START SLIDER -->
        <div id="slider" class="rev_slider">
            <ul>
                <li data-transition="slideleft" data-slotamount="1" data-thumb="assets/img/slider/1.jpg">
                    <img src="<?=  base_url('assets/img/slider/1.jpg') ?>">
                </li>
                <li data-transition="slideleft" data-slotamount="1" data-thumb="assets/img/slider/2.jpg">
                    <img src="<?=  base_url('assets/img/slider/2.jpg') ?>">
                </li>
                <li data-transition="slideleft" data-slotamount="1" data-thumb="assets/img/slider/3.jpg">
                    <img src="<?=  base_url('assets/img/slider/3.jpg') ?>">
                </li>
                <li data-transition="slideleft" data-slotamount="1" data-thumb="assets/img/slider/4.jpg">
                    <img src="<?=  base_url('assets/img/slider/4.jpg') ?>">
                </li>
            </ul>
        </div>
        <!-- END SLIDER -->
    </section>
    <!-- END HEADER -->

<?php include_once 'partial/footer.php' ?>


</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
    window.jQuery || document.write('<script src="js/vendor/jquery-1.11.3.min.js"><\/script>')
</script>
<script src="<?= base_url('js/modernizr.custom.js') ?>"></script>
<script src="<?= base_url('js/bootstrap.js') ?>"></script>
<script src="<?= base_url('js/constante.js') ?>"></script>
<script src="<?= base_url('js/plugins.js') ?>"></script>
<script src="<?= base_url('js/main.js') ?>"></script>
<script src="<?= base_url('js/soon/plugins.js') ?>"></script>
<script src="<?= base_url('js/soon/jquery.themepunch.revolution.min.js') ?>"></script>
<script src="<?= base_url('js/soon/custom.js') ?>"></script>


<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='https://www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X','auto');ga('send','pageview');
</script>
</body>

</html>