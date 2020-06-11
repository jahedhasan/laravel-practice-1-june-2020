      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Hello, <b>{{ Auth::user()->name }}</b></a>
          </div>
          
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout').submit();">
                  <i class="material-icons">exit_to_app</i>
                  <p class="d-lg-none d-md-block">
                    Logout
                  </p>
                </a>
                <form action="{{ route('logout') }}" id="logout" method="POST" style="display: none;">
                  @csrf
                </form>
              </li>
            </ul>
          </div>
        </div>
      </nav>