<?php
/**
 * myAction
 *
 * Copyright 2010 by Alexandr Plotnikov
 *
 * @package myaction
 */
/**
 * Remove an Item.
 * 
 * @package myaction
 * @subpackage processors
 */
/* get board */
if (empty($scriptProperties['id'])) return $modx->error->failure($modx->lexicon('myaction.item_err_ns'));
$item = $modx->getObject('myActionItem',$scriptProperties['id']);
if (!$item) return $modx->error->failure($modx->lexicon('myaction.item_err_nf'));

if ($item->remove() == false) {
    return $modx->error->failure($modx->lexicon('myaction.item_err_remove'));
}

/* output */
return $modx->error->success('',$item);
