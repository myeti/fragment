<li data-node="<?= $person->id ?>">

    <a href="<?= url('/person', $person->id) ?>" class="name"><?= $person->firstnames ?> <?= $person->lastname ?></a>

    <?php if($couples = $person->couples()): ?>
    <ul class="spouses">

        <?php foreach($couples as $couple): $spouse = $couple->spouse();?>
        <li>

            <a href="<?= url('/person', $spouse->id) ?>" class="name"><i>&amp;</i> <?= $spouse->firstnames ?> <?= $spouse->lastname ?></a>

            <?php if($children = $couple->children()): ?>
            <ul class="children">

                <?php foreach($children as $child) echo $child->render(); ?>

            </ul>
            <?php endif; ?>

        </li>
        <?php endforeach; ?>

    </ul>
    <?php endif; ?>

</li>