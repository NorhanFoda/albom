<div class="top_nav">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <ul class="d-flex about-site">
                    <li><a href="#">Questions</a></li>
                    <li><a href="#">Team</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Terms Of Privacy</a></li>
                </ul>
            </div>
            <div class="col-sm-4">
                <ul class="d-flex social ">
                    <li> <a href="#"> <i class="fab fa-facebook-f"></i> </a></li>
                    <li> <a href="#"> <i class="fab fa-twitter"></i> </a></li>
                    <li> <a href="#"> <i class="fab fa-instagram"></i> </a></li>
                    <li> <a href="#"> <i class="fab fa-snapchat-ghost"></i> </a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light ">
    <div class="container">
        <a class="navbar-brand" href="index.html"><img src="{{ asset('web/images/logo-m.png') }}" data-src="{{ asset('web/images/logo-m.png') }}"
                class="lazyload"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <ul class="menu-bars">
                    <li><span></span></li>
                    <li><span></span></li>
                    <li><span></span></li>
                </ul>
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('web.home') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"> Movies Demos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"> Packages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>

                @if(auth()->check() && auth()->user()->hasRole('user'))
                    <li>
                        <a class="nav-link" href="{{ route('web.alboms.index') }}">Alboms</a>
                    </li>

                    <li>
                        <a class="nav-link" href="{{ route('web.profile') }}">Profile</a>
                    </li>
                @endif

                @if(auth()->check() && auth()->user()->hasRole('admin'))
                    <li>
                        <a class="nav-link" href="{{ route('admin.home') }}">Dashboard</a>
                    </li>
                @endif
                
                @guest
                    <li class="nav-item">
                        <button class="btn btn-gradiant">
                            <a href="{{ route('get-login-form') }}">login</a>
                        </button>
                    </li>
                @endguest

                @auth
                    <li class="nav-item">
                        <button class="btn btn-gradiant">
                            <a href="{{ route('web.logout') }}">logout</a>
                        </button>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>