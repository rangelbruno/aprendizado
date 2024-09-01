<?php

if (!function_exists('is_route_active')) {
    function is_route_active($route)
    {
        return request()->routeIs($route) ? 'active' : '';
    }
}

if (!function_exists('is_routes_active')) {
    function is_routes_active($routes)
    {
        foreach ($routes as $route) {
            if (request()->routeIs($route)) {
                return 'active';
            }
        }
        return '';
    }
}
