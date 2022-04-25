<h2><?= esc($title) ?></h2>

<?php if (! empty($user) && is_array($user)): ?>

    <?php foreach ($user as $user_item): ?>

        <h3><?= esc($user_item['title']) ?></h3>

        <div class="main">
            <?= esc($user_item['body']) ?>
        </div>
        <p><a href="/user/<?= esc($user_item['slug'], 'url') ?>">View article</a></p>

    <?php endforeach ?>

<?php else: ?>

    <h3>No News</h3>

    <p>Unable to find any news for you.</p>

<?php endif ?>