<?php

namespace My\Model;

use Craft\Orm\Model;

class Event
{

    use Model;

    /** @var int */
    public $id;

    /** @var int */
    public $id_person;

    /** @var int */
    public $id_couple;

    /** @var string */
    public $what;

    /** @var string */
    public $where;

    /** @var string */
    public $when;

} 