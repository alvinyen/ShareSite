<?php
class ShareModel extends Model{

    public function Index(){
        $this->query('SELECT * FROM Shares');
        $rows = $this->resultSet();
//        print_r($rows);
        return $rows;
    }

    public function add(){
        //$this->query()


    }
}