<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return redirect('home');
        }
        $route = Route::currentRouteName();

        $data = array(
            'title' => 'Dorah - Aplikasi Donor Darah',
            'route' => $route
        );
        return view('pages.index')->with($data);
    }

    public function map()
    {
        $route = Route::currentRouteName();

        $data = array(
            'title' => 'Peta Darah - Dorah',
            'route' => $route
        );
        return view('pages.map')->with($data);
    }

    public function help()
    {
        $route = Route::currentRouteName();

        $data = array(
            'title' => 'Bantuan - Dorah',
            'route' => $route
        );

        return view('pages.help')->with($data);
    }
}
