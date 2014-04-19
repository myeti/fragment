<?php if($couples = $person->couples()): ?>

    <?php $first = array_shift($couples); ?>
    <div class="child family">

        <div class="couple">
            <div class="person">
                <h2><?= $person->firstnames ?></h2>
                <aside>---</aside>
            </div>
            <div class="and">&amp;</div>
            <div class="person">
                <h2><?= $first->spouse()->firstnames ?></h2>
                <aside>---</aside>
            </div>
        </div>

        <?php if($children = $first->children()): ?>
            <div class="children">
                <?php foreach($children as $child): ?>
                <?= $child->render() ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>

    <?php foreach($couples as $couple): ?>

    <div class="ex family">

        <div class="couple">
            <div class="person">&nbsp;</div>
            <div class="and">&amp;</div>
            <div class="person">
                <h2><?= $first->spouse()->firstnames ?></h2>
                <aside>---</aside>
            </div>
        </div>

        <?php if($children = $couple->children()): ?>
            <div class="children">
                <?php foreach($children as $child): ?>
                    <?= $child->render() ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>

    <?php endforeach; ?>

<?php else: ?>

    <div class="child person">
        <h2><?= $person->firstnames ?></h2>
        <aside>---</aside>
    </div>

<?php endif; ?>