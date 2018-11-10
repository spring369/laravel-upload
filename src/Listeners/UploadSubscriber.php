<?php

namespace Windmill\Upload\Listeners;
use Windmill\Upload\Events\UploadEvent;

class UploadSubscriber
{
    public function subscribe($events)
    {
        $listener = function (){
            return \Windmill\Upload\Listeners\FileListener::class;
        };

        $events->listen(UploadEvent::class, $listener());
    }
}
