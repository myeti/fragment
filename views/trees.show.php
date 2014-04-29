<?php self::layout('views/layout'); ?>

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

