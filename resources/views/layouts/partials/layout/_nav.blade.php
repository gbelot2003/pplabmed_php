<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                PIF Patología
            </a>

        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav navbar-left">
                @if(Entrust::can('manage-cito') || Entrust::can('manage-histo') || Entrust::can('show-fact'))
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Resultados<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            @if(Entrust::can('manage-cito'))
                                <li class="dropdown-header">Citología</li>
                                <li><a href="{{ action('CitologiaController@index') }}">Listado de Citología</a></li>
                                <li><a href="{{ action('CitologiaController@create') }}">Nueva Citología</a></li>
                                <li class="divider"></li>
                            @endif

                            @if(Entrust::can('manage-histo'))
                                <li class="dropdown-header">Histopatología</li>
                                <li><a href="{{ action('HistopatologiaController@index') }}">Listado de
                                        Histopatología</a></li>
                                <li><a href="{{ action('HistopatologiaController@create') }}">Nueva Histopatología</a>
                                </li>
                            @endif

                            @if(Entrust::can('show-fact'))
                                <li class="divider"></li>
                                <li class="dropdown-header">Facturas</li>
                                <li><a href="{{ action('FacturasController@index') }}">Listado de Facturas</a></li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if(Entrust::can('generate-reportes'))
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Reportes<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li class="dropdown-header">Hojas de Trabajo</li>
                            <li><a href="{{ route('reporte.cito.index') }}"> Informe de Citología</a></li>
                            <li><a href="{{ route('reporte.histo.index') }}"> Informe de Biopsias</a></li>
                            <li><a href="{{ route('reporte.sedes.index') }}"> Informe por sedes de entrega</a></li>
                            <li><a href="{{ route('reporte.muestras.index') }}"> Reporte de entrega de muestras</a>
                            </li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Estadisticas</li>
                            <li><a href="{{ route('reporte.identificador.index') }}"> Identificadores de Citologías</a>
                            </li>
                            <li><a href="{{ route('reporte.anormales.index') }}"> Citologías Anormales</a></li>
                            <li><a href="{{ route('reporte.morfo.index') }}"> Estadisticas de Morfologías</a></li>
                        </ul>
                    </li>
                @endif

                @if(Entrust::can('manage-users') || Entrust::can('manage-rols') || Entrust::can('see-users'))
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Seguridad<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            @if(Entrust::can('manage-rols'))
                                <li class="dropdown-header">Permisos</li>
                                <li><a href="{{ action('PermissionController@index') }}">Permisos</a></li>
                                <li><a href="{{ action('RolesController@index') }}">Roles</a></li>
                            @endif

                            @if(Entrust::can('see-users') || Entrust::can('manage-users'))
                                <li class="divider"></li>
                                <li class="dropdown-header">Usuarios</li>
                                <li><a href="{{ action('UserController@index') }}">Listado de Usuarios</a></li>
                                @if(Entrust::can('manage-users'))
                                    <li><a href="{{ action('UserController@create') }}">Creación de Usuarios</a></li>
                                @endif
                            @endif
                        </ul>
                    </li>
                @endif

                @if(Entrust::can('manage-firmas') || Entrust::can('manage-ids'))
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Parametrización<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">

                            @if(Entrust::can('manage-firmas'))
                                <li class="dropdown-header">Firmas</li>
                                <li><a href="{{ action('FirmasController@index') }}">Lista de Firmas</a></li>
                                <li><a href="{{ action('FirmasController@create') }}">Agregar Nueva Firma</a></li>
                            @endif

                            @if(Entrust::can('manage-ids'))
                                <li class="divider"></li>
                                <li class="dropdown-header">Id. Citologías</li>
                                <li><a href="{{ action('CategoryController@index') }}">Lista de Id. Citologías</a></li>
                                <li><a href="{{ action('CategoryController@create') }}">Agregar Nueva Id. Citologías</a>
                                </li>
                            @endif

                            @if(Entrust::can('manage-templates'))
                                <li class="divider"></li>
                                <li><a href="{{ action('PlantillasController@index') }}">Formatos y plantillas</a></li>
                            @endif
                        </ul>
                    </li>
                @endif
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->username }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('change.password') }}">Cambiar Password</a></li>
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>