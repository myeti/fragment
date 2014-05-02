<!doctype html>
<html>
<head>
    <title><?= $tree->name ?></title>
    <?= self::meta() ?>
    <?= self::css('/public/css/render') ?>
    <?= self::js('/public/js/jquery-2.1.0.min', '/public/js/jquery-ui.min', '/public/js/render') ?>
</head>
<body>

    <section id="paper">

        <div id="tree-container">

            <header>
                <h1><?= $tree->name ?></h1>
            </header>

            <div id="tree">
                <?= $tree->root()->renderOut() ?>
            </div>

        </div>

    </section>

</body>
</html>