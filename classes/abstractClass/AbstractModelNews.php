<?php

abstract class AbstractModelNews {

    static protected $table;

    public static function getTable()
    {
        return static::$table;
    }

    public static function getAll()
    {
        require_once __DIR__.'/../../config.php';

        $db = new PdoSql($config->bd, $config->server, $config->user, $config->password);

        $query = 'SELECT * FROM '.static::$table;

        return $db->query($query);
    }

    public static function getOne( $id )
    {
        require_once __DIR__.'/../../config.php';

        $db = new PdoSql($config->bd, $config->server, $config->user, $config->password);

        $query = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';

        return $db->query($query , [':id' => $id] );
    }
}