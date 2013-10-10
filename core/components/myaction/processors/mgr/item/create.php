<?php
/**
 * myAction
 *
 * Copyright 2010 by Alexandr Plotnikov
 *
 * @package myaction
 */
/**
 * Create an Item
 * 
 * @package myaction
 * @subpackage processors
 */
$alreadyExists = $modx->getObject('myActionItem',array(
    'name' => $_POST['name'],
));
if ($alreadyExists) {
    $modx->error->addField('name',$modx->lexicon('myaction.item_err_ae'));
}

if ($modx->error->hasError()) {
    return $modx->error->failure();
}

$item = $modx->newObject('myActionItem');
$item->fromArray($_POST);

if ($item->save() == false) {
    return $modx->error->failure($modx->lexicon('myaction.item_err_save'));
}

return $modx->error->success('',$item);
