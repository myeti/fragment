<?php

namespace My\Logic;

use My\Model\Person;

class Persons
{

    /**
     * Create person
     * @render views/persons.create
     * @return array
     */
    public function create()
    {
        $person = new Person;

        if($data = post()) {
            hydrate($person, $data);
            $id = Person::save($person);
            go('/tree', $data['id_tree']);
        }

        return compact('person');
    }


    /**
     * Show person
     * @param int $id
     * @render views/persons.show
     * @return array
     */
    public function show($id)
    {
        $person = Person::one(['id' => $id]);

        return compact('person');
    }


    /**
     * Edit person
     * @param int $id
     * @render views/persons.edit
     * @return array
     */
    public function edit($id)
    {
        $person = Person::one(['id' => $id]);

        if($data = post()) {
            hydrate($person, $data);
            $id = Person::save($person);
            go('/person', $id);
        }

        return compact('person');
    }


    /**
     * Delete person
     * @param int $id
     */
    public function delete($id)
    {
        Person::drop($id);
        go('/person');
    }

} 