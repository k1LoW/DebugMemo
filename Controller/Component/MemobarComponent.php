<?php

class MemobarComponent extends Component {

    public $javascript = array(
        'jquery' => '/debug_memo/js/jquery',
        'libs' => '/debug_memo/js/js_debug_memobar'
    );
    public $css = array('DebugMemo.debug_memobar.css');

    public $settings = array(
        'forceEnable' => false,
        'autoRun' => true
    );

    public $enabled = true;

    public function __construct(ComponentCollection $collection, $settings = array()) {

        parent::__construct($collection, array_merge($this->settings, (array)$settings));

        if (Configure::read('debug') == 0 || $this->settings['autoRun'] == false) {
            $this->enabled = false;
            return false;
        }
    }

    public function initialize(Controller $controller) {
        if (!$this->enabled) {
            $this->_Collection->disable('Memobar');
        }
    }

    public function startup(Controller $controller) {
        $controller->helpers[] = 'DebugMemo.Memobar';
    }

    /**
     * beforeRender
     *
     */
    public function beforeRender(Controller $controller){
        $controller->set(array(
                'debugMemobarJavascript' => $this->javascript,
                'debugMemobarCss' => $this->css
            ));
    }

}