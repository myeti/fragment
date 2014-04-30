<?php

namespace My\Model;

use Craft\Orm\Model;
use Craft\View\Engine;

class Person
{

    use Model;

    /** @var int */
    public $id;

    /** @var string */
    public $firstnames;

    /** @var string */
    public $lastname;

    /** @var int */
    public $gender = 0;

    /** @var string text */
    public $note;

    /** @var int */
    public $id_parent;

    /** @var int */
    public $id_tree;


    /**
     * New person
     * @param $name
     */
    public function __construct($firstnames = null, $lastname = null)
    {
        if($firstnames) {
            $this->firstnames = $firstnames;
        }
        if($lastname) {
            $this->lastname = $lastname;
        }
    }

    /**
     * Get all couples
     * @return Couple[]
     */
    public function couples()
    {
        return Couple::all(['id_person' => $this->id]);
    }

    /**
     * Get events
     * @return Event[]
     */
    public function events()
    {
        return Event::all(['id_person' => $this->id]);
    }

    /**
     * Render tree
     * @return string
     */
    public function render($depth = 1)
    {
        return Engine::forge(__DIR__ . '/views/person', [
            'person' => $this,
            'depth'  => $depth
        ]);
    }

} 