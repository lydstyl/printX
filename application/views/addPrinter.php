Cette page est devenu inutile



<?php $this->view('pagetop'); ?>

    <div class="content container">
        <div class="row">
            <form action="" method="POST" class="col col-lg-12">
                <div class="row">     
                    <div class="col-xs-12" style="border: 1px dashed black">
                        <h4>Notes pour Cyriloup</h4>    
                        Regardes l'url de cette page --> tu peux choper les id en GET<br>
                        Si tu viens du bouton pour ajouter un equipement alors tu auras customerId<br>
                        Si tu viens du boutton éditer, tu auras l'equipementId (tu retrouveras donc les id customer, marques, modèle et autres à patir de là). <br>
                        Pour les boutons duplicate et supprimer, c'est moi qui gère. Bisous vieux fou.
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4" style="border: 1px dashed black">
                        <h4>Matériel</h4>    
                        <?php $this->view('formsGroups/material'); ?>
                    </div>

                    <div class="col col-xs-12 col-sm-6 col-md-4" style="border: 1px dashed black">
                        <h4>Situation</h4> 
                        <?php $this->view('formsGroups/situation'); ?>  
                    </div>

                    <div class="col col-xs-12 col-sm-6 col-md-4" style="border: 1px dashed black">
                        <h4>Options</h4>
                    </div>

                    <div class="col col-xs-12 col-sm-6 col-md-4" style="border: 1px dashed black">
                        <h4>Acquisition</h4>
                    </div>

                    <div class="col col-xs-12 col-sm-6 col-md-4" style="border: 1px dashed black">
                        <h4>Maintenance</h4>
                    </div>

                </div>
                <div class="row">
                    <div class="text-center col col-xs-12" style="margin-top: 50px">
                        <button class="btn btn-primary"name="register">Enregistrer cette machine</button>
                    </div>
                </div>

            </form>
        </div>

<?php $this->view('pagebottom'); ?>