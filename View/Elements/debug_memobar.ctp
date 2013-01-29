<?php if(!empty($controller) && !empty($action)): ?>

<div id="debug-memo-container">
    <div id="debug-memo-handle"><?php echo $this->Html->image('/debug_memo/img/debug_memo_icon.png', array('alt' => 'DebugMemo')); ?> [ <?php echo $controller; ?><?php echo ($action === 'index') ? '' : '/' . $action; ?> ]</div>
    <iframe id="debug-memo-iframe" src="<?php echo $this->Html->url(array(
    'controller' => 'debug_memos',
    'action' => 'update/' . $controller . '/' . $action,
    'plugin' => 'debug_memo')); ?>"></iframe>
</div>

<?php endif; ?>