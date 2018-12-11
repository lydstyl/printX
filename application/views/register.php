<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- TODO : Ce title doit être envoyé depuis le controller -->
    <title>Enregistrer un nouveau compte</title>
    
    <!-- CSS -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
	<link rel="icon" type="image/png" sizes="96x96" href="<?= base_url('assets/img/favicon.png') ?>">
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/css/animate.min.css') ?>" rel="stylesheet"/>
    <link href="<?= base_url('assets/css/paper-dashboard.css') ?>" rel="stylesheet"/>
    <link href="<?= base_url('assets/css/themify-icons.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
  </head>
  <body class="register">
    <div class="wrapper">
        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                    <form action="" method="POST">
                        <div class="col-lg-8 col-lg-offset-2">
                            <h1>Enregistrer un nouveau compte</h1>
                            <?php if(isset($_SESSION['success'])){ ?>
                                <div class="alert alert-success"> <?= $_SESSION['success']; ?></div>
                            <?php } ?>
                            <?= validation_errors('<div class="alert alert-danger">','</div>'); ?>
                            <div class="form-group">
                                <label for="username">Nom d'utilisateur :</label>
                                <input class="form-control" name="username" id="username" type="text" />
                            </div>
                            <div class="form-group">
                                <label for="email">Adresse email :</label>
                                <input class="form-control" name="email" id="email" type="text" placeholder="exemple@naxan.fr" />
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe :</label>
                                <input class="form-control" name="password" id="password" type="password" placeholder="Au minimum 8 caractères" />
                            </div>
                            <div class="form-group">
                                <label for="password">Confirmation du mot de passe :</label>
                                <input class="form-control" name="password-confirm" id="password" type="password" />
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary"name="register">Enregistrer le nouvel utilisateur</button>
                                <div class="connect">
                                    <a href="<?=base_url('index.php/auth/login')?>">Se connecter</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets/js/jquery-1.10.2.js') ?>" type="text/javascript"></script>
	<script src="<?= base_url('assets/js/bootstrap.min.js') ?>" type="text/javascript"></script>
	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="<?= base_url('assets/js/bootstrap-checkbox-radio.js') ?>"></script>
	<!--  TODO : Charts Plugin from theme à conserver ?-->
	<script src="<?= base_url('assets/js/chartist.min.js') ?>"></script>
    <!--  Notifications Plugin    -->
    <script src="<?= base_url('assets/js/bootstrap-notify.js') ?>"></script>
    <!--  Google Maps Plugin --><!-- TODO : Fixer les erreurs consoles mais voir si maps sera utilisé ou pas avant. -->
    <!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script> -->
    <!--  User toolbar logic -->
	<script src="<?= base_url('assets/js/paper-dashboard.js') ?>"></script>
    <!-- TODO : Quelle est l'utilité de ce JS ? Il était balancé avec Bootstrap avant l'installation du thème -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script> -->
  </body>
</html>