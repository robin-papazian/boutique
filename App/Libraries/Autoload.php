<?php


function autoload($myclass)
{
    $filepath = str_replace('\\', '/', $myclass)  . '.php';
    require $filepath;
}

function apiload($class)
{
    $filepath = str_replace('\\', '/', $class)  . '.php';
    $filepath = str_replace('App/Controller/', '', $filepath);
    require $filepath;
}
