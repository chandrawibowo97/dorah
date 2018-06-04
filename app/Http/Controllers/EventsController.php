<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class EventsController extends Controller
{
    public function event(){
        $route = Route::currentRouteName();

        $data = array(
            'title' => 'Event - Dorah',
            'route' => $route
        );
        return view('pages.event')->with($data);
    }


    // temporary
    public function eventDetail(){
        $data = array(
            'title' => 'Event Detail - Dorah'
        );
        return view('pages.eventdetail')->with($data);
    }
    public function addEvent(){
        $data = array(
            'title' => 'Tambahkan Event - Dorah'
        );
        return view('pages.addevent')->with($data);
    }
}
