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
<div id="sideNav">
    <ul class="nav nav-pills nav-stacked" role="tablist">
        <?php foreach ($this->page->getHeadings() as $entry) : ?>
            <li>
                <?= $this->anchorRaw('#' . substr($entry->getNumber(), 0, -1), $entry->getTitle()); ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
