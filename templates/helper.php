<?php

/**
 * Render a nested list of elements as HTML list item. The function calls itself in case
 * of nested elements (identified by the key 'nested').
 * @param  array $elements
 * @param  Aura\View\View $context
 */
function renderTocList(array $elements, Aura\View\View $context)
{

    foreach ($elements as $entry) {
        echo '<li class="list-group-item">';
        echo '<div class="row clearfix">';
        echo '<div class="col-sm-2">' . '<span class="text-number">' . "{$entry['number']}" . '</span></div>';
        echo '<div class="col-sm-10">' . $context->anchorRaw($entry['href'], $entry['title']) . '</div>';
        echo '</div>';
        if (isset($entry['nested'])) {
            $collapseId = 'collapse-' . str_replace('.', '-', rtrim($entry['number'], '.'));
            echo '<a class="bbt-toc-toggle" href="#' . $collapseId . '" data-toggle="collapse" aria-expanded="false" aria-controls="' . $collapseId . '"><span class="badge">+</span></a>';
            echo '<ul class="list-group list-toc-nested collapse" id="' . $collapseId . '">';
            renderTocList($entry['nested'], $context);
            echo '</ul>';
        }
        echo '</li>';
    }
}

/**
 * Transform a flat list of TOC entries to a nested list of arrays.
 * @param  array $entries
 * @param  int $nestLevel Level when to start sublist
 * @return array
 */
function tocEntriesToNestedList(array $entries, $nestLevel)
{
    $nestLevel = (int)$nestLevel;
    $nestedEntries = array();
    $nestedEntries[] = reset($entries)->asArray();
    while ($entry = next($entries)) {
        if ($entry->getLevel() <= $nestLevel) {
            $nestedEntries[] = $entry->asArray();
            continue;
        }
        end($nestedEntries);
        $parent = key($nestedEntries);
        if (!isset($nestedEntries[$parent]['nested'])) {
            $nestedEntries[$parent]['nested'] = array();
        }
        $nestedEntries[$parent]['nested'][] = $entry->asArray();
    }
    return $nestedEntries;
}

/**
 * Renders the list for the top menu.
 *
 * @param $page
 * @param \Aura\View\View $context
 * @param int $depth
 * @param int $maxDepth
 */
function menu($page, Aura\View\View $context, $depth = 0, $maxDepth = 3)
{
    $depth++;

    if (!($page instanceof \Bookdown\Bookdown\Content\RootPage)) {
        echo "<li>";
        echo $context->anchorRaw($page->getHref(), $page->getTitle());
    }

    if ($page instanceof \Bookdown\Bookdown\Content\IndexPage
        && count($page->getChildren()) > 0
        && $depth <= $maxDepth
    ) {
        $class = ($depth == 1) ? 'nav navbar-nav' : 'dropdown-menu';
        echo '<ul class="' . $class . '">';
        foreach ($page->getChildren() as $child) {
            menu($child, $context, $depth);
        }
        echo '</ul>';
    }

    if (!($page instanceof \Bookdown\Bookdown\Content\RootPage)) {
        echo '</li>';
    }
}