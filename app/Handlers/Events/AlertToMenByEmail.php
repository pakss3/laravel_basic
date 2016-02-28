<?php namespace App\Handlers\Events;

use App\Events\BeautyLogined;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class AlertToMenByEmail {

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  BeautyLogined  $event
	 * @return void
	 */
	public function handle(BeautyLogined $event)
	{
		echo $event->getIpAddress()." 알림메일 전송";
	}

}
