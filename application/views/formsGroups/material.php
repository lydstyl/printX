<div class="form-group">
    <label for="username">Matricule matériel (le nom chez le client) :</label>
    <input class="form-control" name="username" id="username" type="text" />
    <!-- <small id="passwordHelpBlock" class="text-muted" style="color: green">
        Ceci est un petit texte d'aide à la saisie du champ que l'on peut éventuellement afficher quand le champ prend le focus et cacher au blur
    </small> -->
</div>
<div class="form-group">
    <label for="model">Modèle :</label>
    <select name="model">
        <?php foreach($models as $model) {?>
            <option value="<?= $model -> id ?>">
                <?= $model -> brand_ref ?>
            </option>
        <?php } ?>
    </select>
    <a target="_blank" href="<?=base_url('index.php/reference')?>"><span class="ti-pencil"></a>
</div>

<div class="form-group">
    <div id='tagsFromBdd' class="hidden">
        <?php 
            $json = json_encode ($refsWithBrand);
            echo $json;
        ?>
    </div>
    <label for="model">ou via l'autocompletion :</label>
    <input id="tags" type="text">
</div>