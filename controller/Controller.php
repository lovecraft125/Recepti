<?php
namespace controller;

class Controller{
    public function loadView($view){
        include 'includes/'.$view.'.php';
    }
}
