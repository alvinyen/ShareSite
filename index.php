<?php

session_start();//session必須要start之後才能繼續使用，因此在一定會load到的index.php去做設定

//include config
require('config.php');

require('classes/Bootstrap.php');
require('classes/Controller.php');
require('classes/Model.php');
require('classes/Message.php');

require('controllers/home.php');
require('controllers/users.php');
require('controllers/shares.php');

require('models/home.php');
require('models/user.php');
require('models/share.php');

$bootstrap = new Bootstrap($_GET);

$controller = $bootstrap->createController();
if($controller){
    $controller->executeAction();
}

