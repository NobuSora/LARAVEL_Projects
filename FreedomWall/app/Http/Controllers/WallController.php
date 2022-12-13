<?php

namespace App\Http\Controllers;

use App\Wall;
use Illuminate\Http\Request;

class WallController extends Controller
{
    public function store()
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
        return redirect('');
    }

    public function show($id)
    {
        $wall = Wall::findOrFail($id);
        return view('comment.show',['wall' => $wall]);
    }

    public function edit($id)
    {
        $wall = Wall::find($id);
        return view('comment.edit',['wall' => $wall]);
    }

    public function update($id) 
    {
        request()->validate([
            'username' => 'required',
            'comment' => 'required'
        ]);
        $wall = Wall::find($id);
        $wall->username = request('username');
        $wall->comment = request('comment');
        $wall->save();

        return redirect('/' . $wall->$id);

    }

    public function destroy($id)
    {
        $wall = Wall::findOrFail($id);

        $wall->delete();

        return redirect('../');
    }
}