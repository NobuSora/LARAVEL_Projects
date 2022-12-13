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
                    <h5 class="brand-title">Bryan Hernandez</h5>
                    <div class="brand-subtitle">Software Developer</div>
                </li>
        </div>
    </div>
</nav>

<section class="section" id="resume">
    <div class="container">
        <h2 class="mb-5"><span class="text-danger">My</span> Skills</h2>
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
                        <h6 class="title text-danger">2014 - Present</h6>
                        <P>Driving</P>
                        <P class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum recusandae, cupiditate ullam dolor ratione repellendus.aliquid repudiandae saepe!.</P>
                        <hr>
                        <h6 class="title text-danger">2020 - Present</h6>
                        <P>Web Development</P>
                        <P class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum recusandae, cupiditate ullam dolor ratione repellendus.aliquid repudiandae saepe!.</P>
                        <hr>
                        <h6 class="title text-danger">2022 - Present</h6>
                        <P>Cyber Security</P>
                        <P class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum recusandae, cupiditate ullam dolor ratione repellendus.aliquid repudiandae saepe!.</P>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card">
                   <div class="card-header">
                        <div class="mt-2">
                            <h4>Education</h4>
                            <span class="line"></span>  
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach ($expertise as $exp)
                        <h6 class="title text-danger">{{$exp->year}}</h6>
                        <a href="/skills/{{$exp->id}}"><P>{{$exp->title}}</P></a>
                        <P class="subtitle">{{$exp->description}}</P>
                        <hr>
                        @endforeach
                        <a href="skills/create">Create</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                   <div class="card-header">
                        <div class="pull-left">
                            <h4 class="mt-2">Skills</h4>
                            <span class="line"></span>  
                        </div>
                    </div>
                    <div class="card-body pb-2">
                       <h6><i class="ti-html5"></i> HTML5</h6>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h6><i class="ti-panel"></i> jQuery</h6>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 85%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h6><i class="ti-html5"></i> PHP</h6>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h6><i class="ti-html5"></i> SQL</h6>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h6><i class="ti-html5"></i> Laravel</h6>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h6><i class="ti-html5"></i> Java</h6>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="card">
                   <div class="card-header">
                        <div class="pull-left">
                            <h4 class="mt-2">Languages</h4>
                            <span class="line"></span>  
                        </div>
                    </div>
                    <div class="card-body pb-2">
                       <h6>Tagalog</h6>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h6>English</h6>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 40%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h6>Japanese</h6>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 3%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>