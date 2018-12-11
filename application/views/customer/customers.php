<?php $this->view('pagetop'); ?>

    <div class="content">
        <div class="container-fluid">
            <a href="<?=base_url('index.php/customer/add?form=add')?>">Ajouter un client <i class="fa fa-plus" aria-hidden="true"></i></a>
            <table id="table_data" class="hidden">
            <?php foreach($customersList as $customer) 
                {
                    $delUrl = base_url('index.php/customer/del') . '?customerId='
                    . $customer->id;
                    $editUrl = base_url('index.php/customer/edit?form=edit')
                    . '&customerId=' . $customer->id . '&customerName=' . $customer->name;
                    $repportUrl = base_url('index.php/repports') . '?customerId='
                    . $customer->id;
                    $printersUrl = base_url('index.php/printer') . '?customerId='
                    . $customer->id;
                    ?>
                    <tr>
                        <td><?= $customer->id ?></td>
                        <td><?= $customer->name ?></td>
                        <td>
                            <a href="<?= $printersUrl ?>"><i class="fa fa-search"></i></a>
                            <a href="<?= $repportUrl ?>"><i class="fa fa-pie-chart"></i></a>
                        </td>
                        <td><a href="<?= $editUrl ?>"><i class="fa fa-pencil"></i></a></td>
                        <td><a href="<?= $delUrl ?>"><i class="fa fa-trash-o"></i></a></td>
                    </tr>
            <?php } ?>
                </table>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                var rows = document.querySelectorAll('#table_data tbody tr');
                var rowsStr = [];
                for (var i = 0; i < rows.length; i++) {
                    var row = rows[i];
                    var rowStr = [];
                    cells = row.querySelectorAll('td');
                    for (var y = 0; y < cells.length; y++) {
                        var cell = cells[y];
                        rowStr.push(cell.innerHTML);
                    }
                    rowsStr.push(rowStr);
                }
                google.charts.load('current', {'packages':['table']});
                google.charts.setOnLoadCallback(drawTable);

                function drawTable() {
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'ID');
                    data.addColumn('string', 'NOM');
                    data.addColumn('string', 'MACHINES');
                    data.addColumn('string', 'ÉDITER');
                    data.addColumn('string', 'SUPPRIMER');
                    data.addRows(rowsStr);
                    var table = new google.visualization.Table(document.getElementById('table_div'));
                    table.draw(data, {showRowNumber: false, allowHtml: true, width: '30%', height: '100%'});
            }
            </script>
            <div id="table_div"></div>
        </div>
    </div>

<?php $this->view('pagebottom'); ?>