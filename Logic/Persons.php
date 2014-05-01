<?php

namespace My\Logic;

use Craft\Box\Mog;
use My\Model\Person;
use My\Model\Couple;
use My\Model\Event;
use My\Model\Tree;

class Persons
{


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
     * @return array
     */
    public function edit($id)
    {
        $person = Person::one(['id' => $id]);

        if(!$data = post() and Mog::async()) {
            die(json_encode(false));
        }
        else {

            // save person
            $person->firstnames = $data['firstnames'];
            $person->lastname = $data['lastname'];
            $person->gender = $data['gender'];
            $person->note = $data['notes'];
            Person::save($person);

            // save events
            Event::query()->where('id_person', $person->id)->drop();

            if(isset($data['p-event'])) {
                foreach($data['p-event'] as $p_event) {

                    $event = new Event;
                    $event->id_person = $person->id;
                    $event->what = $p_event['name'];
                    $event->where = $p_event['place'];
                    $event->when = $p_event['date'];
                    Event::save($event);
                }
            }

            // save couples events
            $deleted = [];
            if(isset($data['c-event'])) {
                foreach($data['c-event'] as $id_couple => $c_event) {

                    if(!in_array($id_couple, $deleted)) {
                        Event::query()->where('id_couple', $id_couple)->drop();
                        $deleted[] = $id_couple;
                    }

                    $event = new Event;
                    $event->id_couple = $id_couple;
                    $event->what = $c_event['name'];
                    $event->where = $c_event['place'];
                    $event->when = $c_event['date'];
                    Event::save($event);
                }
            }

            if(Mog::async()) {
                die(json_encode(true));
            }

        }

        go('/tree', $person->id_tree);
    }


    /**
     * Delete person
     * @param int $id
     * @param bool $redirect
     */
    public function delete($id, $redirect = true)
    {
        // get person
        $person = Person::one(['id' => $id]);

        // delete events
        Event::query()->where('id_person', $id)->drop();

        // delete couples
        foreach($person->couples() as $couple) {

            // delete couple's events
            Event::query()->where('id_couple', $couple->id)->drop();

            // delete children
            foreach($couple->children() as $child) {
                $this->delete($child->id, false);
            }

            // delete couple
            Couple::drop($couple->id);
        }

        Person::drop($id);

        if($redirect) {
            go('/tree', $person->id_tree);
        }
    }


    /**
     * Add parents to person
     * @param int $id
     */
    public function addParents($id)
    {
        $person = Person::one(['id' => $id]);
        if($data = post() and !$person->id_parent) {

            // get tree
            $tree = Tree::one($person->id_tree);

            // create person 1
            $p1 = new Person($data['p1-firstnames'], $data['p1-lastname']);
            $p1->id_tree = $person->id_tree;
            $p1->id = Person::save($p1);

            // set new root
            $tree->id_person = $p1->id;
            Tree::save($tree);

            // create person 2
            $p2 = new Person($data['p2-firstnames'], $data['p2-lastname']);
            $p1->id_tree = $person->id_tree;
            $p2->id = Person::save($p2);

            // create parent couple
            $couple = new Couple;
            $couple->id_person = $p1->id;
            $couple->id_spouse = $p2->id;
            $couple->id = Couple::save($couple);

            // update person
            $person->id_parent = $couple->id;
            Person::save($person);
        }

        go('/tree', $person->id_tree);
    }


    /**
     * Add couple to person
     * @param int $id
     */
    public function addCouple($id)
    {
        $person = Person::one(['id' => $id]);
        if($data = post() and !$person->id_parent) {

            // create spouse
            $spouse = new Person($data['firstnames'], $data['lastname']);
            $spouse->id_tree = $person->id_tree;
            $spouse->id = Person::save($spouse);

            // create parent couple
            $couple = new Couple;
            $couple->id_person = $person->id;
            $couple->id_spouse = $spouse->id;
            $couple->id = Couple::save($couple);
        }

        go('/tree', $person->id_tree);
    }


    /**
     * Add child to couple
     * @param int $id
     */
    public function addChild($id)
    {
        $person = Person::one(['id' => $id]);
        if($data = post() and $couples = $person->couples()) {

            // first couple
            $couple = $couples[0];

            // create child
            $child = new Person($data['firstnames'], $data['lastname']);
            $child->id_tree = $person->id_tree;
            $child->id_parent = $couple->id;
            $child->id = Person::save($child);
        }

        go('/tree', $person->id_tree);
    }

} 