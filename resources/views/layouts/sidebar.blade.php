<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="index.html"><i class="fa fa-dashboard fa-fw nav_icon"></i>Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-laptop nav_icon"></i>Transaction<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('send')}}">Send</a>
                    </li>
                    <li>
                        <a href="{{route('receive')}}">Receive</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="{{route('history')}}"><i class="fa fa-dashboard fa-fw nav_icon"></i>History</a>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
