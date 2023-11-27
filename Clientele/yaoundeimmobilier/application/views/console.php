

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="fr">
<head>
    <?php include_once "admin/head.php" ?>
</head>

<body style="background-image: url('<?=  base_url('images/slider/bg1.jpg') ?>')">



<?php

    if (isset($_SESSION['admin'])) {
    include_once "admin/header.php";

        include_once  "admin/$page.php";

    } else {
        include_once  "admin/login.php";

    }
    ?>

<?php include_once "admin/scripts.php"?>

</body>
</html>