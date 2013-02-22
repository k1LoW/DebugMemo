<?php
App::uses('AppModel', 'Model');
App::uses('CakeEmail', 'Network/Email');
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
            $dataArray = explode("\n", $data['DebugMemo']['memo']);
            $currentArray = explode("\n", $current['DebugMemo']['memo']);
            $diff = array_diff($dataArray, $currentArray);
        } else {
            $diff = explode("\n", $data['DebugMemo']['memo']);
        }
        $this->set($data);
        $result = $this->save(null, true);
        if ($result) {
            // Send mail
            try {
                $email = new CakeEmail('debug_memo');
                $from = $email->from();
                if (empty($from)) {
                    $email->from('debug_memo.notifier@default.com', 'DebugMemo Notifier');
                }
                $prefix = Configure::read('DebugMemo.email_subject_prefix');
                $subject = $email->subject();
                if (empty($subject)) {
                    $subject = 'Memo updated';
                }
                $url = $result['DebugMemo']['controller'];
                $url .= ($result['DebugMemo']['action'] === 'index') ? '' : '/' . $result['DebugMemo']['action'];

                $sample = '';
                foreach ($diff as $string) {
                    if (trim($string) && empty($sample)) {
                        $sample = mb_strimwidth(trim($string), 0, 20, '...');
                    }
                }

                $email->subject($prefix . '['. date('Ymd H:i:s') . '][' . $url . '] ' . $subject . ': ' . $sample);
                $msg = array(
                    $subject,
                    '',
                    '-------------------------------',
                    'Info:',
                    '-------------------------------',
                    '',
                    '* URL       : ' . $url,
                    '* Modified  : ' . $result['DebugMemo']['modified'],
                    '* Digest    : ' . $sample,
                    '',
                    '-------------------------------',
                    'Memo:',
                    '-------------------------------',
                    '',
                    $result['DebugMemo']['memo'],
                    '',
                );
                $email->send(join("\n", $msg));
            } catch (ConfigureException $e) {
                // Drop ConfigureException
            }
            $this->data = $result;
            return true;
        } else {
            throw new ValidationException();
        }
    }
}