# DebugMemo: Memo tool for development / CakePHP plugin

## Install

First, Install 'DebugMemo' by [recipe.php](https://github.com/k1LoW/recipe) , and set `CakePlugin::load('DebugMemo');`

Second, Create schema.

    ./lib/Cake/Console/cake schema create debug_memos --plugin DebugMemo

Finally, add the following code in AppController.php

    <?php
        class AppController extends Controller {
            public $components = array('DebugMemo.Memobar');
        }


## Usage

Click bottom bar (when debug = 2).

![Click bottom bar](https://raw.github.com/k1LoW/DebugMemo/master/image.png)

And save memo.

![And save memo](https://raw.github.com/k1LoW/DebugMemo/master/image2.png)

## License

the MIT License

