@extends('layout')

<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white" data-spy="affix" data-offset-top="20">
    <div class="container">

        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse mt-sm-20 navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="/" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="/about" class="nav-link">About</a>
                </li>
                <li class="nav-item">
                    <a href="/skills" class="nav-link">Skill</a>
                </li>
            </ul>
            <ul class="navbar-nav brand">
                <li class="brand-txt">
                    <h5 class="brand-title">Hmmmmmm?</h5>
                    <div class="brand-subtitle">Hiiii!</div>
                </li>
            </ul>
        </div>
    </div>
</nav>

@section('expertise')
<form action="/skills" method="post">
    @csrf
    <div class="container">
        <h2 class="mb-5"><span class="text-danger">My</span> Expertise</h2>
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                <div class="card-header">
                        <div class="mt-2">
                            <h4>Expertise</h4>
                            <span class="line"></span>  
                        </div>
                    </div>
                    <div class="card-body">
                        <h2 class="title">Year</h2>
                        <input class="input @error('year') is-danger @enderror"
                        type="text" 
                        name="year"
                        id="year" 
                        value="{{ old('year')}}"  >
                        @error('year')
                        <p class="help is-danger">{{ $errors->first('year')}}</p>
                        @enderror
                        <h2 class="title">Title</h2>
                        <input class="input @error('title') is-danger @enderror" type="text" name="title" id="title" value="{{ old('title')}}">
                        @error('title')
                        <p class="help is-danger">{{ $errors->first('title')}}</p>
                        @enderror
                        <h2 class="title">Description</h2>
                        <textarea class="textarea @error('description') is-danger @enderror" type="textarea" name="description" id="description"  >{{ old('description')}}</textarea>
                        @error('description')
                        <p class="help is-danger">{{ $errors->first('description')}}</p>
                        @enderror
                        
                    </div>
                    <input type="submit" value="Submit"> 
                </div>
            </div>
        </div>
    </div>
</form>
@endsection