<?php

namespace App\Http\Controllers;

use App\Messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;

class MessagesController extends Controller
{
	public function __construct(){
		$this->middleware('auth', ['except'=>'store']);
	}

	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

		return response(Messages::getQuery()->orderBy('created_at', 'desc')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$msg = new Messages;
		$msg->name = $request->name;
		$msg->email = $request->email;
		$msg->message = $request->message;
		$msg->save();
		return response("Message Saved", 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Messages  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Messages $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Messages  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Messages $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Messages  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Messages $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Messages  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Messages $message)
    {
		$message->delete();
		return response('Message Deleted');
    }
}
