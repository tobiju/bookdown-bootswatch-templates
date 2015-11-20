<?php
/**
 * tobiju
 *
 * @link      https://github.com/tobiju/bookdown-bootswatch-templates for the canonical source repository
 * @copyright Copyright (c) 2015 Tobias Jüschke
 * @license   https://github.com/tobiju/bookdown-bootswatch-templates/blob/master/LICENSE.txt New BSD License
 */

// default library templates
$library = (getenv('VENDOR_PATH') ?: dirname(dirname(dirname(__DIR__))).'/') . "bookdown/bookdown/templates";

// project-specific templates
$templatePath = __DIR__;

// register the templates
$templates = $this->getViewRegistry();

$templates->set("head", "{$templatePath}/head.php");
$templates->set("body", "{$library}/body.php");
$templates->set("core", "{$library}/core.php");
$templates->set("navheader", "{$templatePath}/navheader.php");
$templates->set("navfooter", "{$templatePath}/navfooter.php");
$templates->set("toc", "{$templatePath}/toc.php");
?>
<!DOCTYPE html>
<html>
    <?= $this->render("head"); ?>
    <?= $this->render("body"); ?>
</html>
