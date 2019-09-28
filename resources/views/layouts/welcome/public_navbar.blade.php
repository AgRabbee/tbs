
    <div class="container">
        <div class="col-md-4" style="margin:10px 0">
            <a class="navbar-brand" href="{{ url('/') }}">Ticket Booking System</a>
        </div>
        <div class="col-md-8" style="padding:0">
            <div class="tb_navbar">
                <ul>
                    <li>
                        <a href="{{ url('/') }}">Home&nbsp;<span style="color:#f0a2a3;"> |</span></a>
                    </li>
                    <li>
                        <a href="{{ url('/company/register') }}">Register Your Company&nbsp;<span style="color:#f0a2a3;">|</span></a>
                    </li>
                    <li>
                        <a href="#myModals" data-toggle="modal" data-target="#myModals">Print/SMS Ticket&nbsp;<span style="color:#f0a2a3;">|</span></a>
                    </li>
                    <li>
                        <a href="#myModals" data-toggle="modal" data-target="#myModals">Easy Cancel/Refund&nbsp;<span style="color:#f0a2a3;">|</span></a>
                    </li>
                    @guest
                    <li>
                        <a href="#myModals" data-toggle="modal" data-target="#myModals">Sign In<span style="color:#f0a2a3;">/</span></a>
                    </li>
                    <li>
                        <a href="#myModal" data-toggle="modal" data-target="#myModal">Sign Up</a>
                    </li>
                    @else
                    <li>
                        <a href=""><i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->first_name }}&nbsp;<span style="color:#f0a2a3;">|</span></a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
    <div class="shadow"><img src="http://demo.truebus.co.in/assets/images/shadow.png"></div>
