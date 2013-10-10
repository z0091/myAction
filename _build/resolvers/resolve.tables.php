<?php
/**
 * myAction
 *
 * Copyright 2010 by Alexandr Plotnikov
 *
 * @package myaction
 */
/**
 * Resolve creating db tables
 *
 * @package myaction
 * @subpackage build
 */
if ($object->xpdo) {
    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
            $modx =& $object->xpdo;
            $modelPath = $modx->getOption('myaction.core_path',null,$modx->getOption('core_path').'components/myaction/').'model/';
            $modx->addPackage('myaction',$modelPath);

            $manager = $modx->getManager();

            $manager->createObjectContainer('myActionItem');

            break;
        case xPDOTransport::ACTION_UPGRADE:
            break;
    }
}
return true;
