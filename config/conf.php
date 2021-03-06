<?php

class Conf
{

    static $debug = 1;

    static $database = array(
        'default' => array(
            'host'     => 'localhost',
            'database' => 'cms',
            'login'    => 'root',
            'password' => ''
        )
    );
}


Router::connect('post/:slug-:id', 'posts/view/id:([0-9]+)/slug:([a-z0-9\-]+)');
Router::connect('blog/:action', 'posts/:action');
Router::connect('/', 'posts/index');
