<?php
/**
 * tobiju
 *
 * @link      https://github.com/tobiju/bookdown-bootswatch-templates for the canonical source repository
 * @copyright Copyright (c) 2015 Tobias Jüschke
 * @license   https://github.com/tobiju/bookdown-bootswatch-templates/blob/master/LICENSE.txt New BSD License
 */

    if (!$this->page->hasTocEntries()) {
        return;
    }
?>

<h1><?= $this->page->getNumberAndTitle(); ?></h1>
<ul class="bbt-toc list-group">
    <?php
    $entries = $this->page->getTocEntries();
    $baseLevel = reset($entries)->getLevel();
    $lastLevel = $baseLevel;
    $currLevel = $lastLevel;

    foreach ($entries as $entry) {
        $number = trim($entry->getNumber(),'.');

        echo '<li class="list-group-item clearfix row">';
        echo '<div class="col-sm-2">'."{$number}".'</div>';
        echo '<div class="col-sm-10">'. $this->anchorRaw($entry->getHref(), $entry->getTitle()) . '</div>';
        echo '</li>';

        $lastLevel = $entry->getLevel();
    }

    ?>
</ul>
