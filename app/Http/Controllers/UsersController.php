<?php

namespace App\Http\Controllers;

use App\Resume;
use Httpful\Response;
use Illuminate\Http\Request;
use \App\User;
use App\Http\Resources\User as UserResource;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{


	public function show(Request $request)
    {
		$resume = new Resume();
		$resume->user_id = Auth::id();
		$resume->save();
		if (Auth::user()->resume == null) {
		}
		return Auth::user()->with(Resume::class);
    }

    public function update(Request $request)
    {
		$user = Auth::user();

		$user->save();

		return \response('User Updated');
    }

}
