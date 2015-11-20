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
<table class="table table-striped">
    <?php
    $entries = $this->page->getTocEntries();
    $baseLevel = reset($entries)->getLevel();
    $lastLevel = $baseLevel;
    $currLevel = $lastLevel;

    foreach ($entries as $entry) {
        $number = trim($entry->getNumber(),'.');

        echo '<tr>';
        echo '<td>'."{$number}".'</td>';
        echo '<td>'. $this->anchorRaw($entry->getHref(), $entry->getTitle()) . '</td>';
        echo '</tr>';

        $lastLevel = $entry->getLevel();
    }

    ?>
</table>
