<?php

namespace App\Http\Controllers;

use App\Wall;
use Illuminate\Http\Request;

class WallController extends Controller
{
    public function store(Request $request)
    {
        // dump(request()->all());
        request()->validate([
            'username' => 'required',       
            'comment' => 'required'
        ]);
        $wall = new Wall();

        $wall->username = request('username');
        $wall->comment = request('comment');
        $wall->save();
        return compact('wall');
    }

    public function show($id)
    {
        $wall = Wall::findOrFail($id);
        return view('comment.show',['wall' => $wall]);
    }
    public function index()
    {
        return view('welcome');
    }

    //AJAX Show All Data

    public function fetchcomment()
    {
        $comments = Wall::latest()->get();
        return compact('comments');
    }   

    public function edit($id)
    {
        $wall = Wall::find($id);
        return view('comment.edit',['wall' => $wall]);
    }

    public function update(Request $request) 
    {
        $upwall = Wall::find(request('id'));
        $upwall->username = request('username');
        $upwall->comment = request('comment');
        $upwall->save();
        return compact('upwall');

    }

    public function destroy(Request $request)
    {
        $delwall = Wall::findOrFail(request('id'));

        $delwall->delete();

        return compact('delwall');
    }
}
