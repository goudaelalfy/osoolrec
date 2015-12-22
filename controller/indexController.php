<?php

Class indexController Extends baseController {

public function index() 
{
	$view = new viewModel('home');
}

public function design() 
{
	$view = new viewModel('design');
}

}

?>
