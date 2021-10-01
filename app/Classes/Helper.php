<?php

function isActiveRoute($route, $output = "active"){
    if (\Route::currentRouteName() == $route) return $output;
}

function areActiveRoutes(Array $routes, $output = "active show-sub"){

    foreach ($routes as $route){
        if (\Route::currentRouteName() == $route) return $output;
    }
}

function areActiveMainRoutes(Array $routes, $output = "active"){

    foreach ($routes as $route){
        if (\Route::currentRouteName() == $route) return $output;
    }
}


function checkPermissions(array $permissions){

    if(auth()->check()){
        
        return auth()->user()->hasAnyPermission($permissions);
    }

    return false;

}