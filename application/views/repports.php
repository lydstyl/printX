<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $this->view('pagetop'); 
?>

<div class="content">
    <div class="container-fluid">
        <h1>PRE du client id = <?= $customerId ?></h1>
        <h2>Inventaire materiel de la plateforme d'impression</h2>
            <h3>Implantation des équipements</h3>
            <div id="table1_div_data" class="hidden"><?= $fromBdd ?></div>
            <div id="table1_div"></div>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                var globalOptions = gO = {
                    width: 800
                } 
                var tableOptions = tO = {
                    tableDivDataId: 'table1_div_data',
                    tableDivId: 'table1_div',
                    showRowNumber: {
                        show: true, 
                        columnName: 'No materiel'
                    },
                    showButtons: false,
                    showId: false
                }
            </script>
            <script src="<?= base_url('assets/js/printer/drawTable.js') ?>" type="text/javascript"></script>
            <!-- TODO virer index.php dans les urls et vérifier que ça marche toujours -->
            
            <h3>Répartition des équipements</h3>
            <p>Nombre total d'équipements: <span id="totalCount">?</span></p>
            <div id="chart_div"></div>
            <script src="<?= base_url('assets/js/chart1.js') ?>"></script>
            
            <h3>Age du parc</h3>
            <p>To do : ce graphique est en dur, le connecter à la base de données.</p>
            <p>Moyenne d'âge du parc: <span id="parcAgeAverage">?</span></p>
            <div id="chartParcAge"></div>
            <script src="<?= base_url('assets/js/chartParcAge.js') ?>"></script>
            
            <h3>Répartition des marques</h3>
            <p>Nombre de marques: <span id="brandCount">?</span></p>
            <div id="brandDivision"></div>
            <script src="<?= base_url('assets/js/brandCount.js') ?>"></script>
            
            <h3>Répartition des références</h3>
            <p>Nombre de références: <span id="refCount">?</span></p>
            <div id="refDivision"></div>
            <script src="<?= base_url('assets/js/refDivision.js') ?>"></script>

        <h2>Inventaire technique de la plateforme d'impression</h2>
            <h3>Caractéristiques techniques</h3>
            <script src="<?= base_url('assets/js/inventory.js') ?>"></script>
            <div id="inventory"></div>

        <h2>Volume d'impressions de la plateforme d'impression</h2>
            <h3>Volume d’impressions</h3>
            <script src="<?= base_url('assets/js/volume1.js') ?>"></script>
            <div id="volume1" style="width: 900px; height: 500px;"></div>

            <h3>Répartition des volumes d’impressions</h3>
            <script src="<?= base_url('assets/js/volume2.js') ?>"></script>
            <div id="volume2"></div>

        <h2>Charges financières de la plateforme d'impression</h2>
            <h3>Charges fixes</h3>
            <script src="<?= base_url('assets/js/charge1.js') ?>"></script>
            <div id="charge1" style="width: 900px; height: 500px;"></div>

            <h3>Charges variables</h3>
            <script src="<?= base_url('assets/js/charge2.js') ?>"></script>
            <div id="charge2" style="width: 900px; height: 500px;"></div>

        <h2>Cout total de possession (TCO)</h2>
            <h3>Coût total de possession (TCO) de votre plateforme actuelle</h3>
            <script src="<?= base_url('assets/js/cost1.js') ?>"></script>
            <div id="cost1" style="width: 900px; height: 500px;"></div>

            <h3>Coût total de possession (TCO) avec l’intervention de NAXAN</h3>
            <script src="<?= base_url('assets/js/cost2.js') ?>"></script>
            <div id="cost2"></div>
    </div>
</div>

<?php $this->view('pagebottom'); ?>