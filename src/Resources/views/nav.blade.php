<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span>
                <span class="icon-bar"></span> <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}"> User Management</a>
        </div>

        <div class="collapse navbar-collapse">

            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>


                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="300" data-close-others="true"role="button" aria-haspopup="true" aria-expanded="false">Section 1<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action 1</a></li>
                        <li><a href="#">Action 2</a></li>
                        <li><a href="#">Action 3</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">SECTION GROUP</li>
                        <li><a href="#">Link 1</a></li>
                        <li><a href="#">Link 2</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="300" data-close-others="true" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-lg fa-cog"></i>&nbsp; <span class="caret"></span></a>
                    <ul class="dropdown-menu" id="nav_reload">
                        <li class="dropdown-header">SYSTEM</li>
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
