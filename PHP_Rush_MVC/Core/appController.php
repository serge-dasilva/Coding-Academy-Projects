<?php
class appController {
    var $vars = array();
    var $layout = 'default';

    function loadModel($name) {
        require_once(ROOT . 'Models/' .strtolower($name).'.php');
        $this->$name = new $name(); 
    }

    public function set($d) {
        $this->vars = array_merge($this->vars, $d);
    }

    public function render($filename) {
        extract($this->vars);
        ob_start();
        require(ROOT . 'Views/'.get_class($this).'/' . $filename . '.php');
        $content_for_layout = ob_get_clean();
        if ($this->layout == false) {
            echo $content_for_layout;
        } else {
            require(ROOT . 'Views/Layout/' . $this->layout. '.php');
        }
    }


}

?>