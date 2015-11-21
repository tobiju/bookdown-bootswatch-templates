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
<div class="row">
    <div class="parent col-xs-12 visible-xs-block">
        <?php if ($prev): ?>
            <p>Prev</p>
            <?= $this->anchorRaw($prev->getHref(), $prev->getNumberAndTitle()); ?>
        <?php endif; ?>
    </div>
    <div class="parent col-xs-12 visible-xs-block">
        <?php if ($parent): ?>
            <p>Up</p>
            <?= $this->anchorRaw($parent->getHref(), $parent->getNumberAndTitle()); ?>
        <?php endif; ?>
    </div>
    <div class="parent col-xs-12 visible-xs-block">
        <?php if ($next): ?>
            <p>Next</p>
            <?= $this->anchorRaw($next->getHref(), $next->getNumberAndTitle()); ?>
        <?php endif; ?>
    </div>
    <div class="prev col-sm-3 hidden-xs">
        <?php if ($prev): ?>
            <p>Prev</p>
            <?= $this->anchorRaw($prev->getHref(), $prev->getNumberAndTitle()); ?>
        <?php endif; ?>
    </div>
    <div class="parent col-sm-6 hidden-xs">
        <?php if ($parent): ?>
            <p>Up</p>
            <?= $this->anchorRaw($parent->getHref(), $parent->getNumberAndTitle()); ?>
        <?php endif; ?>
    </div>
    <div class="next col-sm-3 hidden-xs">
        <?php if ($next): ?>
            <p>Next</p>
            <?= $this->anchorRaw($next->getHref(), $next->getNumberAndTitle()); ?>
        <?php endif; ?>
    </div>
</div>

