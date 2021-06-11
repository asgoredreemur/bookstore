<head>
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
    <div class="header">
        <table class="brand" width="100%"><tr><td  width=1% class="logoimg"><a href="{{ url('/') }}"><img src="/img/logo.png" alt="logo" class="logo"></a></td><td class="logotext"><a href="{{ url('/') }}" class="redirect"><h2 align="left">Hardcover.com</h2></a></td>
        <td> </td>
        <td><div align="right">
            @guest
                            @if (Route::has('login'))
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}&nbsp;</a>
                            @endif

                            @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}&nbsp;</a>
                            @endif
                        @else
                            <div class="nav-item dropdown">
                                <p>
                                <img src="/img/userlogo.png" height="35"><a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Hi, {{ Auth::user()->name }}
                                </a>
                                <img src="/img/cartlogo.png" height="35"><a href="{{ url('/cart') }}" style="color: yellow" >Cart&nbsp;</a>
                                </p>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="color: yellow">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @endguest
        </div></td>
        </tr></table>
    </div>
    <div>
    @yield('content')
    </div>
    <div>
    @yield('scripts')
    </div>
</body>
