
<section id="bottom" class="wet-asphalt">
    <div class="container">
        <div class="row">

            <div class="col-md-3 col-sm-6" >
                <h4>Company</h4>
                <div>
                    <ul class="arrow">
                        <li><a href="<?= base_url('')?>">Acceuil</a></li>
                        <li><a href="<?= base_url('location')?>">Je veux louer</a></li>
                        <li><a href="<?= base_url('achat')?>">Je veux acheter</a></li>
                        <li><a href="<?= base_url('contact')?>">Nous contacter</a></li>
                        <!--li><a href="#">Nos Services</a></li>
                        <li><a href="#">Qui sommes nous</a></li-->

                    </ul>
                </div>
            </div><!--/.col-md-3-->
            <div class="col-md-3 col-sm-6" style="visibility: hidden">
                <h4 >A propos de nous</h4>
                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.</p>
                <p>Pellentesque habitant morbi tristique senectus.</p>
            </div><!--/.col-md-3-->

            <div class="col-md-3 col-sm-6" style="visibility: hidden;">
                <h4>Latest Blog</h4>
                <div>
                    <div class="media">
                        <div class="pull-left">
                            <img src="images/blog/thumb1.jpg" alt="">
                        </div>
                        <div class="media-body">
                            <span class="media-heading"><a href="#">Pellentesque habitant morbi tristique senectus</a></span>
                            <small class="muted">Posted 17 Aug 2013</small>
                        </div>
                    </div>
                    <div class="media">
                        <div class="pull-left">
                            <img src="images/blog/thumb2.jpg" alt="">
                        </div>
                        <div class="media-body">
                            <span class="media-heading"><a href="#">Pellentesque habitant morbi tristique senectus</a></span>
                            <small class="muted">Posted 13 Sep 2013</small>
                        </div>
                    </div>
                    <div class="media">
                        <div class="pull-left">
                            <img src="images/blog/thumb3.jpg" alt="">
                        </div>
                        <div class="media-body">
                            <span class="media-heading"><a href="#">Pellentesque habitant morbi tristique senectus</a></span>
                            <small class="muted">Posted 11 Jul 2013</small>
                        </div>
                    </div>
                </div>
            </div><!--/.col-md-3-->

            <div class="col-md-3 col-sm-6">
                <h4>Address</h4>
                <?php include ('address.php') ?>
                <h4>Newsletter</h4>
                <form role="form">
                    <div class="input-group">
                        <input type="text" class="form-control" autocomplete="off" placeholder="Enter your email">
                        <span class="input-group-btn">
                                <button class="btn btn-danger" type="button">Go!</button>
                            </span>
                    </div>
                </form>
            </div> <!--/.col-md-3-->
        </div>
    </div>
</section><!--/#bottom-->

<footer id="footer" class="midnight-blue">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                &copy; 2017 <a target="_blank" href="https://kamitbrains.herokuapp.com/" title="">KAMITBRAINS</a>. Tous droits reservés.
            </div>
            <div class="col-sm-6" >
                <ul class="pull-right">
<li>                <h3 style="margin: 0"><span id="myCounter"></span> Visiteur(s)</h3>
</li>
                    <li><a id="gototop" class="gototop" href="#"><i class="icon-chevron-up"></i></a></li><!--#gototop-->
                </ul>
            </div>
        </div>
    </div>
</footer><!--/#footer-->