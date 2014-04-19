<header>
    <h1><?= $tree->name ?></h1>
</header>

<div id="tree">

    <?= $tree->root()->render(); ?>

</div>