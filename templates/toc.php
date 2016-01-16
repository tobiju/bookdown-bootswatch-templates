<?php if (!$this->page->hasTocEntries()) : ?>
    return;
<?php endif; ?>

<h1><?php echo $this->page->getNumberAndTitle(); ?></h1>
<nav class="nav-toc">
    <ul>
        <?php
        $entries = $this->page->getTocEntries();
        $baseLevel = reset($entries)->getLevel();
        $lastLevel = $baseLevel;
        $currLevel = $lastLevel;
        $finalLevel = 0;

        // Get deepest level
        foreach ($entries as $entry) {
            if ($entry->getLevel() > $finalLevel) {
                $finalLevel++;
            }
        }

        foreach ($entries as $entry) {

            while ($entry->getLevel() > $currLevel) {
                echo '<ul>' . PHP_EOL;
                $currLevel++;
            }

            while ($entry->getLevel() < $currLevel) {
                $currLevel--;
                echo '</ul></li>' . PHP_EOL;
            }

            echo '<li>' . "{$entry->getNumber()}" . ' ' . $this->anchorRaw($entry->getHref(), $entry->getTitle());

            if ($entry->getLevel() === $finalLevel) {
                echo '</li >' . PHP_EOL;
            }

        }

        while ($currLevel > $baseLevel) {
            $currLevel--;
            echo '</ul ></li >' . PHP_EOL;
        }
        ?>
    </ul>
</nav>