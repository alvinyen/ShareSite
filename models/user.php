<?php
class UserModel extends Model{
    //users controller 不會有 index()，太怪，待會再添加login、logout、register

    public function register(){
        //1.sanitize POST
        $post=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //*****2.對密碼內容加密！！！  encrypt password
        $password = md5($post['password']);

        if($post['submit']){
            if( $post['name']=='' || $post['email']=='' || $post['password']=='' ){
                Message::setMsg('pls fill in add fields..', Message::error);
                return ; //這個return超重要！！！！！不然會把那些空值塞進資料庫..且會redirect...結果錯誤訊息提示就永遠都沒機會看到...
            }

            //3.insert into satabase (prepare query statement)
            $this->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
            $this->bind(':name', $post['name']);
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password); //把密碼直接存進database是非常愚蠢的行為..

            //4.execute prepared query statement
            $this->execute();

            //5.verify
            if($this->lastInsertId()){
                echo '<script>window.location.replace("http://localhost:8888/users/login");</script>';
            }
        }
    }

    public function login(){
        //1.sanitize posr 『Array』
        $post=filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //2.幹太重要了！！password要先轉成MD5這樣去資料庫才比對得到！！
        //因為資料庫中存的密碼是MD5形式

        $password = md5($post['password']);
        //echo $password;

        if($post['submit']){
            //for test
//            echo 'submitted';

            //2.insert into databse (prepare query statement)
            $this->query('SELECT * FROM users WHERE email=:email AND password=:password');
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);

            //3.execute prepared query statement、透過single()方法取得回傳的資料列$row
            //因為普通的resultSet(除了執行execute之外)是回傳多個資料列，但這邊不用！！這邊只要撈一筆資料！！
            //承上，故到Base Model中去新增single()方法
            $row=$this->single();

            //4.verify
            if($row){
                //for test
//                echo 'logged in' ; //之後再來實作者邊的訊息方塊

                //5.creating session value
//                echo $row['id'];
//                echo $row['name'];
//                echo $row['email'];
                $_SESSION['is_logged_in']=true;
                $_SESSION['user_data']=array(
                    'id' => $row['id'],
                    'name' => $row['name'],  //一但session value設定好之後就可以在app中任何1個地方使用
                    'email' => $row['email'] //例如：歡迎$_SESSION['user_data']['name']登入
                );

                echo '<script>window.location.replace("http://localhost:8888");</script>';
            }else{
//                echo 'logged failed';
                Message::setMsg('Incorrect Login..', Message::error);
            }
        }
    }
}