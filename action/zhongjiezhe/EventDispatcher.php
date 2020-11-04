<?php

namespace zhongjiezhe;

include_once 'Observer.php';
class EventDispatcher{

    private $observers = [];

    public function __construct()
    {
        // The special event group for observers that want to listen to all
        // events.
        $this->observers["*"] = [];
    }

    private function initEventGroup(&$event = "*")
    {
        if (!isset($this->observers[$event])) {
            $this->observers[$event] = [];
        }
    }

    private function getEventObservers($event = "*")
    {
        $this->initEventGroup($event);
        $group = $this->observers[$event];
        $all = $this->observers["*"];

        return array_merge($group, $all);
    }

    public function attach(Observer $observer, $event = "*")
    {
        $this->initEventGroup($event);

        $this->observers[$event][] = $observer;
        print_r($this->observers);
    }

    public function detach(Observer $observer, $event = "*")
    {
        foreach ($this->getEventObservers($event) as $key => $s) {
            if ($s === $observer) {
                unset($this->observers[$event][$key]);
            }
        }
    }

    public function trigger($event, $emitter, $data = null)
    {
        echo "EventDispatcher: Broadcasting the '$event' event.\n";
        $observers = $this->getEventObservers($event);
//        print_r($observers);
        foreach ($observers as $observer) {
            $observer->update($event, $emitter, $data);
        }
    }
}

function events()
{
    static $eventDispatcher;
    if (!$eventDispatcher) {
        $eventDispatcher = new EventDispatcher();
    }

    return $eventDispatcher;
}