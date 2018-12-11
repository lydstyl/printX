<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <title><?= $pageTitle ?></title>
    
    <!-- CSS -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/css/animate.min.css') ?>" rel="stylesheet"/>
    <link href="<?= base_url('assets/css/paper-dashboard.css') ?>" rel="stylesheet"/>
    <link href="<?= base_url('assets/css/themify-icons.css') ?>" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?= base_url('assets/img/favicon.png') ?>">   
     
    <link href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
  </head>
  <body class="<?= $mainClass ?>">
    <div class="wrapper">
        <?php $this->view('sidebar'); ?>
        
        <div class="main-panel">
            <?php $this->view('navbar'); ?>