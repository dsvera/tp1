

<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Age</th>
            <th>Adresse</th>
            <th>Numéro de téléphone</th>
            <th>Service</th>
        </tr>
    </thead>
    <tbody>
        <tr>
<?php if (! empty($user) && is_array($user)): ?>
    <?php foreach ($user as $user_item): ?>
        <td><?= esc($user_item['lastname']) ?></td>
        <td><?= esc($user_item['firstname']) ?></td>
        <td><?= esc($user_item['birthDate']) ?></td>
        <td><?= esc($user_item['adress']) ?></td>
        <td><?= esc($user_item['phoneNumber']) ?></td>
        <td><?= esc($user_item['id_service']) ?></td>
    <?php endforeach ?>
    </tr>
    </tbody>
</table>

<?php else: ?>

    <h3>No News</h3>

    <p>Unable to find any news for you.</p>

<?php endif ?>