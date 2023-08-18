<?php

namespace App\Http\Controllers;

use App\Models\channel;
use Illuminate\Http\Request;

class channelController extends Controller
{
    public function index()
    {
        $channels = channel::orderByDesc('channelID')->get();

        return view('channels.index', compact('channels'));
    }

    public function create()
    {
        return view('channels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ChannelName' => 'required',
            'Description' => 'required',
            'SubscribersCount' => 'required|integer|min:0',
            'URL' => 'required|url',
            'Created_At' => '',
            'Updated_At_' => '',
        ]);

        channel::create($request->all());

        return redirect()->route('channels.index')->with('success', 'Added.');
    }

    public function show($channelsID)
    {
        $channel = channel::findOrFail($channelsID);

        return view('channels.show', compact('channel'));
    }

    public function edit($channelsID)
    {
        $channel = channel::findOrFail($channelsID);

        return view('channels.edit', compact('channel'));
    }

    public function update(Request $request, $channelsID)
    {
        $request->validate([
            'ChannelName' => 'required',
            'Description' => 'required',
            'SubscribersCount' => 'required|integer|min:0',
            'URL' => 'required|url',
            'Created_At' => '',
            'Updated_At_' => '',
        ]);

        $channel = channel::findOrFail($channelsID);
        $channel->update($request->all());

        return redirect()->route('channels.index')->with('success', 'Updated.');
    }

    public function destroy($channelsID)
    {
        $channel = channel::findOrFail($channelsID);
        $channel->delete();

        return redirect()->route('channels.index')->with('success', 'Deleted.');
    }
}