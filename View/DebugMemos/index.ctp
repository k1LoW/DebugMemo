<div id="debug-memo-header"><?php echo $this->Html->image('/debug_memo/img/debug_memo_icon.png', array('alt' => 'DebugMemo')); ?>Memo List</div>

<p id="debug-memo-page-info">
    <?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?>
</p>
<table class="debug-memo-table">
    <tr>
        <th class="debug-memo-table-url">
            URL
        </th>
        <th>
            Memo
        </th>
        <th>
            Modified
        </th>
    </tr>
    <?php foreach($debug_memos as $memo): ?>
    <tr>
        <td class="debug-memo-table-url">
            <?php echo $memo['DebugMemo']['controller']; ?><?php echo ($memo['DebugMemo']['action'] === 'index') ? '' : '/' . $memo['DebugMemo']['action']; ?>
        </td>
        <td>
            <?php echo nl2br($memo['DebugMemo']['memo']); ?>
        </td>
        <td>
            <?php echo $memo['DebugMemo']['modified']; ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php echo $this->Paginator->pagination(); ?>