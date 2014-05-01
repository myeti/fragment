<?php self::layout('views/layout'); ?>

<div id="modals">

    <div class="modal" id="create-couple">
        <header>Ajouter une relation</header>
        <main>
            <input type="text" name="firstnames" placeholder="Prénom(s)"/>
            <input type="text" name="lastname" placeholder="Nom de famille"/>
        </main>
        <footer>
            <a class="btn btn-primary" href="#">Sauvegarder</a>
        </footer>
    </div>

    <div class="modal" id="create-child">
        <header>Ajouter un enfant</header>
        <main>
            <input type="text" name="firstnames" placeholder="Prénom(s)"/>
            <input type="text" name="lastname" placeholder="Nom de famille"/>
        </main>
        <footer>
            <a class="btn btn-primary" href="#">Sauvegarder</a>
        </footer>
    </div>

    <div class="modal" id="create-parents">
        <header>Ajouter des parents</header>
        <main>
            <input type="text" name="firstnames" placeholder="Prénom(s)"/>
            <input type="text" name="lastname" placeholder="Nom de famille"/>
        </main>
        <footer>
            <a class="btn btn-primary" href="#">Sauvegarder</a>
        </footer>
    </div>

</div>

<section id="left">

    <header>
        <a href="<?= url('/') ?>"><i class="fa fa-arrow-circle-o-left"></i></a>
    </header>

</section>

<section id="middle">

    <header><?= $tree->name ?></header>

    <ul class="tree">

        <?= $tree->root()->render(); ?>

    </ul>

</section>

<section id="right"></section>

