<?php
/**
 * myAction
 *
 * Copyright 2010 by Alexandr Plotnikov
 *
 * @package myaction
 */
/**
 * Properties for the myAction snippet.
 *
 * @package myaction
 * @subpackage build
 */
$properties = array(
    array(
        'name' => 'tpl',
        'desc' => 'prop_myaction.tpl_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'Item',
        'lexicon' => 'myaction:properties',
    ),
    array(
        'name' => 'sortBy',
        'desc' => 'prop_myaction.sortby_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'name',
        'lexicon' => 'myaction:properties',
    ),
    array(
        'name' => 'sortDir',
        'desc' => 'prop_myaction.sortdir_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'ASC',
        'lexicon' => 'myaction:properties',
    ),
    array(
        'name' => 'limit',
        'desc' => 'prop_myaction.limit_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 5,
        'lexicon' => 'myaction:properties',
    ),
    array(
        'name' => 'outputSeparator',
        'desc' => 'prop_myaction.outputseparator_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'myaction:properties',
    ),
    array(
        'name' => 'toPlaceholder',
        'desc' => 'prop_myaction.toplaceholder_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => true,
        'lexicon' => 'myaction:properties',
    ),
/*
    array(
        'name' => '',
        'desc' => 'prop_myaction.',
        'type' => 'textfield',
        'options' => '',
        'value' => '',
        'lexicon' => 'myaction:properties',
    ),
    */
);

return $properties;
