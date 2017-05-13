<?php
namespace Movie\View;

const TEMPLATE_EXTENSION = '.phtml';
const TEMPLATE_FOLDER = 'templates/';
const TEMPLATE_PREFIX = 'movie_view_';


function display($template, $variables = [], $extension = TEMPLATE_EXTENSION) {
	extract($variables);
	
	ob_start();
	include TEMPLATE_FOLDER . TEMPLATE_PREFIX . $template . TEMPLATE_EXTENSION;
	return ob_get_clean();
}