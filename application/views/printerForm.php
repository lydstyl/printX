<?php $this->view('pagetop'); ?>

    <div class="content">
        <div class="container-fluid">
            <form action="<?= $actionUrl ?>" method="POST" class="col col-lg-12">
                <div id="equipment" class="hidden"><?= $equipment ?></div>
                <?php 
                    if (isset($modelId)) {
                ?>
                        <div class="hidden" id="typeId"><?= $typeId ?></div>
                        <div class="hidden" id="brandId"><?= $brandId ?></div>
                        <input name="equipmentId" type="hidden" value="<?= $equipmentId ?>">
                <?php 
                    }
                ?>
                <input id="postType" name="postType" type="hidden" value="<?= $postType ?>">

                <div class="row">     
                    <div class="col-xs-12 col-sm-6">
                        <h4>Matériel</h4>    
                        <?php $this->view('formsGroups/material'); ?>
                    </div>

                    <div class="col col-xs-12 col-sm-6">
                        <h4>Situation</h4> 
                        <?php $this->view('formsGroups/situation'); ?>  
                    </div>
                </div>
                <div class="row">
                    <div class="text-center col col-xs-12">
                        <button class="btn btn-primary"name="register">Enregistrer cette machine</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php $this->view('pagebottom'); ?>