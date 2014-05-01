<?php self::layout('views/layout'); ?>

<div id="modals">

    <div class="modal" id="create-couple">
        <form action="#" method="post">
            <header>Ajouter un couple</header>
            <main>
                <input type="text" name="firstnames" placeholder="Prénom(s) du conjoint"/>
                <input type="text" name="lastname" placeholder="Nom de famille du conjoint"/>
            </main>
            <footer>
                <a class="btn" href="#" data-close>Fermer</a>
                <button type="submit" class="btn btn-primary">Sauvegarder</button>
            </footer>
        </form>
    </div>

    <div class="modal" id="create-child">
        <form action="#" method="post">
            <header>Ajouter un enfant</header>
            <main>
                <input type="text" name="firstnames" placeholder="Prénom(s) de l'enfant"/>
                <input type="text" name="lastname" placeholder="Nom de famille de l'enfant"/>
            </main>
            <footer>
                <a class="btn" href="#" data-close>Fermer</a>
                <button type="submit" class="btn btn-primary">Sauvegarder</button>
            </footer>
        </form>
    </div>

    <div class="modal" id="create-parents">
        <form action="#" method="post">
            <header>Ajouter des parents</header>
            <main>
                <input type="text" name="p1-firstnames" placeholder="Prénom(s) du parent 1"/>
                <input type="text" name="p1-lastname" placeholder="Nom de famille du parent 1"/>
                <input type="text" name="p2-firstnames" placeholder="Prénom(s) du parent 2"/>
                <input type="text" name="p2-lastname" placeholder="Nom de famille du parent 2"/>
            </main>
            <footer>
                <a class="btn" href="#" data-close>Fermer</a>
                <button type="submit" class="btn btn-primary">Sauvegarder</button>
            </footer>
        </form>
    </div>

    <div class="modal" id="edit-tree">
        <form action="#" method="post">
            <header>Modifier l'arbre</header>
            <main>
                <input type="text" name="name" placeholder="Nom de l'arbre" value="<?= $tree->name; ?>"/>
            </main>
            <footer>
                <a class="btn" href="#" data-close>Fermer</a>
                <button type="submit" class="btn btn-primary">Sauvegarder</button>
            </footer>
        </form>
    </div>

</div>

<section id="left">

    <header>
        <a href="<?= url('/') ?>"><i class="fa fa-arrow-circle-o-left"></i></a>
    </header>

</section>

<section id="middle">

    <header>
        <?= $tree->name ?>
        <a href="<?= url('/tree', $tree->id, 'delete') ?>" data-confirm="Etes-vous sûr de vouloir couper cet arbre ? Ce n'est pas très écolo...">
            <i class="fa fa-times"></i>
        </a>
        <a href="<?= url('/tree', $tree->id, 'edit') ?>" data-modal="#edit-tree">
            <i class="fa fa-gear"></i>
        </a>
        <a href="<?= url('/leaf', $tree->safename()) ?>" target="_blank">
            <i class="fa fa-leaf"></i>
        </a>
    </header>

    <ul class="tree">

        <?= $tree->root()->render(); ?>

    </ul>

</section>

<section id="right"></section>

