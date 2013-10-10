<?php
/**
 * myAction
 *
 * Copyright 2010 by Alexandr Plotnikov
 *
 * @package myaction
 */
require_once dirname(__FILE__) . '/model/myaction/myaction.class.php';
/**
 * @package myaction
 */

abstract class myActionBaseManagerController extends modExtraManagerController {
    /** @var myAction $myaction */
    public $myaction;
    public function initialize() {
        $this->myaction = new myAction($this->modx);

        $this->addCss($this->myaction->config['cssUrl'].'mgr.css');
        $this->addJavascript($this->myaction->config['jsUrl'].'mgr/myaction.js');
        $this->addHtml('<script type="text/javascript">
        Ext.onReady(function() {
            myAction.config = '.$this->modx->toJSON($this->myaction->config).';
            myAction.config.connector_url = "'.$this->myaction->config['connectorUrl'].'";
        });
        </script>');
        return parent::initialize();
    }
    public function getLanguageTopics() {
        return array('myaction:default');
    }
    public function checkPermissions() { return true;}
}

class IndexManagerController extends myActionBaseManagerController {
    public static function getDefaultController() { return 'home'; }
}
