<?php
/**
 * myAction
 *
 * Copyright 2010 by Alexandr Plotnikov
 *
 * @package myaction
 */
/**
 * Update an Item
 * 
 * @package myaction
 * @subpackage processors
 */
/* get board */
// Если редактирование из сетки, то переопределяем $scriptProperties
if (!empty($scriptProperties['data']) && empty($scriptProperties['id'])) {
	$scriptProperties = json_decode($scriptProperties['data'], true);
}

if (empty($scriptProperties['id'])) return $modx->error->failure($modx->lexicon('myaction.item_err_ns'));
$item = $modx->getObject('myActionItem',$scriptProperties['id']);
if (!$item) return $modx->error->failure($modx->lexicon('myaction.item_err_nf'));

$item->fromArray($scriptProperties);

if ($item->save() == false) {
    return $modx->error->failure($modx->lexicon('myaction.item_err_save'));
}

/* output */
$itemArray = $item->toArray('',true);
return $modx->error->success('',$itemArray);
