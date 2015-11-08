<?php

// project-specific templates
$template_path = dirname(__DIR__) . DIRECTORY_SEPARATOR;

$templates = $this->getViewRegistry();
$templates->set("wrapper", "{$template_path}main.php");

echo $this->render("wrapper", array('theme_name' => 'yeti'));

