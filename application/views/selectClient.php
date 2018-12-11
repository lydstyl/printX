<?php $this->view('pagetop'); ?>

    <div class="content">
        <div class="container-fluid">
            Içi on selectionne un client, cette page est temporaire et sera fusionné avec la précédente, celle du tableau<br />
            <!-- TODO : A supprimer après le debug -->
            <!-- <?php print_r($_POST) ?> -->
            <br />
            <form action="" method="POST">
                <div class="col-lg-8 col-lg-offset-2">
                    <?php if(isset($_SESSION['error'])){ ?>
                        <div class="alert alert-danger"><?= $_SESSION['error']; ?>
                            Sélectionnez d'abord un client dans la liste.                    
                        </div>
                    <?php } ?>
                    <select name="customerName">
                        <!-- TODO : Mettre le CSS dans un fichier propre -->
                        <option value="" selected style="color: #888; font-style: italic">Sélectionnez un client</option>
                        <?php foreach($customersList as $customer) {?>
                            <option value="<?= $customer->name ?>">
                                <?= $customer->name ?>
                            </option>
                        <?php } ?>
                    </select>
                    <div class="text-center">
                        <button class="btn btn-primary" name="customerChosen">Afficher et modifier le PRE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php $this->view('pagebottom'); ?>