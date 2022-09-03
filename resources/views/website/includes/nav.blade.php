    <!-- navbar-->
    <header class="header bg-white">
        <div class="container px-0 px-lg-3">
            <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0" aria-label=""><a class="navbar-brand"
                    href="{{route('home')}}"><span class="font-weight-bold text-uppercase text-dark">Cafeteria</span></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <!-- Link--><a class="nav-link active" href="{{route('home')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <!-- Link--><a class="nav-link " href="#">My Order</a>
                        </li>
                    </ul>



                    <ul class="navbar-nav ml-auto">
                        @auth
                        <livewire:website.cart-count-component >
                        <li class="nav-item dropdown mr-20">
                        <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('User_image/'.Auth::user()->image)}}"
                        style="width: 35px;
                                height: 35px;

                                border: 0;
                                border-radius: 50%;" alt="avatar">
                        </a>
                        <div class="dropdown-menu dropdown-menu-left">
                        <div class="dropdown-header">
                            <div class="media">
                            <div class="media-body">
                                <h5 class="mt-0 mb-0">{{Auth::user()->name}}</h5>
                                <span>{{Auth::user()->email}}</span>
                            </div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('account')}}"><i class="text-secondary ti-reload"></i>My Profile</a>
                        <a class="dropdown-item" href="#"><i class="text-success ti-email"></i>Messages</a>
                        <a class="dropdown-item" href="#"><i class="text-warning ti-user"></i>Profile</a>
                        <a class="dropdown-item" href="#"><i class="text-dark ti-layers-alt"></i>Projects <span class="badge badge-info">6</span> </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><i class="text-info ti-settings"></i>Settings</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="text-danger ti-unlock"></i>Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                        </form>
                        </div>
                    </li>
                        @else
                            <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}"> <i
                            class="fas fa-user-alt mr-1 text-gray"></i>Login</a>
                        </li>
                        @endauth

                    </ul>

                </div>
            </nav>
        </div>
    </header>
