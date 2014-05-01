<?php self::layout('views/layout'); ?>

<div id="modals">
    <div class="modal" id="create-tree">
        <form action="#" method="post">
            <header>Créer un arbre</header>
            <main>
                <input type="text" name="name" placeholder="Nom de l'arbre" required/>
            </main>
            <footer>
                <a class="btn" href="#" data-close>Fermer</a>
                <button type="submit" class="btn btn-primary">Créer</button>
            </footer>
        </form>
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

    </ul>

    <a class="btn btn-primary add-tree" href="<?= url('/tree/create') ?>" data-modal="#create-tree">
        Nouvel arbre
    </a>

</section>