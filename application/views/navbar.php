<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle">
                <span class="sr-only">Déployer le menu</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>
            <!-- TODO : Gérer le lien -->
            <h1><a class="navbar-brand" href="#"><?= $pageTitle ?></a></h1> 
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <!-- TODO : Que faire avec cette icône ? -->
                <!-- <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="ti-panel"></i>
                        <p>Stats</p>
                    </a>
                </li> -->
                <!-- TODO : Intérêt des notifications ? -->
                <!-- <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="ti-bell"></i>
                            <p class="notification">2</p>
                            <p>Notifications</p>
                            <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">TODO</a></li>
                        <li><a href="#">TODO</a></li>
                    </ul>
                </li> -->
                <li>
                    <!-- TODO : Gérer le lien -->
                    <a href="<?=base_url('index.php/user/profile')?>">
                        <i class="ti-user"></i>
                        <p>Profil utilisateur</p>
                    </a>
                </li>
                <li>
                    <!-- TODO : Gérer le lien -->
                    <a href="<?=base_url('index.php/auth/logout')?>">
                        <i class="ti-shift-right"></i>
                        <p>Déconnexion</p>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</nav>