<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-5">
    <a class="navbar-brand" href="{{ url('/') }}">Ticket Booking System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse  d-flex justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/bus') }}"><i class="fas fa-bus"></i> Bus</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#modal-default" href="#"><i class="fas fa-ship"></i> Launch</a>
            </li>

            @guest
            @else
                @if (Auth::user()->companies->count())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/company/dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/company/register') }}"><i class="far fa-building"></i> Register your Company</a>
                    </li>
                @endif
            @endguest



            <!-- User Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#"><i class="far fa-user"></i></a>

                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    @guest
                        <span class="dropdown-item dropdown-header">Sign In / Sign Up</span>
                        <div class="dropdown-divider"></div>
                        <a href="{{ url('/signin') }}" class="dropdown-item">
                            <i class="fas fa-sign-in-alt mr-2"></i> Sign In
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ url('/signup') }}" class="dropdown-item">
                            <i class="fas fa-user-plus mr-2"></i> Sign Up
                        </a>
                    @else
                        <span class="dropdown-item dropdown-header">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name}}</span>

                        <div class="dropdown-divider"></div>

                        <a href="#" class="dropdown-item">
                            <i class="fas fa-address-card mr-2"></i> Profile
                        </a>
                        <div class="dropdown-divider"></div>

                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt mr-2"></i> Sign Out
                        </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                            </form>
                    @endguest
                </div>
            </li>

        </ul>
    </div>
</nav>

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-success">Announcement!!!</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Coming up with the next update...</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default mx-auto" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
