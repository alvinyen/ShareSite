<?php
class UserModel extends Model{
    //users controller 不會有 index()，太怪，待會再添加login、logout、register

    public function register(){
        //1.sanitize POST
        $post=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //*****2.對密碼內容加密！！！  encrypt password
        $password = md5($post['password']);

        if($post['submit']){
            //insert into satabase
            $this->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
            $this->bind(':name', $post['name']);
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password); //把密碼直接存進database是非常愚蠢的行為..

            $this->execute();

            if($this->lastInsertId()){
                echo '<script>window.location.replace("http://localhost:8888/users/login");</script>';
            }
        }

    }
}