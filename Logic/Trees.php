<?php

namespace My\Logic;

use My\Model\Tree;

class Trees
{

    /**
     * Create tree
     * @render views/trees.create
     * @return array
     */
    public function create()
    {
        $tree = new Tree;

        if($data = post()) {
            hydrate($tree, $data);
            $id = Tree::save($tree);
            go('/tree', $id);
        }

        return compact('tree');
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
            hydrate($tree, $data);
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

} 