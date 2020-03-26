<?php

if(!defined('__ROOT__')) {
    define('__ROOT__', __DIR__);
}

function dd($data)
{
    echo "<pre />";
    print_r($data);
    die();
}