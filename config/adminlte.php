<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => 'Factous',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Google Fonts
    |--------------------------------------------------------------------------
    |
    | Here you can allow or not the use of external google fonts. Disabling the
    | google fonts may be useful if your admin panel internet access is
    | restricted somehow.
    |
    | For detailed instructions you can look the google fonts section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'google_fonts' => [
        'allowed' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b><span class="text-warning"><b>Fact</b>ous</span></b>',
    'logo_img' => '../logo/F.png',
    'logo_img_class' => 'brand-image elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Logo factous',

    /*
    |--------------------------------------------------------------------------
    | Authentication Logo
    |--------------------------------------------------------------------------
    |
    | Here you can setup an alternative logo to use on your login and register
    | screens. When disabled, the admin panel logo will be used instead.
    |
    | For detailed instructions you can look the auth logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'auth_logo' => [
        'enabled' => false,
        'img' => [
            'path' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
            'alt' => 'Auth Logo',
            'class' => '',
            'width' => 50,
            'height' => 50,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Preloader Animation
    |--------------------------------------------------------------------------
    |
    | Here you can change the preloader animation configuration.
    |
    | For detailed instructions you can look the preloader section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'preloader' => [
        'enabled' => false,
        'img' => [
            'path' => '../logo/F.png',
            'alt' => 'AdminLTE Preloader Image',
            'effect' => 'animation_wobble',
            'width' => 600,
            'height' => 600,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-danger',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',


    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-danger elevation-4',
    'classes_sidebar_nav' => 'nav-child-indent',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 190,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'panel',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        // Navbar items:
        [
            'type'         => 'fullscreen-widget',
            'topnav_right' => true,
        ],

        // Sidebar items:

        //Header x rol
        [
            'text' => 'Inicio',
            'icon' => 'fas fa-home',
            'classes' => '',
            'url' => 'panel',

        ],
        [
            'header' => 'Sesión de Administrador',
            'can' => 'admin_vista',
        ],
        [
            'header' => 'Sesión de gerente',
            'can' => 'gerente_vista',
        ],
        [
            'header' => 'Sesión de recepcionista',
            'can' => 'recepcionista_vista',
        ],
        [
            'header' => 'Sesión de cajero',
            'can' => 'cajero_vista',
        ],
        [
            'header' => 'Sesión de canchero',
            'can' => 'canchero_vista',
        ],
        //
        [
            'header' => 'Apertura y cierre de cajas',
            'can' => 'admin_vista',
        ],
        //Apertura y cierre de cajas
        [
            'text' => 'Apertura y Cierre de caja',
            'icon' => 'fas fa-cash-register',
            'can' => ['admin_vista', 'gerente_vista', 'cajero_vista', 'canchero_vista'],
            'submenu' => [
                [
                    'text' => 'Cajas',
                    'route' => 'Cajas.index',
                    'icon' => 'fas fa-users', // icono de fontawesome
                    'can' => 'listado_cajas', // permiso
                    'active' => ['panel/cajas/index'],
                    'shift' => 'ml-3',
                ],
                /*[
                    'text' => 'Abrir Caja',
                    'route' => 'Cajas.create',
                    'icon' => 'fas fa-lock-open', // icono de fontawesome
                    'can' => 'abrir_caja', // permiso
                    'active' => ['panel/cajas/create'],
                    'shift' => 'ml-3',
                ],*/

                /*[
                    'text' => 'Cerrar Caja',
                    'route' => 'Cajas.index',
                    'icon' => 'fas fa-lock', // icono de fontawesome
                    'can' => 'cerrar_caja', // permiso
                    //'active' => ['panel/cajas/cerrar'],
                    'shift' => 'ml-3',
                ],*/
            ]
        ],
        //
        [
            'header' => 'Venta y Facturación',
            'can' => ['admin_vista','cajero_vista','gerente_vista'],
        ],
        //Cobro de cuotas sociales
        [
            'text' => 'Cobro de cuota social',
            'route' => 'cuota_social.index',
            'icon' => 'fas fa-calendar-minus', // icono de fontawesome
            'can' => ['admin_vista', 'cajero_vista', 'gerente_vista'], // permiso
            'active' => ['panel/cuota_social/index'],
        ],
        //
        //Cobro de Act. particular
        [
            'text' => 'Cobro de act particular',
            'route' => 'insc_act_part.index',
            'icon' => 'fas fa-futbol', // icono de fontawesome
            'can' => ['admin_vista', 'cajero_vista', 'gerente_vista'], // permiso
            'active' => ['panel/insc_act_part/index'],
        ],
        [
            'text' => 'Facturas',
            'route' => 'facturas.index',
            'icon' => 'fas fa-lock-open', // icono de fontawesome
            'can' => ['admin_vista', 'cajero_vista', 'gerente_vista'], // permiso
        ],
        [
            'text' => 'facturacion',
            'route' => 'facturas.create',
            'icon' => 'fas fa-lock-open', // icono de fontawesome
            'can' => ['admin_vista', 'cajero_vista', 'gerente_vista'], // permiso
        ],
        [
            'header' => 'Inscripción de socios',
            'can' => ['admin_vista', 'gerente_vista', 'recepcionista_vista'],
        ],
        //Inscripción de socios
        [
            'text' => 'Gestión de Socios',
            'icon' => 'far fa-address-card',
            'can' => ['admin_vista','gerente_vista','recepcionista_vista'],
            'submenu' => [
                [
                    'text' => 'Lista de Socios',
                    'route' => 'socios.index',
                    'icon' => 'fas fa-users', // icono de fontawesome
                    'can' => 'listado_socios', // permiso de admin
                    'active' => ['panel/socios/index'],
                    'shift' => 'ml-3',
                ],
                [
                    'text' => 'Crear Socio',
                    'route' => 'socios.create',
                    'icon' => 'fas fa-plus-circle', // icono de fontawesome
                    'can' => 'crear_socio', // permiso de admin
                    'active' => ['panel/socios/create'],
                    'shift' => 'ml-3',
                ],
                [
                    'text' => 'Socios dados de Baja',
                    'route' => 'socios.dadosdebaja',
                    'icon' => 'fas fa-user-times', // icono de fontawesome
                    'can' => 'crear_socio', // permiso de admin
                    'active' => ['panel/socios/dadosdebaja'],
                    'shift' => 'ml-3',
                ],
                /*[
                    'text' => 'Recuperar Contraseña',
                    'route' => 'socios.resetPassword',
                    'icon' => 'fas fa-key', // icono de fontawesome
                    'can' => 'reset_password', // permiso de admin
                    'active' => ['panel/socios/resetPassword'],
                    'shift' => 'ml-3',
                ],*/

            ]
        ],
        //
        [
            'header' => 'Inscripción de empleados',
            'can' => ['admin_vista', 'gerente_vista', 'recepcionista_vista'],
        ],
        //Gestión de empleados
        [
            'text'    => 'Gestión de empleados',
            'icon'    => 'fas fa-id-card',
            'can' => ['admin_vista', 'gerente_vista', 'recepcionista_vista'],
            'submenu' => [
                [
                    'text' => 'Lista de Empleados',
                    'route' => 'empleados.index',
                    'icon' => 'fas fa-users', // icono de fontawesome
                    'can' => 'listado_empleados', // permiso de admin
                    'active' => ['panel/empleados/index'],
                    'shift' => 'ml-3',
                ],
                [
                    'text' => 'Crear Empleado',
                    'route' => 'empleados.create',
                    'icon' => 'fas fa-plus-circle', // icono de fontawesome
                    'can' => 'crear_empleados', // permiso de admin
                    'active' => ['panel/empleados/create'],
                    'shift' => 'ml-3',
                ],
                [
                    'text' => 'Emp dados de Baja',
                    'route' => 'empleados.dadosdebaja',
                    'icon' => 'fas fa-user-times', // icono de fontawesome
                    'can' => 'crear_empleados', // permiso de admin
                    'active' => ['panel/empleados/dadosdebaja'],
                    'shift' => 'ml-3',
                ],
                /*[
                    'text' => 'Cargos',
                    'route' => 'cargos.index',
                    'icon' => 'fas fa-tasks', // icono de fontawesome
                    'can' => 'listado_cargos', // permiso de admin
                    'active' => ['panel/cargos*'],
                    'shift' => 'ml-3',
                ],*/
            ],
        ],
        //
        [
            'header' => 'Gestión de Actividades',
            'can' => ['admin_vista', 'gerente_vista', 'recepcionista_vista'],
        ],
        //Gestión de actividades
        [
            'text' => 'Gestión de actividades',
            'icon' => 'fas fa-running',
            'can' => ['admin_vista', 'gerente_vista', 'recepcionista_vista'],
            'submenu' => [
                [
                    'text' => 'Actividades',
                    'route' => 'Actividades.index',
                    'icon' => 'fas fa-users', // icono de fontawesome
                    'can' => 'listado_act', // permiso 
                    'shift' => 'ml-3',
                ],
                [
                    'text' => 'Disponibilidades',
                    'route' => 'Disponibilidades.index',
                    'icon' => 'fas fa-users', // icono de fontawesome
                    'can' => 'listado_disponibilidades', // permiso 
                    'shift' => 'ml-3',
                ],
                [
                    'text' => 'Dias por Actividad',
                    'route' => 'DiasxAct.index',
                    'icon' => 'fas fa-users', // icono de fontawesome
                    'can' => 'listado_diasxact', // permiso 
                    'shift' => 'ml-3',
                ],
                [
                    'text' => 'Inscribir socio a actividad',
                    'route' => 'SocxAct.index',
                    'icon' => 'fas fa-users', // icono de fontawesome
                    'can' => 'listado_sxa', // permiso 
                    'shift' => 'ml-3',
                ],
                /*[
                    'text' => 'Gestionar empleados por actividad',
                    'route' => 'EmpxAct.index',
                    'icon' => 'fas fa-users', // icono de fontawesome
                    'can' => 'listado_exa', // permiso 
                    'shift' => 'ml-3',
                ],*/
                [
                    'text' => 'Instalaciones',
                    'route' => 'instalaciones.index',
                    'icon' => 'fas fa-users', // icono de fontawesome
                    'can' => 'listado_socios', // permiso de admin
                    'active' => ['panel/instalaciones*'],
                    'shift' => 'ml-3',
                ],
                [
                    'text' => 'Deportes',
                    'route' => 'deportes.index',
                    'icon' => 'fas fa-users', // icono de fontawesome
                    'can' => 'listado_clientes', // permiso de admin
                    'active' => ['panel/clientes*'],
                    'shift' => 'ml-3',
                ]
            ],
        ],
        //

        [
            'header' => 'Otros',
            'can' => ['admin_vista', 'gerente_vista', 'recepcionista_vista'],
        ],
        //Otros
        [
            'text' => 'Otros',
            'icon' => 'fas fa-link',
            'can' => ['admin_vista', 'gerente_vista', 'recepcionista_vista'],
            'submenu' => [
                // [
                //     'text' => 'Detalles de Facturas',
                //     'route' => 'Det.index',
                //     'icon' => 'fas fa-users', // icono de fontawesome
                //     'can' => 'listado_detallefactura', // permiso 
                //     'shift' => 'ml-3',
                // ],
                [
                    'text' => 'Lista de Clientes',
                    'route' => 'clientes.index',
                    'icon' => 'fas fa-users', // icono de fontawesome
                    //'can' => 'listado_user', // permiso de admin
                    'active' => ['panel/clientes*'],
                    'shift' => 'ml-3',
                ],
                /*[
                    'text' => 'Instalaciones',
                    'route' => 'instalaciones.index',
                    'icon' => 'fas fa-users', // icono de fontawesome
                    'can' => 'listado_user', // permiso
                    'shift' => 'ml-3',
                ],
                [
                    'text' => 'Géneros',
                    'route' => 'generos.index',
                    'icon' => 'fas fa-users', // icono de fontawesome
                    'can' => 'listado_generos', // permiso
                    'shift' => 'ml-3',
                ],
                [
                    'text' => 'Tipos de facturas',
                    'route' => 'Tipo_factura.index',
                    'icon' => 'fas fa-users', // icono de fontawesome
                    'can' => 'listado_user', // permiso
                    'shift' => 'ml-3',
                ],
                [
                    'text' => 'Tipos de detalles de facturas',
                    'route' => 'tipos_detalle_factura.index',
                    'icon' => 'fas fa-users', // icono de fontawesome
                    'can' => 'listado_user', // permiso
                    'shift' => 'ml-3',
                ],
                [
                    'text' => 'Formas de pago',
                    'route' => 'Formas_pago.index',
                    'icon' => 'fas fa-users', // icono de fontawesome
                    'can' => 'listado_user', // permiso
                    'shift' => 'ml-3',
                ],
                [
                    'text' => 'Dias',
                    'route' => 'dias.index',
                    'icon' => 'fas fa-users', // icono de fontawesome
                    'can' => 'listado_dias', // permiso
                    'shift' => 'ml-3',
                ],
                [
                    'text' => 'Países',
                    'route' => 'paises.index',
                    'icon' => 'fas fa-users', // icono de fontawesome
                    'can' => 'listado_paises', // permiso
                    'shift' => 'ml-3',
                ],
                [
                    'text' => 'Provincias',
                    'route' => 'Provincias.index',
                    //'url' => 'panel/socios',
                    'icon' => 'fas fa-users', // icono de fontawesome
                    'can' => 'listado_prov', // permiso
                    'shift' => 'ml-3',
                ],
                [
                    'text' => 'Localidades',
                    'route' => 'Localidades.index',
                    'icon' => 'fas fa-users', // icono de fontawesome
                    'can' => 'listado_localidades', // permiso
                    'shift' => 'ml-3',
                ],*/
            ]
        ],
        /*[
            'text' => 'Lista de Disponibilidades',
            'route' => 'Disponibilidades.index',
            //'url' => 'panel/socios',
            'icon' => 'fas fa-users', // icono de fontawesome
            'can' => 'listado_disponibilidades' // permiso de admin
        ],*/

    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => false,
];
