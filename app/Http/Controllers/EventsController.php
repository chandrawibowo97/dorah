<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Event;
use Illuminate\Support\Facades\Route;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $route = Route::currentRouteName();
        $events = Event::orderBy('created_at', 'desc')->paginate(12);
        $data = array(
            'title' => 'Event - Dorah',
            'route' => $route,
            'events' => $events
        );
        return view('event.index')->with($data);
    }

    public function map()
    {
        $route = Route::currentRouteName();
        $events = Event::all();
        $data = array(
            'title' => 'Event Map - Dorah',
            'route' => $route,
            'events' => $events
        );
        return view('event.map')->with($data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $route = Route::currentRouteName();
        $event = Event::find($id);
        $data = array(
            'title' => 'Event '. $event->title .' - Dorah',
            'route' => $route,
            'event' => $event
        );
        return view('event.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
