<!DOCTYPE html>
<html lang="en">

<?php include_once "partials/head.php"?>


<body>
    <?php include_once "partials/header.php"?>
    <link type="text/css" rel="Stylesheet"
          href="<?php echo CaptchaUrls::LayoutStylesheetUrl() ?>" />

    <section id="title" class="emerald">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Nous contacter</h1>
                    <p>nous restons toujours joignable </p>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-5">
                            
                        </div>
                        <div class="col-sm-6" >
                            <img src="<?=base_url('images/contact.gif' )?>" alt="" style=" height: 6em;">                            
                            <span style="vertical-align: middle; display: inline-block">
                            <i class="fa fa-mobile-phone"></i> (237) 663 975 836 <br>
                            <i class="fa fa-mobile-phone"></i> (237) 691 500 645 <br>
                            <i class="fa fa-whatsapp"></i> (237) 672 982 484
                            </span>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#title-->     

    <section id="contact-page" class="container">
        <div class="row"> <?php echo $this->session->flashdata('msg'); ?></div>
        <div class="row">
            <div class="col-sm-8">
                <h4>Formulaire de Contact</h4>
                <div class="status alert alert-success" style="display: none"></div>
                <?php echo form_open("contact", ' id="main-contact-form" class="contact-form" role="form"' ); ?>

                    <div class="row">
                        <div class="col-sm-5">
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Sujet" name="sujet">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Noms" name="noms">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Email address" name="email">
                            </div>
                            <div class="form-group">
                                <?php echo $captchaHtml; ?>
                            </div>
                            <div class="form-group">
                                <input name="CaptchaCode" id="CaptchaCode" value="" type="text" class="form-control" required="required" placeholder="code">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg">Envoyer</button>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Message"></textarea>
                        </div>
                    </div>
                <?php echo form_close() ?>
            </div><!--/.col-sm-8-->
            <div class="col-sm-4">
                <h4>Notre Localisation</h4>
                
                <iframe width="100%" height="215" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3980.7308271057414!2d11.545783714390733!3d3.867814049393692!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x108bc5a01d5aab23%3A0xf988d4a9a470d57a!2sNouvelle+route+Mimboman%2C+Yaound%C3%A9!5e0!3m2!1sfr!2scm!4v1496603202013"></iframe>
            </div><!--/.col-sm-4-->
        </div>
    </section><!--/#contact-page-->


    <?php include_once "partials/footer.php"?>


    <?php include_once "partials/scripts.php"?>

</body>
</html>