
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{ asset('AdminBSB/images/user.png')}}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</div>
            <div class="email">Member since {{ Auth::user()->created_at->format('d M, Y') }}</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#"><i class="material-icons">person</i>link</a></li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            <i class="material-icons">input</i>Sign Out
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header"> USER</li>
            <li>
                <a href="{{ url('/dashboard/allusers') }}">
                    <i class="material-icons col-light-blue">donut_large</i>
                    <span>All Users</span>
                </a>
            </li>


            <li class="header">Company</li>
            <li>
                <a href="#" class="menu-toggle">
                    <i class="material-icons col-light-blue">account_box</i>
                    <span>Company Admins</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="">All Admins</a>
                    </li>
                    <li>
                        <a href="{{ url('/dashboard/new/admins') }}">New Admins</a>
                    </li>
                </ul>

            </li>
            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">widgets</i>
                    <span>Widgets</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>Cards</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="../../pages/widgets/cards/basic.html">Basic</a>
                            </li>
                            <li>
                                <a href="../../pages/widgets/cards/colored.html">Colored</a>
                            </li>
                            <li>
                                <a href="../../pages/widgets/cards/no-header.html">No Header</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- #Menu -->

    <!-- Footer -->
    @include('layouts._partials.admin_footer')
    <!-- #Footer -->

</aside>
