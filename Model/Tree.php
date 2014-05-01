<?php

namespace My\Model;

use Craft\Orm\Model;
use Craft\View\Engine;

class Tree
{

    use Model;

    /** @var int */
    public $id;

    /** @var string */
    public $name;

    /** @var string text */
    public $note;

    /** @var int */
    public $id_person;


    /**
     * New tree
     * @param $name
     */
    public function __construct($name = null)
    {
        if($name) {
            $this->name = $name;
        }
    }


    /**
     * return safe name for url
     * @return mixed
     */
    public function safename()
    {
        $name = strtolower(str_replace(' ', '-', $this->name));
        $name = preg_replace('/[^a-zA-Z0-9-]/', '', $name);
        return $name;
    }


    /**
     * Get root person
     * @return Person
     */
    public function root()
    {
        return Person::one(['id' => $this->id_person]);
    }

} 