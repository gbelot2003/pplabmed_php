<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'checkActive' =>  \App\Http\Middleware\StatusCheck::class,

        'createArea' => \App\Http\Middleware\CreateArreaPermission::class,
        'editArea' => \App\Http\Middleware\EditAreaPermission::class,

        'createFirma' => \App\Http\Middleware\CrearFirmasPermission::class,
        'editarFirma' => \App\Http\Middleware\EditarFirmasPermission::class,

        'createIdCito' => \App\Http\Middleware\CrearIdCitologiaPermission::class, //TODO: replegar permisos en plantillas de IdCitologia
        'editIdCito' => \App\Http\Middleware\EditIdCitologiaPermission::class, //

        'createGravidad' => \App\Http\Middleware\CreateGravidadPermission::class, //TODO: replegar permisos en plantillas de Gravidades
        'editGravidad'  => \App\Http\Middleware\EditGravidadPermission::class, //

        'createMorfo' => \App\Http\Middleware\CreateMorfologiaPermission::class, //TODO: replegar permisos en plantillas de Morfologias
        'editMorfo' => \App\Http\Middleware\EditMorfologiaPermission::class, //

        'createTopo' => \App\Http\Middleware\CreateTopologiaPermission::class, //TODO: replegar permisos en plantillas de Topologias
        'editTopo' => \App\Http\Middleware\EditTopologiaPermission::class,

        'showPerm' => \App\Http\Middleware\ShowPermsPermission::class, //TODO: replegar permisos en plantillas y menu

        'createRoles' => \App\Http\Middleware\CrearRolesPermission::class, //TODO: replegar permisos en plantillas de Roles
        'editRoles' => \App\Http\Middleware\EditRolesPermission::class,

        'showUser' => \App\Http\Middleware\ShowUsersPermission::class, //TODO: replegar permisos en plantillas de Usuarios
        'createUser' => \App\Http\Middleware\CrearUsuariosPermission::class,
        'editUser' => \App\Http\Middleware\EditUsuariosPermission::class,

        'showBita' => \App\Http\Middleware\ShowBitacoraPermission::class,

        'showCito' => \App\Http\Middleware\ShowCitologiaPermission::class,
        'createCito' => \App\Http\Middleware\CreateCitologiasPermission::class,
        'editCito' => \App\Http\Middleware\EditCitologiaPermission::class,

        'showHisto' => \App\Http\Middleware\ShowHistoPermission::class,
        'createHito' => \App\Http\Middleware\CreateCitologiasPermission::class,
        'editCito' => \App\Http\Middleware\EditHistoPermission::class,

    ];

    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,

    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            //\Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];
}
