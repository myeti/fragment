<?php self::layout('views/layout'); ?>

<div class="modals">
    <div class="modal" id="create-tree">

    </div>
</div>

<section id="welcome">

    <header>Fragment</header>

    <ul id="trees">

        <?php foreach($trees as $subtree): ?>
        <li>
            <a href="<?= url('/tree', $subtree->id); ?>">
                <i class="fa fa-leaf"></i>
                <?= $subtree->name ?>
            </a>
        </li>
        <?php endforeach; ?>

        <li class="add">
            <a href="<?= url('/tree/create'); ?>">
                <i class="fa fa-plus"></i> Nouvel arbre
            </a>
        </li>

    </ul>

</section>