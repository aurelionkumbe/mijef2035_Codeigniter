

<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>YAOUNDE IMMOBILIER</b> <br>console admin</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p hidden class="login-box-msg">Sign in to start your session</p>
         <? if(isset($_SESSION['msg'])) echo $_SESSION['msg'] ?>
        <form action="<?=base_url("console")?>" method="post">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" name="email" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>


    </div>
    <!-- /.login-box-body -->
</div>

<script>
    $(function () {
        $('body').addClass('hold-transition login-page');
    });
</script>
</body>
</html>
