<li wire:poll class="nav-item dropdown " style="padding: 6px">
    <a href="#" class="nav-link dropdown withoutAfter" id="notificationDropdown"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    @if (Auth::user()->unreadNotifications->count())
        <span class="badge badge-danger badge-counter">
            {{Auth::user()->unreadNotifications->count()}}
        </span>
    @endif
    <i class="fas fa-bell fa-lg mr-2 text-gray"></i>
    </a>
    <div  class="dropdown-menu  notification-dropdown"
        aria-labelledby="notificationDropdown">

        @forelse (Auth::user()->unreadNotifications as $notification)
        <a href="{{route('myorder')}}" class="dropdown-item">
            <strong>{{ $notification->data['order_ref_id'] }}</strong> <br>
            Change Successfully to <br>
            <strong>{{$notification->data['next_status']}}</strong>
            <small class="float-right text-muted time">{{ $notification->created_at->diffForHumans() }}</small>
        </a>
        <div class="dropdown-divider"></div>
    @empty
        @foreach (Auth::user()->Notifications as $notification)
        <a href="{{route('myorder')}}" class="dropdown-item">
            <strong>{{ $notification->data['order_ref_id'] }}</strong> <br>
            Change Successfully to <br>
            <strong>{{$notification->data['next_status']}}</strong>
            <small class="float-right text-muted time">{{ $notification->created_at->diffForHumans() }}</small>
        </a>
        <div class="dropdown-divider"></div>
        @endforeach
    @endforelse
    </div>

</li>
