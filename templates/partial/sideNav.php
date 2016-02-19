<?php
/**
 * Renders the top navigation recursively.
 *
 * @link      https://github.com/tobiju/bookdown-bootswatch-templates for the canonical source repository
 * @copyright Copyright (c) 2015 Tobias Jüschke
 * @license   https://github.com/tobiju/bookdown-bootswatch-templates/blob/master/LICENSE.txt New BSD License
 */

/* @var \Bookdown\Bookdown\Content\Heading $entry */

if ($this->page instanceof \Bookdown\Bookdown\Content\IndexPage) {
    return '';
}
?>
<nav class="nav-left hidden-xs hidden-sm" id="sideNav">
    <ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset-top="59" role="tablist">
        <?php foreach ($this->page->getHeadings() as $entry) : ?>
            <li>
                <a href="<?= $entry->getHrefAnchor() ?>"><?= $entry->getTitle(); ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
