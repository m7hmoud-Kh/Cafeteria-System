<nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <!-- logo -->
    <div class="text-left navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="{{ route('dashboard') }}"><img
                src="{{ asset('assets/admin/images/logo-dark.png') }}" alt=""></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img
                src="{{ asset('assets/admin/images/logo-icon-dark.png') }}" alt=""></a>
    </div>
    <!-- Top bar left -->
    <ul class="nav navbar-nav mr-auto">
        <li class="nav-item">
            <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left" href="javascript:void(0);"><i
                    class="zmdi zmdi-menu ti-align-right"></i></a>
        </li>
    </ul>
    <!-- top bar right -->
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item fullscreen">
            <a id="btnFullscreen" href="#" class="nav-link"><i class="ti-fullscreen"></i></a>
        </li>

        <li class="nav-item dropdown ">
            <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="false">
                <i class="ti-bell"></i>
                @if (Auth::user()->unreadNotifications->count())
                    <span class="badge badge-success notification-status">
                    </span>
                @else
                    <span class="badge badge-danger notification-status">
                    </span>
                @endif

            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications">
                <div class="dropdown-header notifications">
                    <strong>Notifications</strong>
                    <span class="badge badge-pill badge-warning">{{ Auth::user()->unreadNotifications->count() }}</span>
                </div>
                <div class="dropdown-divider"></div>
                @forelse (Auth::user()->unreadNotifications as $notification)
                    <a href="{{route('orders')}}" class="dropdown-item">
                        <strong> {{ $notification->data['user_name'] }}</strong> <br>
                        Make Order with Ref_id <br>
                        <strong>{{ $notification->data['order_ref_id'] }}</strong>
                        <small class="float-right text-muted time">{{ $notification->created_at }}</small>
                    </a>
                    <div class="dropdown-divider"></div>
                @empty
                    @foreach (Auth::user()->Notifications as $notification)
                        <a href="{{route('orders')}}" class="dropdown-item">
                            <strong> {{ $notification->data['user_name'] }}</strong> <br>
                            Make Order with Ref_id <br>
                            <strong>{{ $notification->data['order_ref_id'] }}</strong>
                            <small class="float-right text-muted time">{{ $notification->created_at }}</small>
                        </a>
                        <div class="dropdown-divider"></div>
                    @endforeach
                @endforelse
                {{Auth::user()->unreadNotifications->markAsRead()}}
            </div>
        </li>

        <li class="nav-item dropdown mr-30">
            <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="true" aria-expanded="false">
                <img src="{{ asset('User_image/' . Auth::user()->image) }}" alt="avatar">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="mt-0 mb-0">{{ Auth::user()->name }}</h5>
                            <span>{{ Auth::user()->email }}</span>
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('home') }}">
                    <i class="text-info ti-home"></i>Website
                </a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="text-danger ti-unlock"></i>Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
