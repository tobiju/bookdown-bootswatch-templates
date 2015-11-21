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
            <?= $this->render("nav"); ?>
        </div>
    </div>
    <div id="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        Powered by <a href="https://github.com/tobiju/bookdown-bootswatch-templates" title="Visit project to generate your own docs">Bookdown Bootswatch Templates</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
