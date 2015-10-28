<?php

// project-specific templates
$template_path = __DIR__;

$templates = $this->getViewRegistry();
$templates->set("wrapper", "{$template_path}/../main.php");

echo $this->render("wrapper", array('theme_name' => 'cyborg'));

