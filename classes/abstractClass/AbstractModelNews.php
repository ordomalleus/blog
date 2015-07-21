<?php

abstract class AbstractModelNews
{

    static protected $table;
    protected $data = [];

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    public static function getTable()
    {
        return static::$table;
    }

    public static function getAll()
    {
        require_once __DIR__ . '/../../config.php';

        $class = get_called_class();
        $query = 'SELECT * FROM ' . static::getTable();

        $db = new PdoSql($config->bd, $config->server, $config->user, $config->password);
        $db->setClassName($class);

        return $db->query($query);
    }

    public static function getOne($id)
    {
        require_once __DIR__ . '/../../config.php';

        $db = new PdoSql($config->bd, $config->server, $config->user, $config->password);

        $class = get_called_class();
        $db->setClassName($class);

        $query = 'SELECT * FROM ' . static::getTable() . ' WHERE id=:id';

        $res = $db->query($query, [':id' => $id]);

        if (!empty($res)) {
            return $res[0];
        }
        return false;
    }

    //поиск по заданому полю в таблице и значению(Например поиск по имени загаловка\ или поиск по id)
    public static function getOneColumn($column, $value)
    {
        require_once __DIR__ . '/../../config.php';
        $db = new PdoSql($config->bd, $config->server, $config->user, $config->password);
        $db->setClassName(get_called_class());

        $query = 'SELECT * FROM ' . static::getTable() . ' WHERE ' . $column . '=:value';
        $res = $db->query($query, [':value' => $value]);

        if (!empty($res)) {
            return $res[0];
        }
        return false;
    }

    public function insert()
    {
        require_once __DIR__ . '/../../config.php';

        $cols = array_keys($this->data);

        $data = [];
        foreach ($cols as $col) {
            $data[':' . $col] = $this->data[$col];
        }

        $query = 'INSERT INTO ' . static::$table . ' '
            . '(' . implode(', ', $cols) . ') '
            . 'VALUES '
            . '(' . implode(', ', array_keys($data)) . ')';

        $db = new PdoSql($config->bd, $config->server, $config->user, $config->password);

        $res = $db->execute($query, $data);
        $this->id = $db->lastInsertId();

        return $res;
    }

    public function update()
    {
        require_once __DIR__ . '/../../config.php';
        $db = new PdoSql($config->bd, $config->server, $config->user, $config->password);

        $cols = [];
        $data = [];
        foreach ($this->data as $key => $value) {
            $data[':' . $key] = $value;
            if('id' === $key){
                continue;
            }
            $cols[] = $key . '=:' . $key;
        }
        //var_dump($cols);echo '<br>';var_dump($data);die;

         $query = '
            UPDATE ' . static::$table . '
            SET ' . implode(', ', $cols)  . '
            WHERE id=:id
        ';
        //var_dump($data);die;

         //$query = 'UPDATE ' . static::$table . ' SET ' . implode(', ', $cols) . ' WHERE id=:id';

        return $db->execute($query, $data);
    }
}