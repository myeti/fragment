<?php

namespace My\Logic;

use My\Model\Tree;

class Front
{

    /**
     * Landing page
     * @render views/front.hello
     */
    public function hello()
    {
        $trees = Tree::all();

        return compact('trees');
    }

    /**
     * 404 Not found
     * @render views/error.404
     */
    public function lost()
    {

    }

    /**
     * 403 Forbidden
     * @render views/error.403
     */
    public function sorry()
    {

    }

}