<?php
require('../Src/router.php');
require('../dispatcher.php');


if (isset($id))
{
$dispatch = new Dispatcher($controller, $action, $id);
$dispatch->dispatch();
}
 else
 {
 $dispatch = new Dispatcher($controller, $action);
 $dispatch->dispatch();
 }

?>