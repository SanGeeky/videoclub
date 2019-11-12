<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function getHome()
    {
        //return redirect()->action('LoginController@__construct');
        //return view('auth.login');
        return redirect()->route('login');
    }

    public function index()
    {
        return redirect()->action('CatalogController@getIndex');
        //return view('home');
    }
}
