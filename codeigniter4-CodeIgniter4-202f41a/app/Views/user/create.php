<h2><?= esc($title) ?></h2>

<?= session()->getFlashdata('error') ?>
<?= service('validation')->listErrors() ?>

<form action="/user/create" method="post">
    <?= csrf_field() ?>

    <label for="lastname">Nom</label>
    <input type="input" name="lastname"/>

    <label for="firstname">Prénom</label>
    <input type="input" name="firstname"/>

    <label for="birthDate">Date de naissance</label>
    <input type="date" name="birthDate"/>

    <label for="adress">Adresse</label>
    <input type="text" name="adress">

    <label for="postCode">Code postal</label>
    <input type="text" name="postCode">
    
    <label for="phoneNumber">Numéro de téléphone</label>
    <input type="text" name="phoneNumber">

    <select name="" id=""></select>

    <input type="submit" name="submit" value="Create news item" />
</form>