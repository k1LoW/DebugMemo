<?php
App::uses('AppModel', 'Model');
class DebugMemo extends AppModel {

    /**
     * update
     */
    public function update($controller, $action, $data) {
        if ((empty($controller) || empty($action)) && empty($data)) {
            throw new InternalErrorException(__('Invalid Access'));
        }

        if (!empty($controller) && !empty($action)) {
            $current = $this->find('first', array(
                    'conditions' => array(
                        'DebugMemo.controller' => $controller,
                        'DebugMemo.action' => $action,
                    )));
            if (empty($current)) {
                return array('DebugMemo' => array(
                        'controller' => $controller,
                        'action' => $action,
                    ));
            } else {
                return $current;
            }
        }

        if (!empty($data)) {
            $controller = $data['DebugMemo']['controller'];
            $action = $data['DebugMemo']['action'];
            $current = $this->find('first', array(
                    'conditions' => array(
                        'DebugMemo.controller' => $controller,
                        'DebugMemo.action' => $action,
                    )));
        }

        if (!empty($current)) {
            $data['DebugMemo']['id'] = $current['DebugMemo']['id'];
        }
        $this->set($data);
        $result = $this->save(null, true);
        if ($result) {
            $this->data = $result;
            return true;
        } else {
            throw new ValidationException();
        }
    }

}