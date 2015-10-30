<?php
$prev = $this->page->getPrev();
$parent = $this->page->getParent();
$next = $this->page->getNext();
?>

<header>
    <div class="container">
        <div class="row">
            <div class="prev col-md-3">
                <?php if ($prev): ?>
                    <p>Prev</p>
                    <?php echo $this->anchorRaw($prev->getHref(), $prev->getTitle()); ?>
                <?php endif; ?>
            </div>
            <div class="current col-md-6">
                <h3 class="title">
                    <?php echo $this->page->getNumberAndTitle(); ?>
                </h3>
                <small class="parent">My Book</small>
            </div>
            <div class="next col-md-3">
                <?php if ($next): ?>
                    <p>Next</p>
                    <?php echo $this->anchorRaw($next->getHref(), $next->getTitle()); ?>
                <?php endif; ?>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</header>

<section id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                
            
