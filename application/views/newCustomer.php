<?php $this->view('pagetop'); ?>

    <div class="content">
        <div class="container-fluid">
            <form action="" method="POST">
                        <div class="col-lg-8 col-lg-offset-2">
                            <h3>Enregistrer un nouveau client</h3>
                            <?php if(isset($_SESSION['success'])){ ?>
                                <div class="alert alert-success"> <?= $_SESSION['success']; ?><br />
                                    Vous pouvez déjà commencer la saisie du <a href="">PRE</a> !
                                </div>
                            <?php }else if(isset($_SESSION['error'])){ ?>
                                <div class="alert alert-danger"> <?= $_SESSION['error']; ?></div>
                            <?php } ?>
                            <?= validation_errors('<div class="alert alert-danger">','</div>'); ?>
                            <div class="form-group">
                                <label for="customerName">Nom du client :</label>
                                <input class="form-control" name="customerName" id="customerName" type="text" />
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary"name="registerCustomer">Enregistrer le nouveau client</button>
                            </div>
                        </div>
                    </form>
        </div>
    </div>

<?php $this->view('pagebottom'); ?>