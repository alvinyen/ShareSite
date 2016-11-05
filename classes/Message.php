<?php
class Message{
//    define('error','error');  //wrong!!!
    const error = 'error';  //這樣就夠了！！不用再加static!!
    const errorMsg = 'errorMsg';
    const success = 'success';
    const successMsg = 'successMsg';

    public static function setMsg($text, $type){
        if($type == self::error){
            $_SESSION[ self::errorMsg ] = $text;
        }elseif ($type == self::success){
            $_SESSION[ self::successMsg ] = $text;
        }
    }

    public static function displayMsg(){
        if(isset($_SESSION[ self::errorMsg ])){
            echo '<div class="alert alert-danger">' . $_SESSION[ self::errorMsg ] . '</div>';

            //訊息呈現、印出之後記得unset、清掉
            unset($_SESSION[ self::errorMsg ]);
        }elseif (isset($_SESSION[ self::successMsg ])){
            echo '<div class="alert alert-success">' . $_SESSION[ self::successMsg ] . '</div>';

            //訊息呈現、印出之後記得unset、清掉
            unset($_SESSION[ self::successMsg ]);
        }
    }
}