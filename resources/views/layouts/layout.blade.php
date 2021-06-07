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
                                <a href="{{ url('/cart') }}" style="color: yellow">Cart&nbsp;</a>
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

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
</body>
