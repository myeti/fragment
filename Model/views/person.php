<li data-node="<?= $person->id ?>">

    <div class="name"><?= $person->firstnames ?> <?= $person->lastname ?></div>
    <ul class="actions">
        <li><a href="<?= url('/person', $person->id) ?>" class="edit-person">Modifier infos</a></li>

        <?php if(!$person->id_parent): ?>
        <li><a href="" class="add-parents">Ajouter parents</a></li>
        <?php endif; ?>

        <li><a href="#" class="add-couple">Ajouter couple</a></li>
        <li><a href="<?= url('/person', $person->id, 'delete') ?>" class="del-person">Supprimer</a></li>
    </ul>

    <?php if($couples = $person->couples()): ?>
    <ul class="spouses">

        <?php foreach($couples as $couple): $spouse = $couple->spouse();?>
        <li>

            <div class="name"><?= $spouse->firstnames ?> <?= $spouse->lastname ?></div>
            <ul class="actions">
                <li><a href="<?= url('/person', $spouse->id) ?>" class="edit-person">Modifier infos</a></li>
                <li><a href="" class="add-child">Ajouter enfant</a></li>
                <li><a href="<?= url('/person', $spouse->id, 'delete') ?>">Supprimer</a></li>
            </ul>

            <?php if($children = $couple->children()): ?>
            <ul class="children">

                <?php foreach($children as $child) $child->render(); ?>

            </ul>
            <?php endif; ?>

        </li>
        <?php endforeach; ?>

    </ul>
    <?php endif; ?>

</li>