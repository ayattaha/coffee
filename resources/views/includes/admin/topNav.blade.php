<div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                    <ul class=" navbar-right">
                        <li class="nav-item dropdown open" style="padding-left: 15px;">
                            <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('assets/admin/images/img.jpg') }}" alt="">  {{ Auth::user()->username }}
                            </a>
                            <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out pull-right"></i> Log Out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                             </div>
                        </li>
                        <!-- resources/views/partials/notifications.blade.php -->
<li role="presentation" class="nav-item dropdown open">
    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
        <i class="fa fa-envelope-o"></i>
        <span class="badge bg-green">{{ $unreadMessages->count() }}</span>
    </a>
    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
        @foreach($unreadMessages as $message)
            <li class="nav-item">
                <a class="dropdown-item" href="{{ route('messages', $message->id) }}">
                    <span class="image"><img src="{{ asset('assets/admin/images/img.jpg') }}" alt="Profile Image" /></span>
                    <span>
                        <span>{{ $message->name }}</span>
                        <span class="time">{{ $message->created_at->diffForHumans() }}</span>
                    </span>
                    <span class="message">
                        {{ Str::limit($message->message, 50) }}
                    </span>
                </a>
            </li>
        @endforeach
        <li class="nav-item">
            <div class="text-center">
                <a class="dropdown-item" href="{{ route('messages') }}">
                    <strong>See All Alerts</strong>
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </li>
    </ul>
</li>

                    </ul>
                </nav>
            </div>
        </div>
        