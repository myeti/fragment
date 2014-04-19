<?php self::layout('views/layout'); ?>

<h1>ARBRES</h1>

<ul>
    <?php foreach($trees as $tree): ?>
    <li><?= $tree->id, ': ', $tree->name ?></li>
    <?php endforeach; ?>
</ul>