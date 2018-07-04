<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
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
            $this->validate($request, [
                'title' => 'required',
                'address' => 'required',
                'from' => 'required',
                'to' => 'required',
                'lat' => 'required',
                'lng' => 'required',
                'picture' => 'image|max:1999'
            ]);

            // handle image upload
            if($request->hasFile('picture')) {
                //get filename with extension
                $filenameWithExt = $request->file('picture')->getClientOriginalName();
                //get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //get just ext
                $extension = $request->file('picture')->getClientOriginalExtension();
                //filename to store
                $filenameToStore = $filename.'_'.time().'.'.$extension;

                $path = $request->file('picture')->storeAs('public/event-images', $filenameToStore);
            }
            else {
                $filenameToStore = "no-image.png";
            }

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
            $event->event_picture = $filenameToStore;
            $event->save();
            return redirect()->route('admin_event')->with('status', 'Event berhasil ditambahkan');
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

        if($event->event_picture != "no-image.png") {
            Storage::delete('public/event-images/'.$event->event_picture);
        }
        
        $event->delete();
        return redirect()->route('admin_event')->with('status', 'Event berhasil dihapus');
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
            $this->validate($request, [
                'title' => 'required',
                'address' => 'required',
                'from' => 'required',
                'to' => 'required',
                'lat' => 'required',
                'lng' => 'required',
                'picture' => 'image|max:1999'
            ]);

            // handle image upload
            if($request->hasFile('picture')) {
                //get filename with extension
                $filenameWithExt = $request->file('picture')->getClientOriginalName();
                //get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //get just ext
                $extension = $request->file('picture')->getClientOriginalExtension();
                //filename to store
                $filenameToStore = $filename.'_'.time().'.'.$extension;

                //delete old picture
                if($event->event_picture != "no-image.png") {
                    Storage::delete('public/event-images/'.$event->event_picture);
                }

                $path = $request->file('picture')->storeAs('public/event-images', $filenameToStore);
            }

            $requestParameter = $request->request->all();

            $event->title = $requestParameter['title'];
            $event->address = $requestParameter['address'];
            $event->from = Carbon::createFromFormat('Y-m-d H:i:s', $requestParameter['from']);
            $event->to = Carbon::createFromFormat('Y-m-d H:i:s', $requestParameter['to']);
            $event->lat = $requestParameter['lat'];
            $event->lng = $requestParameter['lng'];

            if($request->hasFile('picture')) {
                $event->event_picture = $filenameToStore;
            }

            $event->updated_at = new \DateTime;
            $event->save();
            return redirect()->route('admin_event')->with('status', 'Event berhasil diubah');
        }

        return view('admin.event.edit')->with($data);
    }
}
