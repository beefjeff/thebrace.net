<?php

namespace App\Http\Controllers;

use App\Resume;
use Doctrine\DBAL\Driver\PDOException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResumeController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}


    /**
     * Display the specified resource.
     *
     * @param  \App\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function show(Resume $resume)
    {
		return response(Auth::user()->resume);
    }

	public function store()
	{
		$resume = new Resume();
		$resume->user_id = Auth::id();
		try {
			$resume->save();
		} catch (PDOException $e) {
			return response($e);
		}
		return response($resume);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Resume  $resume
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resume $resume)
    {
		$resume = Auth::user()->resume;
		$resume->summary = request('summary');
		$resume->save();
		return response('updated resume');
        //
    }
}
