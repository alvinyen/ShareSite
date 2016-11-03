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

    public function query($query){
        $this->statement = $this->databaseHandler->prepare($query);
    }

    //bind the prepare statement
    public function bind($param, $value, $type=null){
        if(is_null($type)){
            switch (true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->statement->bindValue($param, $value, $type);
    }

    public function execute(){
        $this->statement->execute();
    }

    public function resultSet(){
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }
}