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
                PIF Patología
            </a>

        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav navbar-left">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Resultados<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ action('CitologiaController@index') }}">Citologia</a></li>
                        <li><a href="{{ action('HistopatologiaController@index') }}">Histopatologia</a></li>
                    </ul>
                </li>

                <li><a href="{{ action('AreaController@index') }}">Hojas de Trabajo</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Seguridad<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        @if(Entrust::can('show-perms'))
                        <li class="dropdown-header">Permisos</li>
                        <li><a href="{{ action('PermissionController@index') }}">Permisos</a></li>
                        @endif
                        @if(Entrust::can('edit-roles', 'creat-roles'))
                        <li><a href="{{ action('RolesController@index') }}">Roles</a></li>
                        @endif
                        <li class="divider"></li>
                        <li class="dropdown-header">Usuarios</li>
                        <li><a href="{{ action('UserController@index') }}">Listado de Usuarios</a></li>
                        <li><a href="{{ action('UserController@create') }}">Creación de Usuarios</a></li>
                        <li class="divider"></li>
                        <li class="dropdown-header">Bitacora</li>
                        <li><a href="{{ action('CitologiaController@index') }}">Reporte de Actividades</a></li>

                    </ul>
                </li>


                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Parametrización<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li class="dropdown-header">Áreas</li>
                        <li><a href="{{ action('AreaController@index') }}">Lista de Áreas</a></li>
                        @if(Entrust::can('create-area'))
                        <li><a href="{{ action('AreaController@create') }}">Agregar Nueva Área</a></li>
                        @endif
                        <li class="divider"></li>
                        <li class="dropdown-header">Firmas</li>
                        <li><a href="{{ action('FirmasController@index') }}">Lista de Firmas</a></li>
                        @if(Entrust::can('create-firmas'))
                        <li><a href="{{ action('FirmasController@create') }}">Agregar Nueva Firma</a></li>
                        @endif
                        <li class="divider"></li>
                        <li class="dropdown-header">Id. Citologías</li>
                        <li><a href="{{ action('CategoryController@index') }}">Lista de Id. Citologías</a></li>
                        @if(Entrust::can('create-citologias'))
                        <li><a href="{{ action('CategoryController@create') }}">Agregar Nueva Id. Citologías</a></li>
                        @endif
                        <li class="divider"></li>
                        <li class="dropdown-header">Gravidad</li>
                        <li><a href="{{ action('GravidadController@index') }}">Lista de Gravidades</a></li
                        @if(Entrust::can('create-gravidad'))
                        <li></li>
                        <li><a href="{{ action('GravidadController@create') }}">Agregar Nueva Gravidad</a></li>
                        @endif
                        <li class="divider"></li>
                        <li class="dropdown-header">Morfologías</li>
                        <li><a href="{{ action('MorfologiaController@index') }}">Lista de Morfologías</a></li>
                        @if(Entrust::can('create-morfologia'))
                        <li><a href="{{ action('MorfologiaController@create') }}">Agregar Nueva Morfologías</a></li>
                        @endif
                        <li class="divider"></li>
                        <li class="dropdown-header">Topología</li>
                        <li><a href="{{ action('TopologiaController@index') }}">Lista de Topología</a></li>
                        @if(Entrust::can('create-topologia'))
                        <li><a href="{{ action('TopologiaController@create') }}">Agregar Nueva Topología</a></li>
                        @endif
                    </ul>
                </li>
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
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
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