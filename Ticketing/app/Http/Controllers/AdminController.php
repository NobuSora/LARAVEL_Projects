<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;

class AdminController extends Controller
{
/**
 * Create a new controller instance.
 *
 * @return void
 */

    
    public function edit(Request $request)
    {
            $data = Data::find (request('id'));
            $data->name = (request('name'));
            $data->title = (request('title'));
            $data->status = (request('status'));
            $data->date = (request('date'));
            $data->remarks = (request('remarks'));
            $data->save();
            return response ()->json ($data);
    }
}