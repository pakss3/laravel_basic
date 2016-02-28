<?php namespace App\Commands;

use App\Commands\Command;

use Illuminate\Contracts\Bus\SelfHandling;

class PurchasePodcast extends Command implements SelfHandling {
	 protected $user, $podcast;
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(/*User $user, Podcast $podcast*/)
	{
	//	$this->user = $user;
    //    $this->podcast = $podcast;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
    public function handle()
    {
        // Handle the logic to purchase the podcast...

        echo "PurchasePodcast::handle";
    }
    public function ahandle()
    {
        // Handle the logic to purchase the podcast...

        echo "ahandle";
    }


}
