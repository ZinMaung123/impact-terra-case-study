<?php

if(!function_exists('swapLangRoute')){
    function swapLangRoute($lang){

        $paths = explode('?', request()->fullUrl());

        $queryStrings = isset($paths[1]) ? ("?" . $paths[1]) : "" ;

        $segments = request()->segments();

        $segments[0] = $lang;
        $fullPath = implode('/', $segments) . $queryStrings;

        return url($fullPath);
    }
}