<?php
/**
 * tobiju
 *
 * @link      https://github.com/tobiju/bookdown-bootswatch-templates for the canonical source repository
 * @copyright Copyright (c) 2015 Tobias Jüschke
 * @license   https://github.com/tobiju/bookdown-bootswatch-templates/blob/master/LICENSE.txt New BSD License
 */


// We need to define functions in a separate file because Bookdown includes
// this file multiple times.
include_once __DIR__ . '/helper.php';

// default library templates
$library = (getenv('VENDOR_PATH') ?: dirname(dirname(dirname(__DIR__))).'/') . "bookdown/bookdown/templates";

// project-specific templates
$templatePath = __DIR__;

// register the templates
$templates = $this->getViewRegistry();

$templates->set("head", "{$templatePath}/head.php");
$templates->set("meta", "{$templatePath}/meta.php");
$templates->set("style", "{$templatePath}/style.php");
$templates->set("body", "{$templatePath}/body.php");
$templates->set("script", "{$templatePath}/script.php");
$templates->set("nav", "{$templatePath}/nav.php");
$templates->set("core", "{$library}/core.php");
$templates->set("navheader", "{$templatePath}/navheader.php");
$templates->set("navfooter", "{$templatePath}/navfooter.php");
$templates->set("toc", "{$templatePath}/toc.php");
$templates->set("partialTopNav", "{$templatePath}/partial/topNav.php");
$templates->set("partialBreadcrumb", "{$templatePath}/partial/breadcrumb.php");
$templates->set("partialSideNav", "{$templatePath}/partial/sideNav.php");
?>
<!DOCTYPE html>
<html>
    <?= $this->render("head"); ?>
    <?= $this->render("body"); ?>
</html>
