<?php
/**
 * myAction
 *
 * Copyright 2010 by Alexandr Plotnikov
 *
 * @package myaction
 */
/**
 * Loads the home page.
 *
 * @package myaction
 * @subpackage controllers
 */
class myActionHomeManagerController extends myActionBaseManagerController {
    public function process(array $scriptProperties = array()) {

    }
    public function getPageTitle() { return $this->modx->lexicon('myaction'); }
    public function loadCustomCssJs() {
        $this->addJavascript($this->myaction->config['jsUrl'].'mgr/widgets/items.grid.js');
        $this->addJavascript($this->myaction->config['jsUrl'].'mgr/widgets/home.panel.js');
        $this->addLastJavascript($this->myaction->config['jsUrl'].'mgr/sections/home.js');
    }
    public function getTemplateFile() { return $this->myaction->config['templatesPath'].'home.tpl'; }
}
