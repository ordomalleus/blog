<?php

abstract class AbstractModelNews
{

    static protected $table;

    public static function getTable()
    {
        return static::$table;
    }

    public static function getAll()
    {
        require_once __DIR__.'/../../config.php';

        $db = new PdoSql( $config->bd, $config->server, $config->user, $config->password );

        $class = get_called_class();
        $db->setClassName($class);

        $query = 'SELECT * FROM '.static::getTable();

        return $db->query( $query );
    }

    public static function getOne( $id )
    {
        require_once __DIR__.'/../../config.php';

        $db = new PdoSql( $config->bd, $config->server, $config->user, $config->password );

        $class = get_called_class();
        $db->setClassName($class);

        $query = 'SELECT * FROM '.static::getTable().' WHERE id=:id';

        return $db->query( $query, [ ':id' => $id ] )[0];
    }
}