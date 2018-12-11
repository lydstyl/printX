<div class="sidebar" data-background-color="white" data-active-color="danger">
    <div class="sidebar-wrapper">
        <div class="logo">
            <!-- TODO : Gérer le lien -->
            <a href="<?= base_url('index.php/customer') ?>" class="naxan-logo"></a>
        </div>

        <ul class="nav">
            <li class="<?php if($mainClass == "home"){ echo "active";} ?>">
                <!-- TODO : Gérer le lien -->
                <a href="<?=base_url('index.php/home')?>">
                    <i class="ti-direction-alt"></i>
                    <p>Accueil</p>
                </a>
            </li>
            <li class="<?php if($mainClass == "forms"){ echo "active";} ?>">
                <a href="<?=base_url('index.php/customer')?>">
                    <i class="ti-layout-menu-v"></i>
                    <p>Données client</p>
                </a>
            </li>
            <li class="<?php if($mainClass == "repports"){ echo "active";} ?>">
                <a href="#">
                    <i class="ti-bar-chart"></i>
                    <p>Afficher rapports</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="ti-stats-up"></i>
                    <p>Tableau de bord</p>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="ti-settings"></i>
                    <p>Administration</p>
                </a>
            </li>
        </ul>
    </div>
</div>