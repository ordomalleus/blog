<?php

class Views {

    protected $data = [];
    
    
    //пустое значение если от корня или папку в /foo/
    protected $redirectBase = '/blog/';
    public $base = 'blog';

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

    public function redirect($template){

        header('Location: http://'. $_SERVER['HTTP_HOST'] . $this->redirectBase . $template);

    }

}