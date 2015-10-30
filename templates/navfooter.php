<?php
$prev = $this->page->getPrev();
$parent = $this->page->getParent();
$next = $this->page->getNext();
?>

</div>
</div>
</div>
</section>

<footer>
    <div id="links">
        <div class="container">
            <div class="row">
                <div class="prev col-md-3">
                    <?php if ($prev): ?>
                        <p>Prev</p>
                        <?php echo $this->anchorRaw($prev->getHref(), $prev->getNumberAndTitle()); ?>
                    <?php endif; ?>
                </div>
                <div class="parent col-md-6">
                    <?php if ($parent): ?>
                        <p>Up</p>
                        <?php echo $this->anchorRaw($parent->getHref(), $parent->getNumberAndTitle()); ?>
                    <?php endif; ?>
                </div>
                <div class="next col-md-3">
                    <?php if ($next): ?>
                        <p>Next</p>
                        <?php echo $this->anchorRaw($next->getHref(), $next->getNumberAndTitle()); ?>
                    <?php endif; ?>
                </div>
                <div class="clearfix"></div>
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
                            href="https://github.com/skeil">skeil</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
