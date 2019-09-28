<nav class="navbar navbar-inverse">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ url('/') }}">Ticket Booking System</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbar-collapse" style="padding-bottom:10px;">


      <ul class="nav navbar-nav navbar-right">
          <li>
              <a href="{{ url('/bus') }}"><i class="fa fa-bus" aria-hidden="true"></i> Bus</a>
          </li>
          <li>
              <a href="#"><i class="fa fa-ship" aria-hidden="true"></i> Launch</a>
          </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <span class="caret"></span></a>
          <ul class="dropdown-menu">
              @guest
                  <li>
                      <a href="{{ url('/signin') }}">Sign In</a>
                  </li>
                  <li>
                      <a href="{{ url('/signup') }}">Sign Up</a>
                  </li>
              @else
                  <li>
                      <a href="{{ url('/dashboard') }}">Dashboard</a>
                  </li>
                  <li>
                      <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                          Logout
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                  </li>
              @endguest
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
