<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Model\Event;

class EventController extends Controller
{
    public function show(Request $request)
    {
        $route = Route::currentRouteName();
        $events = Event::all();

        $data = array(
            'title' => 'Admin - Event',
            'route' => $route,
            'events' => $events
        );

        return view('admin.event.show')->with($data);
    }

    public function add(Request $request)
    {
        $route = Route::currentRouteName();
        $currTime = new \DateTime;

        $requestParameter = $request->request->all();
        $event = new Event;
        $event->title = $requestParameter['title'];
        $event->address = $requestParameter['address'];
        $event->from = $requestParameter['from'];
        $event->to = $requestParameter['to'];
        $event->created_at = $currTime;
        $event->updated_at = $currTime;
        $event->lat = $requestParameter['lat'];
        $event->lng = $requestParameter['lng'];
        $event->save();

        return view('admin_event');
    }

    public function delete(Request $request, $id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect('admin_event');
    }

    public function edit(Request $request, $id)
    {
        $route = Route::currentRouteName();
        $event = Event::find($id);

        $data = array(
            'title' => 'Event - Dorah',
            'route' => $route,
            'event' => $event
        );

        if ($request->isMethod('put')) {
            $requestParameter = $request->request->all();

            $event->title = $requestParameter['title'];
            $event->address = $requestParameter['address'];
            $event->from = $requestParameter['from'];
            $event->to = $requestParameter['to'];
            $event->lat = $requestParameter['lat'];
            $event->lng = $requestParameter['lng'];
            $event->updated_at = new \DateTime;

            return view('admin_event');
        }

        return view('event.edit')->with($data);
    }
}
