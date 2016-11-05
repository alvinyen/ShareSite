<?php
class Message{
//    define('error','error');  //wrong!!!
    static const error = 'error';
    static const errorMsg = 'errorMsg';
    static const success = 'success';
    static const successMsg = 'successMsg';
    public static function setMsg($text, $type){
        if($type == Message::error){
            $_SESSION[ Message::errorMsg ] = $text;
        }elseif ($type == Message::success){
            $_SESSION[ Message::successMsg ] = $text;
        }else{
            echo 'something wrong in Message process..';
            die();
        }
    }

    public static function displayMsg(){
        if(isset($_SESSION[ Message::errorMsg ])){
            echo '<div class="alert alert-danger">' . $_SESSION[ Message::errorMsg ] . '</div>';

            //訊息呈現、印出之後記得unset、清掉
            unset($_SESSION[ Message::errorMsg ]);
        }elseif (isset($_SESSION[ Message::successMsg ])){
            echo '<div class="alert alert-success">' . $_SESSION[ Message::successMsg ] . '</div>'

            //訊息呈現、印出之後記得unset、清掉
            unset($_SESSION[ Message::successMsg ]);
        }else{
            echo 'sth errors happen in displayMsg.., no msg to display..';
        }
    }
}