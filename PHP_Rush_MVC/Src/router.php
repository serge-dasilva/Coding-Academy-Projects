<?php
$params = explode('/',$_GET['p']);
$controller = $params[0] ? $params[0] : 'articles';
$action = isset($params[1]) ? $params[1] : 'index';

if(count($params) > 2)
    { 
        $id = intval($params[2]);
    }

?>