<?php
namespace App\Routing;

use AltoRouter;

/**
 * RouterConfig
 *  Sets all routes of the backend application
 * @author DaCoDeMaNiaK <jean-luc.aubert@aelion.fr>
 * @version 1.0.0
 * @see AltoRouter
 */

final class RouterConfig extends AltoRouter
{
    /**
     * @property array Routes settings
     */
    private $_appRoutes = [
        'user' => [
            // <=> RequestMapping de SpringBoot
            [
                'method' => 'GET',
                'route' => 'login',
                'target' => 'App\Controllers\UserController#loginForm',
                'name' => 'user-login-form'
            ],
            // <=> @GetMapping de SpringBoot
            [
                'method' => 'POST',
                'route' => 'login',
                'target' => 'App\Controllers\UserController#loginProcess',
                'name' => 'user-login-process'
            ] // <=> @PostMapping de SpringBoot         
        ]
    ];

    public function __construct()
    {
        $this->_mapRoutes();
    }

    /**
     * Return routes settings
     * @return array
     */
    public function getAppRoutes(): array
    {
        return $this->_appRoutes;
    }

    /**
     * Map routes using AltoRouter map method
     * @see AltoRouter::map()
     */
    private function _mapRoutes(): void
    {
        // Loop over _appRoutes property
        foreach ($this->_appRoutes as $requestMapping => $routes) {
            // Loop over routes for this requestMapping
            foreach ($routes as $routeDetail) {
                // Call the map method of parent class (AltoRouter)
                $this->map(
                    $routeDetail['method'],
                    '/' . $requestMapping . '/' . $routeDetail['route'],
                    $routeDetail['target'],
                    $routeDetail['name']
                );
            }
        }
    }
}