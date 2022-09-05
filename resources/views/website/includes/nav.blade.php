    <!-- navbar-->
    <header class="header bg-white">
        <div class="container px-0 px-lg-3">
            <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0" aria-label=""><a class="navbar-brand"
                    href="{{ route('home') }}"><span
                        class="font-weight-bold text-uppercase text-dark">Cafeteria</span></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <!-- Link--><a class="nav-link active" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <!-- Link--><a class="nav-link " href="{{ route('myorder') }}">My Order</a>
                        </li>
                    </ul>



                    <ul class="navbar-nav ml-auto">
                        @auth
                                @if (!Auth::user()->isAdmin)
                                    <livewire:website.cart-count-component>

                                    <li class="nav-item dropdown " style="padding: 6px">
                                        <a href="#" class="nav-link dropdown withoutAfter" id="notificationDropdown"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        @if (Auth::user()->unreadNotifications->count())
                                            <span class="badge badge-danger badge-counter">
                                                {{Auth::user()->unreadNotifications->count()}}
                                            </span>
                                        @endif
                                        <i class="fas fa-bell fa-lg mr-2 text-gray"></i>
                                        </a>
                                        <div class="dropdown-menu  notification-dropdown"
                                            aria-labelledby="notificationDropdown">

                                            @forelse (Auth::user()->unreadNotifications as $notification)
                                            <a href="{{route('myorder')}}" class="dropdown-item">
                                                <strong>{{ $notification->data['order_ref_id'] }}</strong> <br>
                                                Change Successfully to <br>
                                                <strong>{{$notification->data['next_status']}}</strong>
                                                <small class="float-right text-muted time">{{ $notification->created_at }}</small>
                                            </a>
                                            <div class="dropdown-divider"></div>
                                        @empty
                                            @foreach (Auth::user()->Notifications as $notification)
                                            <a href="{{route('myorder')}}" class="dropdown-item">
                                                <strong>{{ $notification->data['order_ref_id'] }}</strong> <br>
                                                Change Successfully to <br>
                                                <strong>{{$notification->data['next_status']}}</strong>
                                                <small class="float-right text-muted time">{{ $notification->created_at }}</small>
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            @endforeach
                                        @endforelse
                                        {{Auth::user()->unreadNotifications->markAsRead()}}

                                        </div>

                                    </li>
                                @endif
                                <li class="nav-item dropdown mr-20">
                                    <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#"
                                        role="button" aria-haspopup="true" aria-expanded="false">
                                        <img src="{{ asset('User_image/' . Auth::user()->image) }}"
                                            style="width: 35px;
                                                height: 35px;
                                                border: 0;
                                                border-radius: 50%;" alt="avatar">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-left"style="">
                                        <div class="dropdown-header">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h5 class="mt-0 mb-0">{{ Auth::user()->name }}</h5>
                                                    <span>{{ Auth::user()->email }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('account') }}"><i
                                                class="text-secondary ti-reload"></i>My Profile</a>

                                        <div class="dropdown-divider"></div>
                                        @if (Auth::user()->isAdmin)
                                            <a class="dropdown-item" href="{{ route('dashboard') }}">
                                                <i class="text-info ti-settings"></i>Admin
                                            </a>
                                        @endif

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            <i class="text-danger ti-unlock"></i>Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                        @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}"> <i
                                            class="fas fa-user-alt mr-1 text-gray"></i>Login</a>
                                </li>
                        @endauth
                    </ul>

                </div>
            </nav>
        </div>
    </header>
