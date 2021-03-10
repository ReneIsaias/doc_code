<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-dark navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="nav-link" data-widget="pushmenu">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown user-menu show">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{-- <img src="{{ asset(Auth::user()->adminlte_image()) }}" class="user-image img-circle elevation-2" alt="{{ Auth::user()->adminlte_image() }}"> --}}
                    <span class="d-none d-md-inline">
                        {{ Auth::user()->name }}
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right"  aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                </div>
                {{-- <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right hide" style="left: inherit; right: 0px;">
                    <li class="user-header bg-dark elevation-3">
                        <img src="{{ asset(Auth::user()->adminlte_image()) }}" class="img-circle elevation-2" alt="{{ Auth::user()->adminlte_image() }}">
                        <p>
                            {{ Auth::user()->name }}
                            <small>{{ Auth::user()->adminlte_desc() }}</small>
                        </p>
                    </li>
                    <li class="user-footer">
                        <a href="#" class="btn btn-default btn-flat">
                            <i class="fa fa-fw fa-user"></i>
                            Perfil
                        </a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat float-right">
                            <i class="fa fa-fw fa-power-off">
                            </i>
                            Salir
                        </a>
                    </li>
                </ul> --}}
            </li>
        </ul>
    </nav>
</div>
