
    <nav class="navbar navbar-inverse"  style="background-color: #6cb2eb; border: none; border-radius: 0">
        <div style="display: flex">

        <div class="navbar-header" style="flex: 1">
            <a style="color: white; font-weight: bold" class="navbar-brand" href="#">HR PORTAL</a>
        </div>
        <ul class="nav navbar-nav ml-3">



            @if (Route::has('login') )

                @auth
                    @if(Auth::user() && Auth::user()->isAdmin===1)
                        <li class="active" style="margin-right: 10px">
                            <a style="color: white" href={{route('admin.home')}}>Go to Admin Panel</a>
                        </li>
                    @else
                        <li class="active" style="margin-right: 10px"><a style="color: white" href="{{ url('/home') }}">Home</a></li>

                    @endif
                    <li><a href="{{ url('/logout') }}"
                           style="color: white"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit(); ">
                            Sign out
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @else
                    <li> <a href="{{ route('login') }}">Login</a></li>

                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @endif
                @endauth

            @endif

        </ul>
        </div>

    </nav>



