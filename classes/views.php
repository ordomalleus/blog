<?php

class Views
    implements Countable
{

    protected $data = [ ];
    
    
    //пустое значение если от корня или папку в /foo/
    protected $redirectBase = '/';
    public $base = '/';

    //Магия в ООП php. Задает произвольные свойства у объекта
    public function __set( $key, $value )
    {

        $this->data[$key] = $value;
    }

    public function __get($key)
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

        echo $this->render($template);

    }

    public function redirect( $template )
    {

        header( 'Location: http://'.$_SERVER['HTTP_HOST'].$this->redirectBase.$template );

    }

    public function count()
    {

        return count($this->data);

    }
}