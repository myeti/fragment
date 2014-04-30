<?php

/**
 * Hello !
 */

require 'vendor/autoload.php';

use Craft\Orm\Syn;
use Craft\App\Bundle;


/**
 * Database
 */

Syn::SQLite('fragment.db')
    ->map('tree',   'My\Model\Tree')
    ->map('person', 'My\Model\Person')
    ->map('couple', 'My\Model\Couple')
    ->map('event',  'My\Model\Event')
    ->build();

require 'data.php';

/**
 * Routes
 */

$app = new Bundle([

    '/'         => 'My\Logic\Front::hello',
    '/lost'     => 'My\Logic\Front::lost',
    '/sorry'    => 'My\Logic\Front::sorry',

    '/tree/new'             => 'My\Logic\Trees::create',
    '/tree/:id'             => 'My\Logic\Trees::show',
    '/tree/:id/edit'        => 'My\Logic\Trees::edit',
    '/tree/:id/delete'      => 'My\Logic\Trees::delete',

    '/person/new'           => 'My\Logic\Persons::create',
    '/person/:id'           => 'My\Logic\Persons::show',
    '/person/:id/edit'      => 'My\Logic\Persons::edit',
    '/person/:id/delete'    => 'My\Logic\Persons::delete',

    '/couple/new'           => 'My\Logic\Couples::create',
    '/couple/:id'           => 'My\Logic\Couples::show',
    '/couple/:id/edit'      => 'My\Logic\Couples::edit',
    '/couple/:id/delete'    => 'My\Logic\Couples::delete',

    '/event/new'           => 'My\Logic\Events::create',
    '/event/:id'           => 'My\Logic\Events::show',
    '/event/:id/edit'      => 'My\Logic\Events::edit',
    '/event/:id/delete'    => 'My\Logic\Events::delete',

]);


/**
 * Errors
 */

$app->on(404, function() use($app) {
    $app->to('/lost');
});

$app->on(403, function() use($app) {
    $app->to('/sorry');
});


/**
 * Let's go !
 */

$app->handle();