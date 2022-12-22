<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $data = new Data();
        $data->name = (request('name'));
        $data->title = (request('title'));
        $data->status = (request('status'));
        $data->date = (request('date'));
        $data->save ();
        $sendData = Data::latest()->where('status', 'Open')->where('title',request('title'))->get();
        return with(compact('sendData'));
    }
}
