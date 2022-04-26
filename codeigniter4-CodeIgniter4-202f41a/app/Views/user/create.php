<h2><?= esc($title) ?></h2>

<?= session()->getFlashdata('error') ?>
<?= service('validation')->listErrors() ?>

<form action="/user/create" method="post">
    <?= csrf_field() ?>
    <div class="row">
        <label class="col-2 m-1" for="lastname">Nom</label>
        <input class="col-2 m-1" type="input" name="lastname" />
    </div>
    <div class="row">
        <label class="col-2 m-1" for="firstname">Prénom</label>
        <input class="col-2 m-1" type="input" name="firstname" />
    </div>
    <div class="row">
        <label class="col-2 m-1" for="birthDate">Date de naissance</label>
        <input class="col-2 m-1" type="date" name="birthDate" />
    </div>
    <div class="row">
        <label class="col-2 m-1" for="adress">Adresse</label>
        <input class="col-2 m-1" type="text" name="adress">
    </div>
    <div class="row">
        <label class="col-2 m-1" for="postCode">Code postal</label>
        <input class="col-2 m-1" type="text" name="postCode">
    </div>
    <div class="row">
        <label class="col-2 m-1" for="phoneNumber">Numéro de téléphone</label>
        <input class="col-2 m-1" type="text" name="phoneNumber">
    </div>
    <div class="row">
        <label class="col-2 m-1" for="id_service">Service</label>
        <select class="col-2 m-1" name="id_service">
            <option selected>Service</option>
            <?php foreach ($service as $service_item) : ?>
                
                <option value="<?= esc($service_item['id']) ?>"><?= esc($service_item['serviceName'])?></option>
            <?php endforeach ?>
        </select>
    </div>
    <input type="submit" name="submit" class="btn btn-dark" value="Creation du profil" />
</form>