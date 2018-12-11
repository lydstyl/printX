<?php $this->view('pagetop'); ?>

    <div class="content">
        <div class="container-fluid">
            <a href="<?=base_url('index.php/forms/newCustomer')?>">Entrer un nouveau client (lien temporaire, ce sera un bouton)</a><br />
            <a href="<?=base_url('index.php/forms/selectClient')?>">Commencer ou poursuivre un PRE(lien temporaire, ce sera un bouton dans le tableau)</a><br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <div>Ici viendra un tableau avec les 15 derniers clients</div>
        </div>
    </div>

<?php $this->view('pagebottom'); ?>