<?php self::layout('views/layout'); ?>

<section id="left">

    <header>
        Fragment
        <a href="#"><i class="fa fa-leaf"></i></a>
    </header>

    <ul id="trees">
        <?php foreach($trees as $subtree): ?>
        <li>
            <a href="<?= url('/tree', $subtree->id); ?>"><?= $subtree->name ?></a>
        </li>
        <?php endforeach; ?>
    </ul>

</section>

<section id="middle"></section>
<section id="right"></section>