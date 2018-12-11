<?php $this->view('pagetop'); ?>

    <div class="content">
        <div class="container-fluid">
            <form method="post" action="<?= $action ?>">
                <div class="row">     
                    <div class="col-xs-12 col-md-6">
                        <div class="form-group insert-form-group">
                            <label for="type">Type :</label>
                            <select name="type">
                                    <option value="0">-- Sélectionnez --</option>
                                <?php foreach($allTypes as $type) {?>
                                    <option value="<?= $type -> id ?>" <?php if(isset($editingRefTypeId) && $editingRefTypeId == $type -> id) echo 'selected'; ?> >
                                        <?= $type -> name ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <div class="insert-button"><span class="ti-pencil"></div>
                            <div class="insert-block hidden">
                                <div class="form-group insert-form">
                                    <label for="addType">Créer un nouveau type :</label>
                                    <input class="form-control" name="addType" id="addType" type="text" placeholder="Imprimante, MFP, ...">
                                </div>
                            </div>
                        </div>
                        <div class="form-group  insert-form-group">
                            <label for="brand">Marque :</label>
                            <select name="brand">
                                <option value="0">-- Sélectionnez --</option>        
                                <?php foreach($allBrands as $brand) {?>
                                    <option value="<?= $brand -> id ?>" <?php if(isset($editingRefBrandId) && $editingRefBrandId == $brand -> id) echo 'selected'; ?> >
                                        <?= $brand -> name ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <div class="insert-button"><span class="ti-pencil"></div>
                            <div class="insert-block hidden">
                                <div class="form-group insert-form">
                                    <label for="addbrand">Créer une nouvelle marque :</label>
                                    <input class="form-control" name="addbrand" id="addbrand" type="text" placeholder="Epson, Canon, ...">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="reference">Référence constructeur de l'appareil :</label>
                            <input class="form-control" name="reference" id="reference" type="text" 
                                    value="<?php if(isset($editingReference) && $editingReference) echo $editingReference; ?>"
                                    placeholder="ex : WCP7235, fsc2525, ...">
                        </div>
                        <div class="text-center col col-xs-12">
                            <button class="btn btn-primary" name="register">
                                <i class="fa fa-floppy-o" aria-hidden="true"></i>Enregistrer
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php $this->view('pagebottom'); ?>