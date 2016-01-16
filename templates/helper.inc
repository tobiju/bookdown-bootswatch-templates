<?php

/**
 * Render a nested list of elements as HTML list item. The function calls itself in case
 * of nested elements (identified by the key 'nested').
 * @param  array          $elements
 * @param  Aura\View\View $context
 */
function renderTocList(array $elements, Aura\View\View $context)
{

    foreach ($elements as $entry) {
        echo '<li class="list-group-item">';
        echo '<div class="row clearfix">';
        echo '<div class="col-sm-2">'."{$entry['number']}".'</div>';
        echo '<div class="col-sm-10">'. $context->anchorRaw($entry['href'], $entry['title']) . '</div>';
        echo '</div>';
        if (isset($entry['nested'])) {
            $collapseId = 'collapse-' . str_replace('.', '-', rtrim($entry['number'], '.'));
            echo '<a class="bbt-toc-toggle" href="#' . $collapseId . '" data-toggle="collapse" aria-expanded="false" aria-controls="' . $collapseId . '"><span class="badge">+</span></a>';
            echo '<ul class="list-group bbt-toc-nested-list collapse" id="' . $collapseId . '">';
            renderTocList($entry['nested'], $context);
            echo '</ul>';
        }
        echo '</li>';
    }
}

/**
 * Transform a flat list of TOC entries to a nested list of arrays.
 * @param  array  $entries
 * @param  int    $nestLevel Level when to start sublist
 * @return array
 */
function tocEntriestoNestedList(array $entries, $nestLevel)
{
    $nestLevel = (int) $nestLevel;
    $nestedEntries = array();
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
