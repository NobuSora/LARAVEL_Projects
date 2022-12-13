<?php

namespace App\Http\Controllers;

use App\expertise;
use Illuminate\Http\Request;

class ExpertiseController extends Controller
{
    public function show($id)
    {
        $exp = expertise::findOrFail($id);
        return view('expertise.show',['exp' => $exp]);
    }

    public function create()
    {
        return view('expertise.create');
    }

    public function store()
    {
        // dump(request()->all());
        request()->validate([
            'year' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);
        $exp = new expertise();

        $exp->year = request('year');
        $exp->title = request('title');
        $exp->description = request('description');
        $exp->save();
        return redirect('/skills');

    }

    public function edit($id)
    {
        $exp = expertise::find($id);
        return view('expertise.edit',['exp' => $exp]);
    }

    public function update($id) 
    {
        request()->validate([
            'year' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);

        $exp = expertise::find($id);

        $exp->year = request('year');
        $exp->title = request('title');
        $exp->description = request('description');

        $exp->save();

        return redirect('/skills' . $exp->$id);

    }
    
}
