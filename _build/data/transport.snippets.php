<?php
/**
 * myAction
 *
 * Copyright 2010 by Alexandr Plotnikov
 *
 * @package myaction
 */
/**
 * Add snippets to build
 * 
 * @package myaction
 * @subpackage build
 */
$snippets = array();

$snippets[0]= $modx->newObject('modSnippet');
$snippets[0]->fromArray(array(
    'id' => 0,
    'name' => 'myAction',
    'description' => 'Displays Items.',
    'snippet' => getSnippetContent($sources['source_core'].'/elements/snippets/snippet.myaction.php'),
),'',true,true);
$properties = include $sources['build'].'properties/properties.myaction.php';
$snippets[0]->setProperties($properties);
unset($properties);

return $snippets;
