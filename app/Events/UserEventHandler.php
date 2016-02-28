<?php namespace App\Events;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;

class UserEventHandler {

    /**
     * Handle user login events.
     */
    public function onUserLogin($event)
    {
        echo "onUserLogin";
    }

    /**
     * Handle user logout events.
     */
    public function onUserLogout($event)
    {
        echo "onUserLogout";
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  Illuminate\Events\Dispatcher  $events
     * @return void
     */
    public function subscribe($events)
    {
        $events->listen('App\Events\UserLoggedIn', 'UserEventHandler@onUserLogin');

        $events->listen('App\Events\UserLoggedOut', 'UserEventHandler@onUserLogout');
    }

}