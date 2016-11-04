<?php
class Home extends Controller {

    protected function Index(){
        $viewModel = new HomeModel(); //實際上就是model, view的model
        $this->returnView($viewModel->Index(), true);   //true is for the full view
    }
}