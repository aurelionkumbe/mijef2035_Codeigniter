<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="adminNavbarBrand" class="navbar-brand">
            <a class="" href="<?= base_url('index.php/admin/home') ?>">Bienvenue <?= isset($admin) ? $admin['login'] : "maitre" ?></a>
        </div>";
        <nav class="navbar-right">
            <ul class="navbar-nav nav nav-pills">
                <li><a href="<?= base_url('index.php/admin/logout') ?>">Log out</a></li>
            </ul>
        </nav>

    </div>
    <!-- /.container -->
</nav>

