<?php

namespace My\Logic;

use My\Model\Couple;

class Couples
{

    /**
     * Create couple
     * @render views/couples.create
     * @return array
     */
    public function create()
    {
        $couple = new Couple;

        if($data = post()) {
            hydrate($couple, $data);
            $id = Couple::save($couple);
            go('/couple', $id);
        }

        return compact('couple');
    }


    /**
     * Show couple
     * @param int $id
     * @render views/couples.show
     * @return array
     */
    public function show($id)
    {
        $couple = Couple::one(['id' => $id]);

        return compact('couple');
    }


    /**
     * Edit couple
     * @param int $id
     * @render views/couples.edit
     * @return array
     */
    public function edit($id)
    {
        $couple = Couple::one(['id' => $id]);

        if($data = post()) {
            hydrate($couple, $data);
            $id = Couple::save($couple);
            go('/couple', $id);
        }

        return compact('couple');
    }


    /**
     * Delete couple
     * @param int $id
     */
    public function delete($id)
    {
        Couple::drop($id);
        go('/couple');
    }

} 