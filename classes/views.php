<?php

class Views
    implements Countable, Iterator
{

    protected $data = [ ];
    //protected $header = include __DIR__.'/../views/';

    //пустое значение если от корня или папку в /foo/
    protected $redirectBase = '/';
    public $base = '';

    //Магия в ООП php. Задает произвольные свойства у объекта
    public function __set( $key, $value )
    {
        $this->data[$key] = $value;
    }

    public function __get( $key )
    {
        return $this->data[$key];
    }

    public function assign( $name, $value )
    {
        $this->data[$name] = $value;
    }

    public function render( $template )
    {
        foreach ($this->data as $key => $val) {
            $$key = $val;
        }

        ob_start();
        include __DIR__.'/../views/'.$template;
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }

    public function display( $template )
    {
        echo $this->render( $template );
    }

    public function redirect( $template )
    {
        header( 'Location: http://'.$_SERVER['HTTP_HOST'].$this->redirectBase.$template );
    }

    public function count()
    {
        return count( $this->data );
    }

    //интерфейс Countable для перебора массива $data = [ ];
    //нужно исправлять, пока не работает
    public function current()
    {
        current( $this->data );
    }

    public function next()
    {
        next( $this->data );
    }

    public function key()
    {
        key( $this->data );
    }

    public function valid()
    {
        valid( $this->data );
    }

    public function rewind()
    {
        reset( $this->data );
    }
}