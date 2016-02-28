<?php namespace App\Events;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;

class PodcastWasPurchased extends Event {

	use SerializesModels;

/**
 * The event handler mappings for the application.
 *
 * @var array
 */


	/**
	 * Create a new event instance.
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
	 * @param  PodcastWasPurchased  $event
	 * @return void
	 */
	public function handle(PodcastWasPurchased $event)
	{
		//
		echo "email_event_fire";
	}
}
