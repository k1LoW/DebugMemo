<?php

class DebugMemoAppController extends AppController {
    public $components = array('DebugMemo.Memobar' => array('autoRun' => false));

    /**
     * beforeFilter
     *
     */
    public function beforeFilter(){
        if ($this->Auth) {
            $this->Auth->allow('*');
        }
        $this->layout = 'debug_memo';
    }
}

