<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile(){
        $data = array(
            'title' => 'Edit Profile - Dorah'
        );
        return view('pages.profile')->with($data);
    }
}
