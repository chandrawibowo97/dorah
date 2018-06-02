<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $data = array(
            'title' => 'Dorah - Aplikasi Donor Darah'
        );
        return view('pages.index')->with($data);
    }

    public function map(){
        $data = array(
            'title' => 'Peta Darah - Dorah'
        );
        return view('pages.map')->with($data);
    }

    public function help(){
        $data = array(
            'title' => 'Bantuan - Dorah'
        );
        return view('pages.help')->with($data);
    }

    public function login(){
        $data = array(
            'title' => 'Masuk - Dorah'
        );
        return view('pages.login')->with($data);
    }

    public function register(){
        $data = array(
            'title' => 'Daftar - Dorah'
        );
        return view('pages.register')->with($data);
    }

    public function home(){ //halaman index setelah login
        $data = array(
            'title' => 'Dashboard - Dorah'
        );
        return view('pages.home')->with($data);
    }

    public function profile(){
        $data = array(
            'title' => 'Edit Profile - Dorah'
        );
        return view('pages.profile')->with($data);
    }
}
