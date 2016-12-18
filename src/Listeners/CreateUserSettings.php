<?php

namespace App\Listeners;

use App\Events\UserWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Event;

class CreateUserSettings
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     * Throws error if user settings found in db
     *
     * @param  UserWasCreated $event
     * @return void
     */
    public function handle(UserWasCreated $event)
    {
        $user_row = array('user_id' => $event->userRow['id']);

        //make directories
        if (!file_exists(public_path().'/user/user-'.(int)$event->userRow['id'].'/css')) {
            mkdir(public_path().'/user/user-'.$event->userRow['id'].'/css', 0777, true);
        }

        //make directories
        if (!file_exists(public_path().'/user/user-'.(int)$event->userRow['id'].'/img')) {
            mkdir(public_path().'/user/user-'.(int)$event->userRow['id'].'/img', 0777, true);
        }
        
        //make directories
        if (!file_exists(public_path().'/user/user-'.(int)$event->userRow['id'].'/files')) {
        	mkdir(public_path().'/user/user-'.(int)$event->userRow['id'].'/files', 0777, true);
        }

        //laravel filemanager photos
        if (!file_exists(public_path().'/user/user-'.(int)$event->userRow['id'].'/img/shares')) {
            mkdir(public_path().'/user/user-'.(int)$event->userRow['id'].'/img/shares', 0777, true);
        }

    }

}
