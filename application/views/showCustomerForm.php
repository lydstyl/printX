<?php $this->view('pagetop'); ?>

    <div class="content">
        <div class="container-fluid">
            <!-- TODO : Nettoyer ce debug -->
            <!-- <?php print_r($customerInfos) ?> -->
        </div>
        <form action="" method="POST">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- TODO : Régler ce message d'erreur -->
                    <!-- <?php if(isset($_SESSION['error'])){ ?>
                        <div class="alert alert-danger"><?= $_SESSION['error']; ?>
                            Sélectionnez d'abord un client dans la liste.                    
                        </div>
                    <?php } ?> -->

                    <!-- <?php foreach($customerInfos as $info) {?>
                        <div><?php print_r($info) ?></div>
                    <?php } ?> -->
                    <br />
                    <br />
                    <div>Vous avez déjà renseigné <b><?= count($customerInfos) ?> machines</b> dans le dossier de <b><?= $_SESSION['customerName'] ?></b></div><br />
                    <a href="">Afficher un tableau récapitulatif de l'ensemble des machines du client</a>
                    <br />
                    <br />
                    <br />
                    <br />
                    Vous pouvez :
                    <ul>
                        <?php if(count($customerInfos) != 0){ ?>
                        <li>consulter ou modifier la fiche de la machine : 
                            <!-- TODO : feature à faire -->
                            <select name="customerName">
                                <!-- TODO : Mettre le CSS dans un fichier propre -->
                                <option value="" selected style="color: #888; font-style: italic">Sélectionnez une machine</option>
                                <?php foreach($customerInfos as $info) {?>
                                    <option value="<?= $info -> id ?>">
                                        Matricule : <?= $info -> identification_number ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <button class="" name="">Afficher</button>
                        </li>
                        <li>supprimer une machine : 
                            <!-- TODO : Feature à faire -->
                            <select name="customerName">
                                <!-- TODO : Mettre le CSS dans un fichier propre -->
                                <option value="" selected style="color: #888; font-style: italic">Sélectionnez une machine</option>
                                <?php foreach($customerInfos as $info) {?>
                                    <option value="<?= $info -> id ?>">
                                        Matricule : <?= $info -> identification_number ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <button class="" name="">Supprimer</button>
                        </li>
                        <?php } ?>
                        <li><a href="<?=base_url('forms/addPrinter')?>">Ajouter une machine</a></li>
                        <li><a href="#">Afficher directement les graphiques du PRE</a></li>
                    </ul>
                </div>
            </form>
    </div>

<?php $this->view('pagebottom'); ?>