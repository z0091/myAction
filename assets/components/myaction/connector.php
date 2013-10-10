<?php
/**
 * myAction
 *
 * Copyright 2010 by Alexandr Plotnikov
 *
 * @package myaction
 */
/**
 * myAction Connector
 *
 * @package myaction
 */
require_once dirname(dirname(dirname(dirname(__FILE__)))).'/config.core.php';
require_once MODX_CORE_PATH.'config/'.MODX_CONFIG_KEY.'.inc.php';
require_once MODX_CONNECTORS_PATH.'index.php';

$corePath = $modx->getOption('myaction.core_path',null,$modx->getOption('core_path').'components/myaction/');
require_once $corePath.'model/myaction/myaction.class.php';
$modx->myaction = new myAction($modx);

$modx->lexicon->load('myaction:default');

/* handle request */
$path = $modx->getOption('processorsPath',$modx->myaction->config,$corePath.'processors/');
$modx->request->handleRequest(array(
    'processors_path' => $path,
    'location' => '',
));
