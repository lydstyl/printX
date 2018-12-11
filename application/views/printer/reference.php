<?php $this->view('pagetop'); ?>

    <div class="content">
        <div class="container-fluid">

            <!-- Bellow the button add -->
            <a href="<?=base_url('index.php/reference?do=add')?>">Ajouter une référence<i class="fa fa-plus" aria-hidden="true"></i></a>
            <!-- Bellow the urls for button duplicate, edit and del that will be in every rows of the table -->
            <a class="hidden" href="<?=base_url('index.php/reference?do=duplicate')?>">duplicate</a>
            <a class="hidden" href="<?=base_url('index.php/reference?do=edit')?>">edit</a>
            <a class="hidden" href="<?=base_url('index.php/reference?do=del')?>">del</a>
            <!-- Bellow the data from bdd div and the div where will be the table -->
            <div id="table_div_data" class="hidden"><?= $fromBdd ?></div>
            <div id="table_div"></div>
            <!-- The 3 scripts needed to draw the table -->
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                var tableOptions = tO = {
                    tableDivDataId: 'table_div_data', // where to find the data from the bdd
                    tableDivId: 'table_div', // where will be the table
                    showRowNumber: {
                        show: true, 
                        columnName: 'Numéro de ligne'
                    },
                    showButtons: true, // should we show the buttons duplicate, edit and del ?
                    showId: true, // TODO change this to showFirstColumn (not always the id)
                    firstUrlParam: '&refId='
                }
            </script>
            <!-- we will reuse the printer/drawTable here -->
            <script src="<?= base_url('assets/js/printer/drawTable.js') ?>" type="text/javascript"></script>

        </div>
    </div>

<?php $this->view('pagebottom'); ?>