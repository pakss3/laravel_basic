<?php namespace App\Events;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;

class BeautyLogined extends Event {

	use SerializesModels;
	
	protected $ipAddress;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct($ipAddress)
	{
		//
		$this->ipAddress = $ipAddress;
	}

	public function getIpAddress(){
		return $this->ipAddress;
	}

}
