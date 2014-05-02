<?php

namespace My\Model;

use Craft\Orm\Model;
use Craft\View\Engine;

class Couple
{

    use Model;

    /** @var int */
    public $id;

    /** @var int */
    public $id_person;

    /** @var int */
    public $id_spouse;


    /**
     * Get person
     * @return Person
     */
    public function person()
    {
        return Person::one(['id' => $this->id_person]);
    }

    /**
     * Get spouse
     * @return Person
     */
    public function spouse()
    {
        return Person::one(['id' => $this->id_spouse]);
    }

    /**
     * Get children
     * @return Person[]
     */
    public function children()
    {
        return Person::all(['id_parent' => $this->id]);
    }

    /**
     * Get events
     * @return Event[]
     */
    public function events()
    {
        return Event::all(['id_couple' => $this->id]);
    }

} 