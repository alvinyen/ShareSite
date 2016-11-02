<?php

/**
 * base model
 * some constants define in config.php
 */
class Model
{
    protected $databaseHandler;
    protected $statement;

    public function __construct()
    {
        $this->databaseHandler = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME , DB_USER, DB_PASSWORD);
    }

    //其他還要實作query、bind、execute、resultset、single

}