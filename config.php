<?php
//設定常數的好所在
//database params因為幾乎不會再改動，所以宣告成常數是非常好的！！
//define db params as constant
//..

define("DB_HOST",'localhost'); //e04一定要加上portNumber啊！！
define("DB_USER",'root');
define("DB_PASSWORD",'root');
define("DB_NAME",'sharesite');

//define URL
define("ROOT_PATH", "/");  //define(“ROOT_PATH”, ‘/sharesite/’); 實際上是在開發sharesite這個site、app，但這邊為了方便解釋所以僅設定成slash，之後再去check這邊的運作機制
define("ROOT_URL", "http://localhost:8888/");