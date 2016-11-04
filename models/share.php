<?php
class ShareModel extends Model{

    public function Index(){
        $this->query('SELECT * FROM Shares ORDER BY create_date DESC');
        $rows = $this->resultSet();
//        print_r($rows);
        return $rows;
    }

    public function add(){
        //1.sanitize POST        //引數1代表消毒Post Array
        $post=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


        //2.check for submit
        if($post['submit']){
            //for test
//            echo 'submitted';

            //3.insert into database
            //要處理的欄位有title、body、link、user_id
            $this->query('INSERT INTO Shares (title, body, link, user_id) VALUES (:title, :body, :link, :user_id)');
            $this->bind(':title',$post['title']);
            $this->bind(':body',$post['body']);
            $this->bind(':link',$post['link']);
            $this->bind(':user_id', 1);

            $this->execute(); //*********千萬別忘！！！

            //4.verify  //在實作這個方法時若還沒有lastInsertId()這個方法，則需要回到base model去實作
            if($this->lastInsertId()){
                //5.redirect
                echo '<script>window.location.replace("http://localhost:8888/shares");</script>';
//                header('Location: ' . "http://localhost:8888/shares");
            }
        }
        //return ;
    }
}