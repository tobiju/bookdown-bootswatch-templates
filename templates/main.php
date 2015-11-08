<?php
// default library templates
$library = (getenv('VENDOR_PATH') ?: dirname(dirname(dirname(__DIR__))).'/') . "bookdown/bookdown/templates";

// project-specific templates
$template_path = __DIR__;

// register the templates
$templates = $this->getViewRegistry();

$templates->set("head", "{$template_path}/head.php");
$templates->set("body", "{$library}/body.php");
$templates->set("core", "{$library}/core.php");
$templates->set("navheader", "{$template_path}/navheader.php");
$templates->set("navfooter", "{$template_path}/navfooter.php");
$templates->set("toc", "{$template_path}/toc.php");
?>
<!DOCTYPE html>
<html>
    <?= $this->render("head", array('theme_name' => $theme_name)); ?>
    <?= $this->render("body"); ?>
</html>
