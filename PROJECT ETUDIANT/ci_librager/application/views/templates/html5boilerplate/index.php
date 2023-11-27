<!doctype html>
<html class="no-js" lang="<?=$language?>">
    <head>
        <?php if(isset($head)) echo $head;?>
    </head>
    <body class="w3-khaki">
        <div class="container-fluid" >
            <!--[if lt IE 8]>
                <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->

            <!-- Add your site or application content here -->

            <header id="header" class="row">
                <div class="container" >
                <?php //include_once VIEWPATH.'layouts/'.$header.'.php'; //if(isset($header)) echo $header; ?>
                <?php if(isset($banner)) echo $banner; ?>
                </div>
            </header>
            <main class="row">
                <section class="container">
                    <?php  if(isset($content)) echo $content; else echo '<h1 class="alert alert-danger text-center"></h1>';?>
                </section>
            </main>
            <footer id="footer" class="row">
                <?php if(isset($footer)) echo $footer; //include_once VIEWPATH.'layouts/footer.php';?>
            </footer>
        </div>
        <?php  if(isset($scripts)) echo $scripts; // include_once VIEWPATH.'partials/scripts.php';?>
    </body>
</html>