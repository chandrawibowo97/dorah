<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	$route = Route::currentRouteName();
        $data = array(
            'title' => 'Edit Profile - Dorah',
            'route' => $route
        );
        return view('pages.profile')->with($data);
    }
}
