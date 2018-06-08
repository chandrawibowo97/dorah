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
        $branches = DB::table('pmi_branches')
            ->join('districts', 'pmi_branches.district_id', '=', 'districts.id')
            ->join('cities', 'districts.city_id', '=', 'cities.id')
            ->join('provinces', 'cities.province_id', '=', 'provinces.id')
            ->select('pmi_branches.*', 'districts.name as district', 'cities.name as city', 'provinces.name as province')
            ->get();
        $stocks = DB::table('blood_stocks')
            ->join('blood_types', 'blood_stocks.blood_type_id', '=', 'blood_types.id')
            ->get();

        if (is_null($user)) {
            $name = '';
        } else {
            $name = $user->name;
        }


        $data = array(
            'title' => 'Dashboard - Dorah',
            'route' => $route,
            'name' => $name,
            'branches' => $branches,
            'stocks' => $stocks
        );

        return view('pages.home')->with($data);
    }
}
