<?php
define('WEBROOT', str_replace('Webroot/index.php', '', $_SERVER['SCRIPT_NAME']));
define('ROOT', str_replace('Webroot/index.php', '', $_SERVER['SCRIPT_FILENAME']));
require(ROOT.'Core/appModel.php');
require(ROOT.'Core/appController.php');
require(ROOT.'Config/Db.php');


class Dispatcher{

    protected $controller;
    protected $action;
    protected $id;

    public function __construct($controller, $action, $id = null)
    {
        $this->controller = $controller;
        $this->action = $action;
        $this->id = $id;
    }

    public function dispatch(){
    if (isset($this->controller)) {
        require('Controllers/'.$this->controller.'.php');
    }

    $controller = new $this->controller;
    $action = $this->action; 

    
    if (method_exists($this->controller, $this->action)) {
        
        if(isset($this->id))
        {
        //call_user_func_array(array($controller, $action), $this->id);
        $controller->$action($this->id);
        }
        else
        {
        $controller->$action();
        }
    }

    else {
        echo 'erreur 404';
    }

    }

}
?>