<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class Gs25Controller extends Controller {

	public function sell(){
      $this->middleware('agecheck',['age' => '18']);
	  return "팔았음...";
	}
}
