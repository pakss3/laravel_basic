<?php namespace App\Handlers\Commands;

use App\Commands\Off;

use Illuminate\Queue\InteractsWithQueue;

class OffHandler{



	/**
	 * Handle the command.
	 *
	 * @param  Off  $command
	 * @return void
	 */
	public function handle(Off $command)
	{
		echo $command->name.",off";
	}

}
