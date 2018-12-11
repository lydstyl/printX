<?php $this->view('pagetop'); ?>

    <div class="content">
        <div class="container-fluid">
            <?php if(isset($_SESSION['success'])){ ?>
                <div class="alert alert-success"> <?= $_SESSION['success']; ?></div>
            <?php } ?>
            <br />
            <!-- TODO :  Créer içi des options pour charger les données du profil. -->
            <p>Bonjour <span class="username"><?= $_SESSION['username'] ?></span> !</p>
            
        </div>
    </div>

<?php $this->view('pagebottom'); ?>