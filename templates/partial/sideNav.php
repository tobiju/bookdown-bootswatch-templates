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
$startLevel = 0;
?>
<nav class="nav-left hidden-xs hidden-sm" id="sideNav">
    <ul class="nav nav-stacked" data-spy="affix" data-offset-top="59" role="tablist">
        <?php foreach ($this->page->getHeadings() as $entry) : ?>
            <?php
            // store level from first entry
            if ($startLevel === 0) {
                $startLevel = $entry->getLevel();
            }

            // allow only headings until depth 2
            if (($entry->getLevel() - $startLevel) > 1) {
                continue;
            }

            $maxStingLength = 24;
            $title = $entry->getTitle();
            if (strlen($title) > $maxStingLength) {
                $title = mb_substr($title, 0, $maxStingLength) . '...';
            }
            ?>
            <li>
                <a href="<?= $entry->getHrefAnchor() ?>" title="<?= $this->escape()->attr($entry->getTitle()) ?>"><?= $title; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>
