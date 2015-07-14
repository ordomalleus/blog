<?php


abstract class AbstractModelBlog {

    protected static $table;
    protected static $class;

    public static function getAll(){

        require_once __DIR__ . '/../../config.php';

        $db = new BdSql($config->server , $config->user , $config->password , $config->bd);
        //хитрая магия с наследованием, надо разобраться подробней
        //static::$table передает значение из наследуемого класса
        $query = 'SELECT * FROM '. static::$table ;
        return  $db->sqlQueryAll( $query , static::$class);
    }

    public static function getOne($id){

        require_once __DIR__ . '/../../config.php';

        $db = new BdSql($config->server , $config->user , $config->password , $config->bd);
        return  $db->sqlQueryOne('SELECT * FROM '.static::$table.' WHERE id=' . $id, static::$class);
    }
    
    public static function addOne($title , $text = '') {
        if(isset($title)){
          if(!empty($title)){
            $title = strip_tags($title);
            if (isset($text) and !empty($text)){
              $text = $text;
            } else {
              $text = '';
            }
          } else {
            return FALSE;
          }
        } else {
          return FALSE;
        }

        require_once __DIR__ . '/../../config.php';
        
        $db = new BdSql($config->server , $config->user , $config->password , $config->bd);
        $query = "INSERT INTO " . static::$table . "(title, text) "
                . "VALUES ('" . $title . "','" . $text . "')";
        return $db->sqlExec($query);
      
    }
}