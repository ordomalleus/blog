<?php


abstract class AbstractModelBlog
    implements INewsModels
{

    protected static $table;
    protected static $class;

    public static function getAll()
    {

        require_once __DIR__ . '/../../config.php';

        $db = new BdSql($config->server, $config->user, $config->password, $config->bd);
        //хитрая магия с наследованием, надо разобраться подробней
        //static::$table передает значение из наследуемого класса
        $query = 'SELECT * FROM ' . static::$table;

        return $db->sqlQueryAll($query, static::$class);
    }

    public static function getOne($id)
    {

        require_once __DIR__ . '/../../config.php';

        $db = new BdSql($config->server, $config->user, $config->password, $config->bd);

        return $db->sqlQueryOne('SELECT * FROM ' . static::$table . ' WHERE id=' . $id, static::$class);
    }

    public static function delOne($id)
    {

        require_once __DIR__ . '/../../config.php';

        $db = new BdSql($config->server, $config->user, $config->password, $config->bd);
        $query = 'DELETE FROM ' . static::$table . ' WHERE id=' . $id;

        return $db->sqlDel($query);
    }

    public static function addOne($title, $text = '')
    {
        if (isset($title)) {
            if (!empty($title)) {
                $title = strip_tags($title);
                if (isset($text) and !empty($text)) {
                    $text = $text;
                } else {
                    $text = '';
                }
            } else {
                return false;
            }
        } else {
            return false;
        }

        require_once __DIR__ . '/../../config.php';

        $db = new BdSql($config->server, $config->user, $config->password, $config->bd);
        $query = "INSERT INTO " . static::$table . "(title, text) "
            . "VALUES ('" . $title . "','" . $text . "')";

        return $db->sqlExec($query);

    }

    public static function updateOne($id, $title, $text = '')
    {
        if (isset($title) and isset($id)) {
            if (!empty($title) and !empty($id)) {
                $title = strip_tags($title);
                if (isset($text) and !empty($text)) {
                    $text = $text;
                } else {
                    $text = '';
                }
            } else {
                return false;
            }
        } else {
            return false;
        }

        require_once __DIR__ . '/../../config.php';

        $db = new BdSql($config->server, $config->user, $config->password, $config->bd);
        $query = "UPDATE " . static::$table . " SET "
            . "title='" . $title . "',text='" . $text . "' WHERE id=" . $id;

        return $db->sqlUpdate($query);

    }
}