<?php
class Users extends Controller{
    //users controller 不會有 index()，太怪，待會再添加login、logout、register

    public function register(){
        $viewModel = new UserModel();
        $this->returnView($viewModel->register(), true);
    }
}
