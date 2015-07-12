<?php


class News {
    public $id;
    public $title;
    public $text;
    protected $tables = 'news';

    public static function getAll(){

        require_once __DIR__ . '/../config.php';

        $db = new BdSql($config->server , $config->user , $config->password , $config->bd);
        return  $db->sqlQuery('SELECT * FROM news', 'News');
    }

    public static function getOne($id){

        require_once __DIR__ . '/../config.php';

        $db = new BdSql($config->server , $config->user , $config->password , $config->bd);
        return  $db->sqlQuery('SELECT * FROM news WHERE id=' . $id, 'News');
    }
}