<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php echo $this->Html->css('DebugMemo.debug_memobar.css'); ?>
</head>

<body id="debug-memo-body">
    <div class="container">

        <?php echo $this->Session->flash(); ?>

        <?php echo $this->fetch('content'); ?>

    </div> <!-- /container -->
    <?php echo $this->Html->script('/debug_memo/js/jquery'); ?>
    <?php echo $this->Html->script('/debug_memo/js/js_debug_memobar'); ?>
</body>
</html>
