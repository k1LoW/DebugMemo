<?php

class DebugMemosController extends DebugMemoAppController {

    public $uses = array('DebugMemo.DebugMemo');

    /**
     * beforeFilter
     *
     */
    public function beforeFilter(){
        if (Configure::read('debug') < 2) {
            $this->redirect('/');
        }
        Configure::write('debug', 0);
        parent::beforeFilter();
    }

    /**
     * index
     *
     */
    public function index(){
        $this->set('debug_memos', $this->paginate());
    }

    /**
     * update
     *
     */
    public function update($controller = null, $action = null){
        $result = $this->DebugMemo->update($controller, $action, $this->request->data);
        if ($result === true) {
            $this->Session->setFlash(
                __d('debug_memo', 'Memo has been updated')
            );
            $this->redirect(array('action' => 'update/' . $this->request->data['DebugMemo']['controller'] . '/' . $this->request->data['DebugMemo']['action']));
        } else {
            $this->request->data = $result;
        }
    }
}