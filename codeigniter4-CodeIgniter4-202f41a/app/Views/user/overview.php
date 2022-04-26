<p>Recherche : </p>
<div class="row mb-3">
    <select class="col-3 m-2">
        <option selected>Service</option>
        <?php foreach ($service as $service_item) : ?>
            <option value="<?= esc($service_item['id']) ?>"><?= esc($service_item['serviceName']) ?></option>
        <?php endforeach ?>
    </select>
    <button class="col-2 m-2 btn btn-dark">Recherche</button>
</div>
<h2 class="mt-5">Liste : </h2>
<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Age</th>
            <th>Adresse</th>
            <th>Numéro de téléphone</th>
            <th>Service</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($user) && is_array($user)) :
            $today = date("Y-m-d"); ?>
            <?php foreach ($user as $user_item) : ?>
                <tr>
                    <td><?= esc($user_item['lastname']) ?></td>
                    <td><?= esc($user_item['firstname']) ?></td>
                    <?php $diff = date_diff(date_create($user_item['birthDate']), date_create($today)) ?>
                    <td><?= $diff->format('%y') ?></td>
                    <td><?= esc($user_item['adress']) ?></td>
                    <td><?= esc($user_item['phoneNumber']) ?></td>
                    <td><?= esc($user_item['serviceName']) ?></td>
                    <td>
                        <form method="post">
                            <input type="hidden" id="idDelete" name="idDelete" value="<?= esc($user_item['id']) ?>">
                            <input type="submit" class="btn btn-danger text-black" value="supprimer" name="inputDelete">
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
    </tbody>
</table>
<p>Ajouter un utilisateur <a href="user/create" class="btn btn-warning">ici</a></p>
<?php else : ?>

    <h3>Liste introuvable</h3>

<?php endif ?>