<?php
namespace controller;

class ViewController extends Controller{
    public function home(){
        if(isset($_GET['page'])){
            $this->loadView($_GET['page']);
        }else{
            $this->loadView('main');
        }
    }
}

