<?php

/**
 * 
 */
class Main extends Controller
{
	public function main_page(){

	    $view = new View('main');
	    $view->render();	

    }
}

?>
