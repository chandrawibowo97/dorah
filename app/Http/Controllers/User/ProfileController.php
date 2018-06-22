<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

use App\Model\Province;
use App\Model\Blood_Type;

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

    public function index(Request $request){
    	$route = Route::currentRouteName();
        $user = Auth::user();
        $provinces = Province::all();
        $blood_types = Blood_Type::all();

        if ($request->isMethod('post')) {
            $requestParameter = $request->request->all();
            $user->name = $requestParameter['name'];
            $user->email = $requestParameter['email'];
            $user->phone = $requestParameter['phone'];
            $user->blood_type_id = $requestParameter['blood_type'];
            $user->province_id = $requestParameter['province'];
            $user->kartu_donor_id = $requestParameter['kartu_donor'];
            $user->save();
            return redirect()->route('profile');
        }

        $data = array(
            'title' => 'Edit Profile - Dorah',
            'route' => $route,
            'user' => $user,
            'provinces' => $provinces,
            'blood_types' => $blood_types
        );
        return view('pages.profile')->with($data);
    }
}