<?php

class Request
{

    public $url;  //URL appelé par l'utilisateur
    public $page = 1;

    function __construct()
    {
        $this->url = isset($_SERVER['PATH_INFO'])? $_SERVER['PATH_INFO']:'/';
        if (isset($_GET['page'])) {
            if (is_numeric($_GET['page'])) {
                if ($_GET['page'] > 0) {
                    $this->page = round($_GET['page']);
                }
            }
        }
    }
}
