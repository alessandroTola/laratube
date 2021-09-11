<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;

class UploadVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Channel $channel)
    {
        return view('channels.upload', ['channel' => $channel]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Models\Channel $channel
     * @return \Illuminate\Http\Response
     */
    public function store(Channel $channel)
    {
        return $channel->videos()->create([
            'title' => request()->title,
            'path' => request()->video->store("channels/{$channel->id}"),
        ]);
    }
}
