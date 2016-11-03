<?php

/**
 * Created by PhpStorm.
 * User: KJ-Yen
 * Date: 2016/11/2
 * Time: 下午7:30
 */
class Controller
{
    protected $action ;
    protected $request ;

    public function __construct($action, $request)
    {
        $this->action = $action ;
        $this->request = $request ;
//        echo $this->request;
    }

    public function executeAction(){
        return $this->{$this->action}();    //???那個{..}的語法是啥..
    }


    //$viewmodel的重點就是model！！！就是為了把model傳進controller的這個function處理 (傳給view)，進一步回傳對應的view
    /**
     * $viewmodel：其實就是modelName，傳入後require對應的model file
     * $fullview：boolean, 是否為fullview
     */
    protected function returnView($viewmodel, $fullview){ //$viewmodel的重點就是model！！！

        //require view file
        //ex：  views/users/login.php    //通常就xxxmodel單數
        $view = 'views/' . get_class($this) . '/' . $this->action . '.php' ;

        //check to see if the fullview
        if($fullview){  //???
            //if so, then load the 『main layout：views/main.php』 file 『to wrap』 the view
            //可以讓那個main layout裡面有各種的html tag、其他的single頁面、single page
            require('views/main.php');
        }else{
            require($view);  //$view就是上面我們一直concatinate那一串
        }
    }
}