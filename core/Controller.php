<?php

/**
 * Controller
 */
class Controller
{

    public $request;                    //Objet Request
    private $vars     = array();        // Variables à passer à la $value
    public  $layout   = 'default';      // Layout à utiliser pour rendre la vue
    private $rendered = false;          // Si le rendu a été fait ou pas ?

    /**
     * Constructeur
     * @param $request Objet request de l'application
     **/
    function __construct($request = null)
    {
        if ($request) {
            $this->request = $request; //Je stock la request dans l'instance
        }
    }

    /**
     * Permet de rendre une vue
     * @param $view Ficher à rendre(chemin depuis view ou nom de la vue)
     */

    public function render($view)
    {
        if ($this->rendered) {
            return false;
        }
        extract($this->vars);
        if (strpos($view, '/') === 0) {
            $view = ROOT . DS . 'view' . $view . '.php';
        } else {
            $view = ROOT . DS . 'view' . DS . $this->request->controller . DS . $view . '.php';
        }
        ob_start();
        require($view);
        $content_for_layout = ob_get_clean();
        require ROOT . DS . 'view' . DS . 'layout' . DS . $this->layout . '.php';
        $this->rendered = true;
    }

    /**
     * Permet de passer une ou plusieurs Variables à la vue
     * @param $key Nom de la variable ou tableau de variables
     * @param $value Valeur de la variable
     */

    public function set($key, $value = null)
    {
        if (is_array($key)) {
            $this->vars += $key;
        } else {
            $this->vars[$key] = $value;
        }
    }

    /**
     * Permet de charger un model
     */

    function loadModel($name)
    {
        $file = ROOT . DS . 'model' . DS . $name . '.php';
        require_once($file);
        if (!isset($this->$name)) {
            $this->$name = new $name();
        }
    }

    /**
     * Permet de gérer les erreurs 404
     */

    function e404($message)
    {
        header("HTTP/1.0 404 Not Found");
        $this->set('message', $message);
        $this->render('/errors/404');
        die();
    }

    /**
     * Permet d'appeller un controller depuis une vue
     */

    function request($controller, $action)
    {
        $controller .= 'Controller';
        require_once ROOT . DS . 'controller' . DS . $controller . '.php';
        $c = new $controller();
        return $c->$action();
    }

    function redirect($url, $code){
        if($code == 301){
            header("HTTP/1.1 301 Moved Permanently");
        }
        header("Location: ".Router::url($url));
    }
}
