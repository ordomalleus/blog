<?php

class Views {

    protected $data = [];

    //Магия в ООП php. Задает произвольные свойства у объекта
    public function __set($key , $value){

        $this->data[$key] = $value;
    }

    public function assign($name, $value){

        $this->data[$name] = $value;

    }

    public function display($template){


        foreach ($this->data as $key => $val){
            $$key = $val;
        }
        include __DIR__.'/../views/'.$template;

    }

}