<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public function something(Exception $e){
			$user = new \App\User;

			$user->isSubscribed();

	}

	public function testing(){
 		 	dd(new User);	
	}
	
	public function test(){
 		return true;

	}
	
	
	
	
	
	
	
	
}
