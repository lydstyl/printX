<div class="form-group">
    <label for="situation">Localisation :</label>
    <input class="form-control" name="situation" id="situation" type="text" />
</div>
<div class="form-group  insert-form-group">
    <label for="place">Bâtiment :</label>
    <select name="place">
        <option value="0">-- Sélectionnez --</option>        
        <?php foreach($places as $place) {?>
            <option value="<?= $place -> id ?>">
                <?= $place -> name ?>
            </option>
        <?php } ?>
    </select>
    <div class="insert-button"><span class="ti-pencil"></div>
    <div class="insert-block hidden">
        <div class="form-group insert-form">
            <label for="addPlace">Créer un nouveau bâtiment :</label>
            <input class="form-control" name="addPlace" id="addPlace" type="text" placeholder="Bâtiment 1, Tour Lumière, ...">
        </div>
    </div>
    <a id="rm-place" href="<?=base_url('index.php/situation/remove?table=')?>">
        <i class="fa fa-trash-o"></i>
    </a>
</div>
<div class="form-group  insert-form-group">
    <label for="floor">Etage :</label>
    <select name="floor">
        <option value="0">-- Sélectionnez --</option>        
        <?php foreach($floors as $floor) {?>
            <option value="<?= $floor -> id ?>">
                <?= $floor -> name ?>
            </option>
        <?php } ?>
    </select>
    <div class="insert-button"><span class="ti-pencil"></div>
    <div class="insert-block hidden">
        <div class="form-group insert-form">
            <label for="addFloor">Créer un nouvel étage :</label>
            <input class="form-control" name="addFloor" id="addFloor" type="text" placeholder="Etage 1, RDC, ...">
        </div>
    </div>
    <a id="rm-floor" href="<?=base_url('index.php/situation/remove?table=')?>">
        <i class="fa fa-trash-o"></i>
    </a>
</div>
<div class="form-group  insert-form-group">
    <label for="department">Service :</label>
    <select name="department">
        <option value="0">-- Sélectionnez --</option>        
        <?php foreach($departments as $department) {?>
            <option value="<?= $department -> id ?>">
                <?= $department -> name ?>
            </option>
        <?php } ?>
    </select>
    <div class="insert-button"><span class="ti-pencil"></div>
    <div class="insert-block hidden">
        <div class="form-group insert-form">
            <label for="addDepartment">Créer un nouveau service :</label>
            <input class="form-control" name="addDepartment" id="addDepartment" type="text" placeholder="Comptabilité, accueil, ...">
        </div>
    </div>
    <a id="rm-department" href="<?=base_url('index.php/situation/remove?table=')?>">
        <i class="fa fa-trash-o"></i>
    </a>
</div>