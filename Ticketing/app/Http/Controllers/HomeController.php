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
        if(auth()->user()->level == 2){
            $data = Data::where('status', 'Open')->get();
            return view ('admin.open')->withData($data);
        }
        else
        {
            return view('welcome');
        }


        // dd(auth()->user()->name);
        
    }

    public function assigned()
    {
        if(auth()->user()->level == 2){
            $data = Data::where('status', 'Pending')->get();
            return view ('admin.assigned')->withData($data);
        }
        else
        {
            return view('welcome');
        }


        // dd(auth()->user()->name);
        
    }

    public function resolved()
    {
        if(auth()->user()->level == 2){
            $data = Data::where('status', 'Approved')->get();
            return view ('admin.resolved')->withData($data);
        }
        else
        {
            return view('welcome');
        }


        // dd(auth()->user()->name);
        
    }

    public function archived()
    {
        if(auth()->user()->level == 2){
            $data = Data::where('status', 'Archived')->get();
            return view ('admin.archived')->withData($data);
        }
        else
        {
            return view('welcome');
        }


        // dd(auth()->user()->name);
        
    }
}
