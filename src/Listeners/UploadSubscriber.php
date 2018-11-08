<?php

namespace Windmill\Upload\Listeners;
use Windmill\Upload\Events\UploadEvent;

class UploadSubscriber
{
    public function subscribe($events)
    {
        $events->listen(UploadEvent::class, function (){
            return FileListener::class;
        });
    }
}
