<?php

/**
 * Hello !
 */

require 'vendor/autoload.php';

use Craft\Orm\Syn;
use Craft\App\Bundle;


/**
 * Auth
 */

define('USERNAME', 'Babor');
define('PASSWORD', '3f6f6d7c89d3c8b71750424d1ffc3c481ac351c5');


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
    '/login'    => 'My\Logic\Front::login',
    '/logout'   => 'My\Logic\Front::logout',

    '/tree/create'              => 'My\Logic\Trees::create',
    '/tree/:id/edit'            => 'My\Logic\Trees::edit',
    '/tree/:id/delete'          => 'My\Logic\Trees::delete',
    '/tree/:id'                 => 'My\Logic\Trees::show',

    '/person/:id/edit'          => 'My\Logic\Persons::edit',
    '/person/:id/delete'        => 'My\Logic\Persons::delete',
    '/person/:id/addcouple'     => 'My\Logic\Persons::addCouple',
    '/person/:id/addparents'    => 'My\Logic\Persons::addParents',
    '/person/:id/addchild'      => 'My\Logic\Persons::addChild',
    '/person/:id'               => 'My\Logic\Persons::show',

]);


/**
 * Errors
 */

$app->on(404, function() use($app) {
    $app->to('/lost');
});

$app->on(403, function() use($app) {
    $app->to('/login');
});


/**
 * Let's go !
 */

$app->handle();