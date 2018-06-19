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
    	$user = Auth::user();
        $data = array(
            'title' => 'Edit Profile - Dorah',
            'route' => $route,
            'user' => $user
        );
        return view('pages.profile')->with($data);
    }

    public function editprofile(Request $request, $id){
        

    }
}