<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Corepago') }}</a>
</div>
<!-- /.navbar-header -->
<ul class="nav navbar-nav navbar-right">

    <!-- Authentication Links -->
    @guest
        @if (Route::has('login'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @endif

        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                    class="fa fa-comments-o"></i><span class="badge">4</span></a>
            <ul class="dropdown-menu">
                {{-- <li class="dropdown-menu-header">
                    <strong>Messages</strong>
                    <div class="progress thin">
                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
                            aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                            <span class="sr-only">40% Complete (success)</span>
                        </div>
                    </div>
                </li>
                <li class="avatar">
                    <a href="#">
                        <img src="images/1.png" alt="" />
                        <div>New message</div>
                        <small>1 minute ago</small>
                        <span class="label label-info">NEW</span>
                    </a>
                </li>
                <li class="avatar">
                    <a href="#">
                        <img src="images/2.png" alt="" />
                        <div>New message</div>
                        <small>1 minute ago</small>
                        <span class="label label-info">NEW</span>
                    </a>
                </li>
                <li class="avatar">
                    <a href="#">
                        <img src="images/3.png" alt="" />
                        <div>New message</div>
                        <small>1 minute ago</small>
                    </a>
                </li>
                <li class="avatar">
                    <a href="#">
                        <img src="images/4.png" alt="" />
                        <div>New message</div>
                        <small>1 minute ago</small>
                    </a>
                </li>
                <li class="avatar">
                    <a href="#">
                        <img src="images/5.png" alt="" />
                        <div>New message</div>
                        <small>1 minute ago</small>
                    </a>
                </li>
                <li class="avatar">
                    <a href="#">
                        <img src="images/pic1.png" alt="" />
                        <div>New message</div>
                        <small>1 minute ago</small>
                    </a>
                </li>
                <li class="dropdown-menu-footer text-center">
                    <a href="#">View all messages</a>
                </li> --}}
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"><img src="images/1.png">
                {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu">
                {{-- <li class="dropdown-menu-header text-center">
                    <strong>Account</strong>
                </li>
                <li class="m_2"><a href="#"><i class="fa fa-bell-o"></i> Updates <span
                            class="label label-info">42</span></a></li>
                <li class="m_2"><a href="#"><i class="fa fa-envelope-o"></i> Messages <span
                            class="label label-success">42</span></a></li>
                <li class="m_2"><a href="#"><i class="fa fa-tasks"></i> Tasks <span
                            class="label label-danger">42</span></a></li>
                <li><a href="#"><i class="fa fa-comments"></i> Comments <span
                            class="label label-warning">42</span></a></li>
                <li class="dropdown-menu-header text-center">
                    <strong>Settings</strong>
                </li> --}}
                <li class="m_2"><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                <li class="m_2"><a href="#"><i class="fa fa-wrench"></i> Settings</a></li>
                {{-- <li class="m_2"><a href="#"><i class="fa fa-usd"></i> Payments <span
                            class="label label-default">42</span></a></li>
                <li class="m_2"><a href="#"><i class="fa fa-file"></i> Projects <span
                            class="label label-primary">42</span></a></li>
                <li class="divider"></li> --}}
                {{-- <li class="m_2"><a href="#"><i class="fa fa-shield"></i> Lock Profile</a></li> --}}
                <li class="m_2">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                        <i class="fa fa-lock"></i>{{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

            </ul>
        </li>
    @endguest
</ul>

<form class="navbar-form navbar-right">
    <input type="text" class="form-control" value="Search..." onfocus="this.value = '';"
        onblur="if (this.value == '') {this.value = 'Search...';}">
</form>
