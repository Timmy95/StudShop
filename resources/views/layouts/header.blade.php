	<nav class="navbar navbar-default navbar-static-top">
	    <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img alt="KKP" src="{{ URL::asset('img/logo1.png') }}" height="150%">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/news') }}"><button type="button" class="btn btn-default btn-my">Новости</button></a></li>
                    <li><a href="{{ url('/auctions') }}"><button type="button" class="btn btn-success btn-my">Купить</button></a></li>
                </ul>
                @if (!Auth::guest())
	                <ul class="nav navbar-nav">
	                    <li><a href="{{ url('/auctions/create') }}"><button type="button" class="btn btn-warning btn-my">Продать</button></a></li>
	                </ul>
                @endif

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}"><button type="button" class="btn btn-default btn-my">Логин</button></a></li>
                        <li><a href="{{ url('/register') }}"><button type="button" class="btn btn-default btn-my">Регистрация</button></a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            	<button type="button" class="btn btn-default btn-my">
                                {{ Auth::user()->name }} <span class="caret"></span>
                                </button>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
            
        </div>
    </nav>

