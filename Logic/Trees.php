<?php

namespace My\Logic;

use My\Model\Person;
use My\Model\Tree;


/**
 * @auth 1
 */
class Trees
{

    /**
     * Create tree
     * @return array
     */
    public function create()
    {
        if($data = post()) {

            // create tree
            $tree = new Tree;
            $tree->name = $data['name'];
            $tree->id = Tree::save($tree);

            // create first person
            $person = new Person('Première', 'Personne');
            $person->id_tree = $tree->id;
            $person->id = Person::save($person);

            // set root
            $tree->id_person = $person->id;
            Tree::save($tree);

            go('/tree', $tree->id);
        }

        go('/tree');
    }


    /**
     * Show tree
     * @param int $id
     * @render views/trees.show
     * @return array
     */
    public function show($id)
    {
        $trees = Tree::all();
        $tree = Tree::one(['id' => $id]);

        return compact('trees', 'tree');
    }


    /**
     * Edit tree
     * @param int $id
     * @render views/trees.edit
     * @return array
     */
    public function edit($id)
    {
        $tree = Tree::one(['id' => $id]);

        if($data = post()) {
            $tree->name = $data['name'];
            $id = Tree::save($tree);
            go('/tree', $id);
        }

        return compact('tree');
    }


    /**
     * Delete tree
     * @param int $id
     */
    public function delete($id)
    {
        Tree::drop($id);
        go('/tree');
    }




    /**
     * Render tree
     * @render views/trees.render_v
     */
    public function renderV($safe)
    {
        $trees = Tree::all();
        foreach($trees as $tree) {
            if($tree->safename() == $safe) {
                break;
            }
        }

        return compact('tree');
    }

} 