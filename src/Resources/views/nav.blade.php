<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#st-navbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
                <span class="icon-bar"></span> <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}"> Laravel</a>
        </div>

        <div class="collapse navbar-collapse" id="st-navbar">

            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="300" data-close-others="true" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-lg fa-cog"></i>&nbsp; <span class="caret"></span></a>
                    <ul class="dropdown-menu" id="nav_reload">
                        <li class="dropdown-header">System administration</li>
                        <li><a href="{{ route('users.index') }}">User management</a></li>
                    </ul>
                </li>

                <li class="dropdown ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="300" data-close-others="true" role="button" aria-haspopup="true" aria-expanded="false">{{ isset(Auth::user()->name)?Auth::user()->name: 'aa' }}
                        <span class="glyphicon glyphicon-user hide"> </span> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/logout') }}">Logout</a></li>
                    </ul>
                </li>

            </ul>

        </div>
    </div>
</nav>