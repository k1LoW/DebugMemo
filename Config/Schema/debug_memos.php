<?php
class debug_memosSchema extends CakeSchema {

    public function before($event = array()) {
        return true;
    }

    public function after($event = array()) {
    }

    public $debug_memos = array(
                            'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
                            'controller' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
                            'action' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
                            'memo' => array('type' => 'text', 'null' => true, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
                            'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
                            'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
                            'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
                            'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
                            );
}
