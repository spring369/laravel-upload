<?php
namespace Windmill\Upload\Listeners;
use Windmill\Upload\Events\UploadEvent;

class FileListener
{

    public function __construct()
    {
    }

    public function handle(UploadEvent $event)
    {
        if ( ! $request = $event->getRequest()) {
            return false;
        }
        $fileName = str_random(10).microtime(true).'.'.$request->getClientOriginalExtension();
        $saveDir = 'uploads/'.date('ym/d');
        $request->move($saveDir, $fileName);
        $event->setFile($saveDir.'/'.$fileName);
    }
}
