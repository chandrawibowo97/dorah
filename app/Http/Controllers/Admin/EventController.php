<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Model\Event;
use Carbon\Carbon;

class EventController extends Controller
{
    public function show(Request $request)
    {
        $route = Route::currentRouteName();
        $events = Event::orderBy('created_at', 'desc')->paginate(12);

        $data = array(
            'title' => 'Admin - Event',
            'route' => $route,
            'events' => $events
        );

        return view('admin.event.index')->with($data);
    }

    public function add(Request $request)
    {
        
        if ($request->isMethod('post')) {
            $currTime = new \DateTime;

            $requestParameter = $request->request->all();
            $event = new Event;
            $event->title = $requestParameter['title'];
            $event->address = $requestParameter['address'];
            $event->from = Carbon::createFromFormat('Y-m-d H:i:s', $requestParameter['from']);
            $event->to = Carbon::createFromFormat('Y-m-d H:i:s', $requestParameter['to']);
            $event->created_at = $currTime;
            $event->updated_at = $currTime;
            $event->lat = $requestParameter['lat'];
            $event->lng = $requestParameter['lng'];
            $event->event_picture = "no-image.png";
            $event->save();
            return redirect()->route('admin_event');
        }
        $route = Route::currentRouteName();
        $data = array(
            'title' => 'Admin - Add Event',
            'route' => $route
        );
        return view('admin.event.add')->with($data);
    }

    public function delete(Request $request, $id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect()->route('admin_event');
    }

    public function edit(Request $request, $id)
    {
        $route = Route::currentRouteName();
        $event = Event::find($id);

        $data = array(
            'title' => 'Admin - Edit Event',
            'route' => $route,
            'event' => $event
        );

        if ($request->isMethod('put')) {
            $requestParameter = $request->request->all();

            $event->title = $requestParameter['title'];
            $event->address = $requestParameter['address'];
            $event->from = Carbon::createFromFormat('Y-m-d H:i:s', $requestParameter['from']);
            $event->to = Carbon::createFromFormat('Y-m-d H:i:s', $requestParameter['to']);
            $event->lat = $requestParameter['lat'];
            $event->lng = $requestParameter['lng'];
            
            $event->updated_at = new \DateTime;
            $event->save();
            return redirect()->route('admin_event');
        }

        return view('admin.event.edit')->with($data);
    }
}
