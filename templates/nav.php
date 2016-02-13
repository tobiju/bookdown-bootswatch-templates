<?php
/**
 * tobiju
 *
 * @link      https://github.com/tobiju/bookdown-bootswatch-templates for the canonical source repository
 * @copyright Copyright (c) 2015 Tobias Jüschke
 * @license   https://github.com/tobiju/bookdown-bootswatch-templates/blob/master/LICENSE.txt New BSD License
 */

?>

<?php

$page = $this->page;

while($page->hasParent()){
    $page = $page->getParent();
}

?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?php menu($page, $this); ?>
        </div>
    </div>
</nav>
