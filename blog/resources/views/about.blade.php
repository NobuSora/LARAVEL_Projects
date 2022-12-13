@extends('layout')

<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white" data-spy="affix" data-offset-top="1">
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
                    <h5 class="brand-title">Bryan Hernandez</h5>
                    <div class="brand-subtitle">Software Developer</div>
                </li>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div id="about" class="row about-section">
        <div class="col-lg-4 about-card">
            <h3 class="font-weight-light">Who am I ?</h3>
            <span class="line mb-5"></span>
            <h5 class="mb-3">Software Developer Located In Our Lovely Earth</h5>
            <p class="mt-20">Currently working in Acacia-soft Corporation located in Cainta, Rizal, South Luzon, Philippines</p>
        </div>
        <div class="col-lg-4 about-card">
            <h3 class="font-weight-light">Personal Info</h3>
            <span class="line mb-5"></span>
            <ul class="mt40 info list-unstyled">
                <li><span>Birthdate</span> : August 07,1997</li>
                <li><span>Email</span> : bryan.hernandez@acacia-soft.com</li>
                <li><span>Phone</span> : +63 (927) 255 1133</li>
                <li><span>Address</span> :  12345 Fake ST NoWhere AB Country.</li>
            </ul>
            <ul class="social-icons pt-3">
                <li class="social-item"><a class="social-link" href="#"><i class="ti-facebook" aria-hidden="true"></i></a></li>
                <li class="social-item"><a class="social-link" href="#"><i class="ti-twitter" aria-hidden="true"></i></a></li>
                <li class="social-item"><a class="social-link" href="#"><i class="ti-google" aria-hidden="true"></i></a></li>
                <li class="social-item"><a class="social-link" href="#"><i class="ti-instagram" aria-hidden="true"></i></a></li>
                <li class="social-item"><a class="social-link" href="#"><i class="ti-github" aria-hidden="true"></i></a></li>
            </ul>  
        </div>
        <div class="col-lg-4 about-card">
            <h3 class="font-weight-light">My Expertise</h3>
            <span class="line mb-5"></span>
            <div class="row">
                <div class="col-1 text-danger pt-1"><i class="ti-car icon-lg"></i></div>
                <div class="col-10 ml-auto mr-3">
                    <h6>Driving</h6>
                    <p class="subtitle">I've been driving for 8 Years and counting</p>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-1 text-danger pt-1"><i class="ti-world icon-lg"></i></div>
                <div class="col-10 ml-auto mr-3">
                    <h6>Web Development</h6>
                    <p class="subtitle">Lorem ipsum dolor sit consectetur.</p>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-1 text-danger pt-1"><i class="ti-key icon-lg"></i></div>
                <div class="col-10 ml-auto mr-3">
                    <h6>Cyber Security</h6>
                    <p class="subtitle">voluptate commodi illo voluptatib.</p>
                    <hr>
                </div>
            </div>
        </div>
    </div>
    </div>
