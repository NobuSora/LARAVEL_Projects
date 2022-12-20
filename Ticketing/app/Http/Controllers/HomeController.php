<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;

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
    public function index()
    {
        if(auth()->user()->name == 'Bry'){
            $data = Data::all();
            return view ('home')->withData($data);
        }
        else
        {
            return view('welcome');
        }


        // dd(auth()->user()->name);
        
    }
}
