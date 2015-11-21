<?php
/**
 * tobiju
 *
 * @link      https://github.com/tobiju/bookdown-bootswatch-templates for the canonical source repository
 * @copyright Copyright (c) 2015 Tobias Jüschke
 * @license   https://github.com/tobiju/bookdown-bootswatch-templates/blob/master/LICENSE.txt New BSD License
 */

$prev = $this->page->getPrev();
$parent = $this->page->getParent();
$next = $this->page->getNext();
?>
<div class="row hidden-sm hidden-md hidden-lg">
    <div class="prev col-xs-6">
        <?php if ($prev): ?>
            <p>Prev</p>
            <?= $this->anchorRaw($prev->getHref(), $prev->getNumberAndTitle()); ?>
        <?php endif; ?>
    </div>
    <div class="next col-xs-6">
        <?php if ($next): ?>
            <p>Next</p>
            <?= $this->anchorRaw($next->getHref(), $next->getNumberAndTitle()); ?>
        <?php endif; ?>
    </div>
</div>

<div class="row hidden-xs">
    <div class="prev col-sm-4">
        <?php if ($prev): ?>
            <p>Prev</p>
            <?= $this->anchorRaw($prev->getHref(), $prev->getNumberAndTitle()); ?>
        <?php endif; ?>
    </div>
    <div class="parent col-sm-4">
        <?php if ($parent): ?>
            <p>Up</p>
            <?= $this->anchorRaw($parent->getHref(), $parent->getNumberAndTitle()); ?>
        <?php endif; ?>
    </div>
    <div class="next col-sm-4">
        <?php if ($next): ?>
            <p>Next</p>
            <?= $this->anchorRaw($next->getHref(), $next->getNumberAndTitle()); ?>
        <?php endif; ?>
    </div>
</div>

