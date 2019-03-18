<?php

namespace App\Http\Controllers;

use Session;
use App\Channel;
use Illuminate\Http\Request;

class ChannelsController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('channels.index')->with('channels', Channel::all());
    }


    public function create()
    {
        return view('channels.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'channel' => 'required'
        ]);

        Channel::create([
            'title' => $request->channel,
            'slug' => str_slug($request->channel)
        ]);

        Session::flash('success', 'Channel Created Successfully');
        return redirect()->route('channels.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return view('channels.edit')->with('channel', Channel::find($id));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'channel' => 'required'
        ]);

        $channel = Channel::find($id);

        $channel->title = $request->channel;
        $channel->slug = str_slug($request->channel);
        $channel->save();

        Session::flash('success', 'Channel Updated Successfully');
        return redirect()->route('channels.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Channel::destroy($id);
        Session::flash('success', 'Channel Deleted Successfully');
        return redirect()->route('channels.index');
    }
}
