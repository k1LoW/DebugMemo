<h2><?php echo $this->data['DebugMemo']['controller']; ?><?php echo ($this->data['DebugMemo']['action'] === 'index') ? '' : '/' . $this->data['DebugMemo']['action']; ?></h2>
<div id="debug-memo-form">
    <?php echo $this->Form->create('DebugMemo', array(
      'action' => 'update',
      'inputDefaults' => array('label' => false, 'div' => false, 'divControls' => false),
      )); ?>
    <?php echo $this->Form->input('memo', array('id' => 'debug-memo-textarea', 'type' => 'textarea')); ?>
    <?php echo $this->Form->input('controller', array('type' => 'hidden')); ?>
    <?php echo $this->Form->input('action', array('type' => 'hidden')); ?>
    <?php echo $this->Form->submit(__('Update Memo'), array('class' => 'debug-memo-btn', 'div' => false)); ?>
    [ <?php echo $this->Html->link('View memo list', array('controller' => 'debug_memos', 'action' => 'index', 'plugin' => 'debug_memo'), array('target' => '_blank')); ?> ]
    <?php echo $this->Form->end(); ?>
</div>