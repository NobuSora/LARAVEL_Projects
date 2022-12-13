@extends('layout')


<h2 class="mb-1"><span class="text-danger">Freedom</span>Wall</h2>
<form method="POST" action="/{{$wall->id}}/delete">
    @csrf
    @method('DELETE')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-4">

            <div class="card">
                <div class="card-header">
                    <div class="mt-2">
                        <h4>{{$wall->username}}</h4>
                        <span class="line"></span>  
                    </div>
                </div>
                <div class="card-body">
                    <p>{{$wall->comment}}</p>
                </div>
                    <div class="DateClass">
                        {{$wall->created_at->diffForHumans()}}
                    </div>
            </div>
            <input type="submit" value="Delete" class="btn" onclick="return confirm('Confirm Delete?')">&nbsp;<a href="/{{$wall->id}}/edit" class="btn">Edit</a>
        </div>
    </div>
</div>