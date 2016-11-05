<?php
class Shares extends Controller
{
    protected function Index()
    {
        $viewModel = new ShareModel();
        $this->returnView( $viewModel->Index(), true);
    }

    protected function add(){
        if(!isset($_SESSION['is_logged_in'])){
            echo '<script> window.location.replace("http://localhost:8888/shares") ; </script>';
        }
        $viewModel = new ShareModel();
        $this->returnView( $viewModel->add(), true);
    }
}
