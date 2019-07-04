<!DOCTYPE html>
<html>
<head>
  <title><?= $title ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/common.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Bitter&display=swap" rel="stylesheet"> 

    <?php
    if($title=="StudentRegister" || $title=="StudentUpdate"){
    ?>
    	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/student_validate.js"></script>
    <?php
    }
    if($title=="SchoolDrive"){
    ?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
    <?php } ?>
</head>