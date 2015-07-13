<?php

class Views {

    protected $data = [];

    public function assign($name, $value){

        $this->data[$name] = $value;

    }

    public function display($template){

        include __DIR__.'/../views/'.$template;

    }

}