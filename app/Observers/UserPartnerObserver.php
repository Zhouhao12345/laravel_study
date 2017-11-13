<?php

namespace App\Observers;

use App\Models\UserPartner as Partner;

class UserObserver
{

    //Observer to check the event of model during lifecycle
    //then register the observer under app/providers/appserviceprovider.php
    /**
     * 监听用户创建事件.
     *
     * @param  Partner  $partner
     * @return void
     */
    public function created(Partner $partner)
    {
        //
    }

    /**
     * 监听用户删除事件.
     *
     * @param  Partner  $partner
     * @return void
     */
    public function deleting(Partner $partner)
    {
        //
    }
}