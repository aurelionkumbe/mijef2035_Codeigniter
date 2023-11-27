<!doctype html>
<html class="no-js" lang="<?=$language?>">
    <head>
        <?php if(isset($head)) echo $head;?>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->

                
        <?php include_once VIEWPATH.'layouts/header.php';?>
        
        <h1 class="page-heading">STARTER KIT for codeigniter, created by NKUMBE AURELIEN</h1>
        <p>Hello world! This is HTML5 Boilerplate.</p>
        
        
                
        <?php if(isset($content)) echo $content;?>
        
        <?php include_once VIEWPATH.'layouts/footer.php';?>
        <?php include_once VIEWPATH.'partials/scripts.php';?>
        
        
    </body>
</html>