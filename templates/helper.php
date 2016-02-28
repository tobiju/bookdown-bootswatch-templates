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
        $entryObj = new Bookdown\Bookdown\Content\Heading($entry['number'], $entry['title'], $entry['href'], $entry['id']);

        echo '<li class="list-group-item">';
        echo '<div class="row clearfix">';
        echo '<div class="col-sm-2">' . '<span class="text-number">' . "{$entryObj->getNumber()}" . '</span></div>';
        echo '<div class="col-sm-10">' . $context->anchorRaw($entryObj->getHref(), $entryObj->getTitle()) . '</div>';
        echo '</div>';
        if (isset($entry['nested'])) {
            $collapseId = 'collapse-' . $entryObj->getAnchor();
            echo '<a class="bbt-toc-toggle badge glyphicon collapsed" href="#' . $collapseId . '" data-toggle="collapse" aria-expanded="false" aria-controls="' . $collapseId . '"></a>';
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
    $startLevel = 0;
    $nestLevel = (int)$nestLevel;
    $nestedEntries = array();
    $nestedEntries[] = reset($entries)->asArray();
    while ($entry = next($entries)) {
        if ($startLevel === 0) {
            $startLevel = $entry->getLevel();
        }

        if (($entry->getLevel() - $startLevel) < $nestLevel) {
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