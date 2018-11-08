<?php
/** .-------------------------------------------------------------------
 * |      Site: www.hdcms.com
 * |      Date: 2018/6/28 下午8:07
 * |    Author: 向军大叔 <2300071698@qq.com>
 * '-------------------------------------------------------------------*/
namespace Windmill\Upload\Listeners;
use Windmill\Upload\Events\UploadEvent;

class FileListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * @param \App\Events\UploadEvent $event
     *
     * @return bool
     */
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
