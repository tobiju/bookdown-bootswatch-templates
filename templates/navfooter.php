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

</div>
</div>
</div>
</section>

<footer>
    <div class="links">
        <div class="container">
            <div class="row">
                <div class="prev col-xs-3">
                    <?php if ($prev): ?>
                        <p>Prev</p>
                        <?= $this->anchorRaw($prev->getHref(), $prev->getNumberAndTitle()); ?>
                    <?php endif; ?>
                </div>
                <div class="parent col-xs-6">
                    <?php if ($parent): ?>
                        <p>Up</p>
                        <?= $this->anchorRaw($parent->getHref(), $parent->getNumberAndTitle()); ?>
                    <?php endif; ?>
                </div>
                <div class="next col-xs-3">
                    <?php if ($next): ?>
                        <p>Next</p>
                        <?= $this->anchorRaw($next->getHref(), $next->getNumberAndTitle()); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div id="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        Powered by <a href="www.bookdown.io">Bookdown.io</a> and <a
                            href="bootswatch.com">bootswatch.com</a>.
                    </p>

                    <p>
                        Designed by <a href="https://github.com/yuripertamax">yuripertamax</a>.
                    </p>

                    <p>
                        Contributed by <a href="https://github.com/tobiju">tobiju</a> and <a
                            href="https://github.com/sandrokeil">sandrokeil</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
