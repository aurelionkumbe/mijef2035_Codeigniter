
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
<script>window.jQuery || document.write('<script src="<?= asset_url('js/vendor/jquery.min.js') ?>"><\/script>')</script>

<!-- ANgular JS -->
<script src="<?= asset_url('js/vendor/angular/angular.min.js') ?>"></script>
<script src="<?= asset_url('js/vendor/angular-ui/angular-ui-router.min.js') ?>"></script>

<!-- Bootstrap JavaScript -->
<script src="<?= asset_url('js/vendor/bootstrap.min.js') ?>"></script>


<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?= asset_url('js/vendor/moment.min.js') ?>"></script>
<script src="<?= asset_url('js/vendor/moment-timezone.js') ?>"></script>
<script src="<?= asset_url('js/vendor/notify.js') ?>"></script>
<script src="<?= asset_url('lib/bootstrap-datepicker/bootstrap-datetimepicker.js') ?>"></script> 

<script src="<?= asset_url('lib/easyui/jquery.easyui.min.js') ?>"></script> 




<script src="<?= asset_url('lib/validate/jquery.validate.min.js') ?>"></script>
<script src="<?= asset_url('lib/tinymce/jquery.tinymce.min.js') ?>"></script>

<!-- loading Publing and Lib : Bootstrap Data-table , JQueryTextEeditor , Bootstrap-datetimePicker-->
<script src="<?= asset_url('lib/bootstrap-data-table/js/vendor/jquery.sortelements.js') ?>"></script>
<script src="<?= asset_url('lib/bootstrap-data-table/js/jquery.bdt.js') ?>"></script> 
<script src="<?= asset_url('lib/TxtEeditor/jquery-te-1.4.0.min.js') ?>"></script> 

<!--<script src="<?= asset_url('css/vendor/w3/w3schools_footer.js') ?>"></script>-->

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->

<script src="<?= asset_url('js/ga.js') ?>"></script>
<script src="<?= asset_url('js/plugins.js') ?>"></script>
<script src="<?= asset_url('js/services.js') ?>"></script>
<script src="<?= asset_url('js/main.js') ?>"></script>

<?php if (isset($_SESSION['flashAlert'])): ?>
    <script>
        var msg= "<?=$_SESSION['flashAlert']['message']?>";
        var type = "<?=$_SESSION['flashAlert']['type']?>";
        
        <?php unset($_SESSION['flashAlert']);?>
            
        switch(type){
            case "success":
                $.notify(msg, "success");
                break;
            case "info":
                $.notify(msg, "info");
                break;
            case "warning":
                $.notify(msg, "warn");
                break;
            default:
                $.notify(msg, "error");
                break;
        }
        
    </script>
<?php endif; ?>
