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
     * @param string $firstnames
     * @param string $lastname
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
     * Get full shortname
     * @return string
     */
    public function fullname()
    {
        return $this->firstnames . ' ' . $this->lastname;
    }

    /**
     * Get full shortname
     * @return string
     */
    public function shortname()
    {
        $firstnames = explode(' ', $this->firstnames);
        return $firstnames[0] . ' ' . $this->lastname;
    }

    /**
     * Check if lineage or spouse
     * @return bool
     */
    public function isSpouse()
    {
        return (bool)Couple::one(['id_spouse' => $this->id]);
    }

    /**
     * Get all couples
     * @return Couple[]
     */
    public function couples()
    {
        return $this->isSpouse()
            ? Couple::all(['id_spouse' => $this->id])
            : Couple::all(['id_person' => $this->id]);
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
    public function render()
    {
        return Engine::forge(__DIR__ . '/views/person', ['person' => $this]);
    }

} 