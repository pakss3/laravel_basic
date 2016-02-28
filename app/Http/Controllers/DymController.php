<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DymController extends Controller {

	public function example1(){
		echo "example1aa";
	}

	public function example2($arg = 'a'){
		echo "example2:".$arg;
	}

	public function example3($arg ){
		return view('hello',["name"=>$arg]);
	}

}
