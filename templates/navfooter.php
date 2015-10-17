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
    <section id="links">
        <div class="container">
            <div class="row">
                <div class="prev col-md-3">
                    <?php if ($prev) { ?>
                    <label for="">Prev</label>
                    <?php
                        echo $this->anchorRaw($prev->getHref(), $prev->getNumberAndTitle());
                    } ?>
                </div>
                <div class="parent col-md-6">
                    <?php if ($parent) { ?>
                    <label for="">Up</label>
                    <?php
                        echo $this->anchorRaw($parent->getHref(), $parent->getNumberAndTitle());
                    } ?>
                </div>
                <div class="next col-md-3">
                    <?php if ($next) { ?>
                    <label for="">Next</label>
                    <?php
                        echo $this->anchorRaw($next->getHref(), $next->getNumberAndTitle());
                    } ?>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </section>
    <section id="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    
                    <span>
                        Powered by <a href="">Bookdown.io</a>, <a href="bootswatch.com">bootswatch.com</a> | Designed by <a href="">yuripertamax</a>
                    </span>
     
                </div>
            </div>
        </div>
    </section>
</footer>
