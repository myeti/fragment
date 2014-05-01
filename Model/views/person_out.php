<?php if($couples = $person->couples()): $couple = array_shift($couples); $spouse = $couple->spouse();?>

    <div class="child family <?= $couples ? 'has-ex' : null ?>">

        <div class="couple">
            <div class="person" data-gender="<?= $person->gender ? 'f' : 'm' ?>">
                <h2><?= $person->firstname() ?></h2>
                <h3><?= $person->lastname ?></h3>
            </div>
            <div class="and">&amp;</div>
            <div class="person" data-gender="<?= $person->gender ? 'f' : 'm' ?>">
                <h2><?= $spouse->firstname() ?></h2>
                <h3><?= $spouse->lastname ?></h3>
            </div>
        </div>

        <?php if($children = $couple->children()): ?>
        <div class="children">

            <?php foreach($children as $child): ?>
            <?= $child->renderOut(); ?>
            <?php endforeach; ?>

        </div>
        <?php endif; ?>

    </div>

    <?php foreach($couples as $ex): $spouse = $ex->spouse(); ?>
    <div class="ex family">

        <div class="couple">
            <div class="person">&nbsp;</div>
            <div class="and">&amp;</div>
            <div class="person" data-gender="<?= $spouse->gender ? 'f' : 'm' ?>">
                <h2><?= $spouse->firstname() ?></h2>
                <h3><?= $spouse->lastname ?></h3>
            </div>
        </div>

        <?php if($children = $ex->children()): ?>
        <div class="children">

            <?php foreach($children as $child): ?>
                <?= $child->renderOut(); ?>
            <?php endforeach; ?>

        </div>
        <?php endif; ?>

    </div>
    <?php endforeach; ?>

<?php else: ?>

    <div class="child person" data-gender="<?= $person->gender ? 'f' : 'm' ?>">
        <h2><?= $person->firstname() ?></h2>
        <h3><?= $person->lastname ?></h3>
    </div>

<?php endif; ?>