@extends('layout')

<h2 class="mb-1"><span class="text-danger">Edit</span>Wall</h2>
<form  method="POST" action="../{{$wall->id}}">
    @csrf
    @method('PUT')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-4">
            <div class="card">
               <div class="card-header">
                    <div class="mt-2">
                        <input class="input @error('username') is-danger @enderror" type="text" name="username" id="username" value="{{$wall->username}}">
                        @error('username')
                        <p class="help is-danger">{{ $errors->first('username')}}</p>
                        <span class="line"></span>  
                        @enderror
                    </div>
                </div>
                <div class="card-body">
                    <textarea type="textarea" name="comment" id="comment" class="textarea @error('comment') is-danger @enderror">{{$wall->comment}}</textarea>
                        @error('comment')
                        <p class="help is-danger">{{ $errors->first('comment')}}</p>
                        @enderror
                </div>
                <input type="submit" value="Update" onclick="return confirm('Confirm Update?')">
            </div>
        </div>
    </div>
</div>
</form>