<nav id="rapport-nav" data-container="#content">
    <ul class="nav nav-tabs">
        <li role="presentation" class="active"><a href="#profile" role="button">Mon profile</a></li>
        <li role="presentation"><a href="#mes-rapports" role="button">Mes Rapports</a></li>
        <?php if ($_SESSION['est_admin']): ?>
            <li role="presentation"><a href="#autres-rapports" role="button">Autres Rapports</a></li>
            <li role="presentation"><a href="#personnel" role="button">Personnel</a></li>

            <li role="presentation">
                <a class="dropdown-toggle" href="#bin" role="button">
                    <span class="mif-bin"></span>&nbsp;Corbeille&nbsp;<span class="caret"></span>
                </a>
            </li>
            <?php
        endif;
        ?>
    </ul>
</nav>

<div id="content">

    <section id="profile">

        <?php include_once VIEWPATH . 'layouts/profile.php' ?>

    </section>

    <section id="mes-rapports" hidden>

        <?php include_once VIEWPATH . 'layouts/mes_rapports.php' ?>

    </section>

    <?php if ($_SESSION['est_admin']): ?>
        <section id="autres-rapports" hidden>
            <?php include_once VIEWPATH . 'layouts/autres_rapports.php' ?>
        </section>

        <section id="declinaisons" hidden>
            <aside class="col-md-3">
                <p>&nbsp;</p>
                <nav id="nav-declinaisons">
                    <small>ajouté</small>
                    <ul class="nav nav-pills">
                        ...
                        <li role="presentation" class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="true" aria-expanded="false">
                                Dropdown <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                ...
                            </ul>
                        </li>
                        ...
                    </ul>
                </nav>
            </aside>
            <div class="col-md-offset-1 col-md-8">
                <p>&nbsp;</p>
                <?php echo form_open('rapports/ajouter_personne', 'class="form" id="ajouter-personne"'); ?>
                <fieldset class="form-group">
                    <legend></legend>


                </fieldset>
                <?php echo form_close() ?>
            </div>
        </section>

        <section id="personnel" hidden>

            <?php include_once VIEWPATH . 'layouts/personnel.php' ?>

        </section>

        <section id="bin" hidden>
            <?php include_once VIEWPATH . 'layouts/corbeille.php' ?>
        </section>

    <?php endif; ?>
</div>


<!--   LES BOITES MODALES -->




