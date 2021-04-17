<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="navbar-brand" href="{{ route('principal') }}">Principal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/home') }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <div class="d-flex">
                @if (Route::has('login'))
                    <div class="justify-content-end">
                        <ul class="navbar-nav">
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('/home') }}" class="nav-link">Home</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">Acceder</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="nav-link">Registrarme</a>
                                </li>
                            @endif
                        @endauth
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</nav> 

{{-- <nav class="navbar navbar-inverse navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbars">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="#">Sitio Web</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Inicio</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Pagina 1 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="#">Pagina 1-1</a></li>
                        <li><a href="#">Pagina 1-2</a></li>
                        <li><a href="#">Pagina 1-3</a></li>
                        da
                    </ul>
                </li>
                <li><a href="#">Pagina 2</a></li>
                <li><a href="#">Pagina 3</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                da
                <li><a class="nav-link" href="#"><span class="glyphicon glyphicon-user"></span> Registrarse</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Acceder</a></li>
            </ul>
        </div>
    </div>
</nav> --}}