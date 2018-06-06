<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class PagesController extends Controller
{
    public function index()
    {
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

    public function home()
    { //halaman index setelah login
        $user = Auth::user();
        $route = Route::currentRouteName();

        if (is_null($user)) {
            $name = '';
        } else {
            $name = $user->name;
        }

        $data = array(
            'title' => 'Dashboard - Dorah',
            'route' => $route,
            'name' => $name
        );

        return view('pages.home')->with($data);
    }
}
