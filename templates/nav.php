<?php
/**
 * tobiju
 *
 * @link      https://github.com/tobiju/bookdown-bootswatch-templates for the canonical source repository
 * @copyright Copyright (c) 2015 Tobias Jüschke
 * @license   https://github.com/tobiju/bookdown-bootswatch-templates/blob/master/LICENSE.txt New BSD License
 */

/* @var $page \Bookdown\Bookdown\Content\Page */
$page = $this->page;

while ($page->hasParent()) {
    $page = $page->getParent();
}

?>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php if ($image = getenv('MENU_LOGO')) : ?>
                <a class="navbar-brand" href="<?= $page->getHref(); ?>">
                    <img alt="logo" src="<?= $image ?>" title="Home">'
                </a>
            <?php endif; ?>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?= $this->render('partialTopNav', array(
                'page' => $page,
                'depth' => 0
            )); ?>
        </div>
    </div>
</nav>
