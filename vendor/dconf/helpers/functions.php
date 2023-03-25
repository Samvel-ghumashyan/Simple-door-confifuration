<?php

function debug($data, $die = false)
{
    echo '<pre>' . print_r($data, 1) . '</pre>';
    if ($die) {
        die;
    }
}

function h($str)
{
    return htmlspecialchars($str);
}

function redirect($http = false)
{
    if ($http) {
        $redirect =  $_SERVER['HTTP_REFERER'] . 'page/page';
        header("Location: $redirect");
        die;
    } else {
        echo 'Some error';
    }

}
