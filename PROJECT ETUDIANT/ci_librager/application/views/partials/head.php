<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title><?=$title.' , '.$siteName?></title>
<meta name="author" content="<?=$author?>">
<meta name="keywords" content="<?=$keywords?>">
<meta name="description" content="<?=$description?>">

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="apple-touch-icon" href="<?= asset_url('icons/apple-touch-icon.png') ?>">

<!-- Place favicon.ico in the root directory -->
<link rel="shortcut icon" href="<?= asset_url('icons/favicon.ico') ?>">        

<!-- Loading font-awesome -->
<link href="<?= asset_url('css/vendor/fa/font-awesome.min.css') ?>" rel="stylesheet">

<!-- Loading Metro UI -->
<!--
<link href="<?= asset_url('css/vendor/metro/metro.min.css') ?>" rel="stylesheet">
<link href="<?= asset_url('css/vendor/metro/metro-responsive.min.css') ?>" rel="stylesheet">
<link href="<?= asset_url('css/vendor/metro/metro-schemes.min.css') ?>" rel="stylesheet">
-->
<link href="<?= asset_url('css/vendor/metro/metro-icons.min.css') ?>" rel="stylesheet">

<!-- Loading Bootstrap -->
<!--
<link href="<?= asset_url('css/vendor/bootstrap/bootstrap.min.css') ?>" rel="stylesheet">
-->
<link href="<?= asset_url('css/vendor/bootstrap/metro-bootstrap.min.css') ?>" rel="stylesheet">
<link rel="stylesheet" href="<?= asset_url('lib/bootstrap-datepicker/bootstrap-datetimepicker.css') ?>">


<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
<script src="<?= asset_url('js/vendor/html5shiv.js') ?>"></script>
<script src="<?= asset_url('js/vendor/respond.min.js') ?>"></script>
<![endif]-->

<!-- Loading Normalizer CSS -->
<link rel="stylesheet" href="<?= asset_url('css/vendor/normalize.css') ?>">
<script src="<?= asset_url('js/vendor/modernizr.min.js') ?>"></script>

<!-- Loading Original -->
<link rel="stylesheet" href="<?= asset_url('css/vendor/boilerplate.css') ?>">

<link rel="stylesheet" href="<?= asset_url('lib/bootstrap-data-table/css/jquery.bdt.min.css') ?>">
<link rel="stylesheet" href="<?= asset_url('lib/TxtEeditor/jquery-te-1.4.0.css') ?>">

<link rel="stylesheet" href="<?= asset_url('lib/easyui/themes/bootstrap/easyui.css') ?>">
<link rel="stylesheet" href="<?= asset_url('lib/easyui/themes/icon.css') ?>">


<link rel="stylesheet" href="<?= asset_url('css/vendor/w3/w3.css') ?>">
<link rel="stylesheet" href="<?= asset_url('css/vendor/w3/w3-theme-green.css') ?>">

<!-- Loading Site CSS -->
<link rel="stylesheet" href="<?= asset_url('css/main.css') ?>">
<script>
/*
INITIALISATION DES VARIABLES GLOBALES
-------------------------------------
*/
var VIEWPATH = '<?php echo VIEWPATH ?>';
var siteUrl = '<?php echo site_url() ?>';
var assetUrl = '<?php echo asset_url() ?>';
var baseUrl = '<?php echo base_url() ?>';
var rootUrl = '<?php echo base_url("../")?>/';
var viewUrl = '<?php echo base_url("../application/views")?>/';

</script>
