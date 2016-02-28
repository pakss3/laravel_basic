<?php namespace App\Commands;

use App\Commands\Command;

use Illuminate\Contracts\Bus\SelfHandling;

class Off extends Command // 요거 삭제해줘야됨 implements SelfHandling {
	 public $name;
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct($nm)
	{
		$this->name = $nm;
	}



}
