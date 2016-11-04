<?php
class Users extends Controller{
    //users controller 不會有 index()，太怪，待會再添加login、logout、register

    public function register(){
        $viewModel = new UserModel();
        $this->returnView($viewModel->register(), true);
    }

    public function login(){
        $viewModel = new UserModel();
        $this->returnView($viewModel->login(), true);
    }

    public function logout(){
        //1.kill
        unset($_SESSION['is_logged_in']);
        unset($_SESSION['user_data']);
        session_destroy(); //just be safe, it will kill all session variables

        //2.refirect
        echo '<script>window.location.replace("http://localhost:8888");</script>';
    }
}
