<?php

$route = new Routes;
// addGet and addPost add elements in get or post array in classes/Routes.php
$route->addGet('/', "Main@main_page");

//$route->addPost('/some_post_request', "ControllerName@method_name");
//$route->addGet('/some_get_request', "ControllerName@method_name");

$route->dispatch();

?>