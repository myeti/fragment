<?php

namespace My\Logic;

use Craft\Box\Auth;
use Craft\Box\Flash;
use My\Model\Tree;

class Front
{

    /**
     * Landing page
     * @auth 1
     * @render views/front.hello
     */
    public function hello()
    {
        $trees = Tree::all();

        return compact('trees');
    }

    /**
     * Render tree
     * @render views/front.render
     */
    public function render($id)
    {
        $tree = Tree::one(['id' => $id]);

        return compact('tree');
    }

    /**
     * 404 Not found
     * @render views/front.404
     */
    public function lost()
    {

    }

    /**
     * Login page
     * @render views/front.login
     */
    public function login()
    {

        // login attempt
        if($data = post()) {

            // good
            if($data['username'] == USERNAME and sha1($data['password']) == PASSWORD) {
                Auth::login(1);
                go('/');
            }
            else {
                Flash::set('login.error', 'Erreur, vos identifiants sont incorrects.');
            }

        }

    }


    /**
     * Log user out
     */
    public function logout()
    {
        Auth::logout();
        go('/login');
    }

}