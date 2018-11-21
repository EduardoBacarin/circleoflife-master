<?php
	$theme_path = THEMEPATH;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <!-- Title and other stuffs -->
  <title><?php echo $Title; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Circle of Life Portal">
  <meta name="keywords" content="Circle of Live, Life Coaching, Coach  ">
  <meta name="author" content="Lumar Motta Motta">


    <link rel="shortcut icon" href="assets/img/logo.png" type="image/ico"
	<link rel="stylesheet" href="<?php echo $theme_path;?>assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo $theme_path;?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $theme_path;?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo $theme_path;?>assets/css/site/plot.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,800,700,300' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=BenchNine:300,400,700' rel='stylesheet' type='text/css'>
	<script src="<?php echo $theme_path;?>assets/js/modernizr.js"></script>
	<!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

    <input type="hidden" id="base_url" value="<?= base_url()?>"/>
    <input type="hidden" id="focus" value=""/>

</head>
