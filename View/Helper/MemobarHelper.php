<?php
App::uses('AppHelper', 'View/Helper');
class MemobarHelper extends AppHelper {

    public $helpers = array('Html', 'Form');

    public $settings = array();

    public function __construct($View, $options = array()) {
        $this->settings = array_merge($this->settings, $options);
        parent::__construct($View, $options);
    }

    /**
     * afterLayout callback
     *
     * @param string $layoutFile
     * @return void
     */
    public function afterLayout($layoutFile) {
        if (!$this->request->is('requested')) {
            $this->send();
        }
    }

    /**
     * send method
     *
     * @return void
     */
    public function send() {
        if (Configure::read('debug') == 0) {
            return;
        }
        $view = $this->_View;

        $head = '';
        if (isset($view->viewVars['debugMemobarCss']) && !empty($view->viewVars['debugMemobarCss'])) {
            $head .= $this->Html->css($view->viewVars['debugMemobarCss']);
        }
        if (isset($view->viewVars['debugMemobarJavascript'])) {
            foreach ($view->viewVars['debugMemobarJavascript'] as $script) {
                if ($script) {
                    $head .= $this->Html->script($script);
                }
            }
        }
        if (preg_match('#</head>#', $view->output)) {
            $view->output = preg_replace('#</head>#', $head . "\n</head>", $view->output, 1);
        }
        $toolbar = $view->element('debug_memobar', array(
                'controller' => $view->request->controller,
                'action' => $view->request->action,
                'named' => $view->request->named,
                'pass' => $view->request->pass,
            ),
            array('plugin' => 'DebugMemo'));
        if (preg_match('#</body>#', $view->output)) {
            $view->output = preg_replace('#</body>#', $toolbar . "\n</body>", $view->output, 1);
        }
    }

}