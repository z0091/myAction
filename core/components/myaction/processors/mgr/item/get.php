<?php
/**
 * myAction
 *
 * Copyright 2010 by Alexandr Plotnikov
 *
 * @package myaction
 */
/**
 * Get an Item
 * 
 * @package myaction
 * @subpackage processors
 */
/* get board */
if (empty($scriptProperties['id'])) return $modx->error->failure($modx->lexicon('myaction.item_err_ns'));
$item = $modx->getObject('myActionItem',$scriptProperties['id']);
if (!$item) return $modx->error->failure($modx->lexicon('myaction.item_err_nf'));

/* output */
$itemArray = $item->toArray('',true);
return $modx->error->success('',$itemArray);
