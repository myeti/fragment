<?php

namespace My\Logic;

use My\Model\Event;

class Events
{

    /**
     * Create event
     * @render views/events.create
     * @return array
     */
    public function create()
    {
        $event = new Event;

        if($data = post()) {
            hydrate($event, $data);
            $id = Event::save($event);
            go('/event', $id);
        }

        return compact('event');
    }


    /**
     * Show event
     * @param int $id
     * @render views/events.show
     * @return array
     */
    public function show($id)
    {
        $event = Event::one(['id' => $id]);

        return compact('event');
    }


    /**
     * Edit event
     * @param int $id
     * @render views/events.edit
     * @return array
     */
    public function edit($id)
    {
        $event = Event::one(['id' => $id]);

        if($data = post()) {
            hydrate($event, $data);
            $id = Event::save($event);
            go('/event', $id);
        }

        return compact('event');
    }


    /**
     * Delete event
     * @param int $id
     */
    public function delete($id)
    {
        Event::drop($id);
        go('/event');
    }

} 