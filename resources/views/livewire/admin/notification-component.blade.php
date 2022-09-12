<li wire:poll class="nav-item dropdown ">
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
                <small class="float-right text-muted time">{{ $notification->created_at->diffForHumans() }}</small>
            </a>
            <div class="dropdown-divider"></div>
        @empty
            @foreach (Auth::user()->Notifications as $notification)
                <a href="{{route('orders')}}" class="dropdown-item">
                    <strong> {{ $notification->data['user_name'] }}</strong> <br>
                    Make Order with Ref_id <br>
                    <strong>{{ $notification->data['order_ref_id'] }}</strong>
                    <small class="float-right text-muted time">{{ $notification->created_at->diffForHumans() }}</small>
                </a>
                <div class="dropdown-divider"></div>
            @endforeach
        @endforelse
    </div>
</li>
