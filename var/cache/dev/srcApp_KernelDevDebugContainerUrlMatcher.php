<?php

use Symfony\Component\Routing\Matcher\Dumper\PhpMatcherTrait;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcApp_KernelDevDebugContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    use PhpMatcherTrait;

    public function __construct(RequestContext $context)
    {
        $this->context = $context;
        $this->staticRoutes = [
            '/contacto/nuevo' => [[['_route' => 'nuevo_contacto', '_controller' => 'App\\Controller\\ContactoController::nuevo'], null, null, null, false, false, null]],
            '/contacto/insertar' => [[['_route' => 'insertar_contacto', '_controller' => 'App\\Controller\\ContactoController::insertar'], null, null, null, false, false, null]],
            '/login' => [[['_route' => 'login', '_controller' => 'App\\Controller\\LoginController::index'], null, null, null, false, false, null]],
            '/register' => [[['_route' => 'register', '_controller' => 'App\\Controller\\LoginController::register'], null, null, null, false, false, null]],
            '/' => [[['_route' => 'index', '_controller' => 'App\\Controller\\PageController::index'], null, null, null, false, false, null]],
            '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
            '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
            '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
            '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
            '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
            '/logout' => [[['_route' => 'logout'], null, null, null, false, false, null]],
        ];
        $this->regexpList = [
            0 => '{^(?'
                    .'|/contacto(?'
                        .'|(?:/(\\d+))?(*:30)'
                        .'|/(?'
                            .'|editar/(\\d+)(*:53)'
                            .'|actualizar/(\\d+)(*:76)'
                            .'|borrar/([^/]++)(*:98)'
                            .'|([^/]++)(*:113)'
                        .')'
                    .')'
                    .'|/_(?'
                        .'|error/(\\d+)(?:\\.([^/]++))?(*:154)'
                        .'|wdt/([^/]++)(*:174)'
                        .'|profiler/([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:220)'
                                .'|router(*:234)'
                                .'|exception(?'
                                    .'|(*:254)'
                                    .'|\\.css(*:267)'
                                .')'
                            .')'
                            .'|(*:277)'
                        .')'
                    .')'
                .')/?$}sDu',
        ];
        $this->dynamicRoutes = [
            30 => [[['_route' => 'ficha_contacto', 'codigo' => '1', '_controller' => 'App\\Controller\\ContactoController::ficha'], ['codigo'], null, null, false, true, null]],
            53 => [[['_route' => 'editar_contacto', '_controller' => 'App\\Controller\\ContactoController::editar'], ['codigo'], null, null, false, true, null]],
            76 => [[['_route' => 'actualizar_contacto', '_controller' => 'App\\Controller\\ContactoController::actualizar'], ['id'], null, null, false, true, null]],
            98 => [[['_route' => 'borrar_contacto', '_controller' => 'App\\Controller\\ContactoController::borrar'], ['id'], null, null, false, true, null]],
            113 => [[['_route' => 'buscar_contacto', '_controller' => 'App\\Controller\\ContactoController::buscar'], ['texto'], null, null, false, true, null]],
            154 => [[['_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
            174 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
            220 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
            234 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
            254 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception::showAction'], ['token'], null, null, false, false, null]],
            267 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception::cssAction'], ['token'], null, null, false, false, null]],
            277 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        ];
    }
}
