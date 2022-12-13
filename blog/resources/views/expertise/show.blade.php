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
                    <div class="brand-subtitle">Software Developer</div>
                    <h5 class="brand-title">Bryan Hernandez</h5>
                </li>
        </div>
    </div>
</nav>

<section class="section" id="resume">
    <div class="container">
        <h2 class="mb-5"><span class="text-danger">{{$exp->title}}</span></h2>
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                   <div class="card-header">
                        <div class="mt-2">
                            <h4>{{$exp->year}}</h4>
                            <span class="line"></span>  
                        </div>
                    </div>
                    <div class="card-body">
                        <p>{{$exp->description}}</p>
                    </div>
                    <a href="{{$exp->id}}/edit/">Edit</a>
                </div>
                
            </div>
            
        </div>
    </div>
</section>