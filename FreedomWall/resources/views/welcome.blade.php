@extends('layout')
<h2 class="mb-1"><span class="text-danger">Freedom</span>Wall</h2>

<form  method="POST" action="/store">
    @csrf
<div class="container">
    <div class="row">
        <div class="col-md-6 col-lg-4">
            <div class="card">
               <div class="card-header">
                    <div class="mt-2">
                        <h4><input class="input @error('username') is-danger @enderror" type="text" name="username" id="username" placeholder="Username" value="{{ old('username')}}"></h4>
                        @error('username')
                        <p class="help is-danger">{{ $errors->first('username')}}</p>
                        @enderror
                        <span class="line"></span>  
                    </div>
                </div>
                <div class="card-body">
                    <textarea class="textarea @error('comment') is-danger @enderror" type="textarea" name="comment" id="comment" placeholder="Comment" >{{ old('comment')}}</textarea>
                        @error('comment')
                        <p class="help is-danger">{{ $errors->first('comment')}}</p>
                        @enderror
                </div>
                <input type="submit" value="Post" onclick="return confirm('Confirm Post?')">
            </div>
        </div>
    </div>
</div>
</form>

    @foreach ($wall as $wall )
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <a href="/{{$wall->id}}">
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
                                {{$wall->updated_at->format('M d, Y | h:i A')}}
                            </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    @endforeach

