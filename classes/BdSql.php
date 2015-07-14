<?php

class BdSql
{

    /**
     * класc для работы с бд
     */

    private $connect;

    public function __construct( $serverBd, $userBd, $pwdBd, $baseBd )
    {

        $this->connect = new mysqli( $serverBd, $userBd, $pwdBd, $baseBd );
    }

    //Запрос на запись в бд без возврата
    public function sqlExec( $query )
    {
        
        $this->connect->set_charset("utf8");
        if ($this->connect->query( $query )) {
            return true;
        }

        return false;

    }

    //Запрос на удаление в бд без возврата
    public function sqlDel( $query )
    {

        if ($this->connect->query( $query )) {
            return true;
        }

        return false;

    }

    //Запрос с возвратом из бд в виде переданого класса
    public function sqlQueryAll( $query , $class = 'stdClass' )
    {
        $this->connect->set_charset("utf8");
        if ($result = $this->connect->query( $query )) {

            $ret = [ ];
            while ($row = $result->fetch_object($class)) {
                $ret[] = $row;
            }
            $result->free();

            return $ret;
        } else {
            return false;
        }
    }

    public function sqlQueryOne ( $query , $class = 'stdClass' )
    {
        return $this->sqlQueryAll( $query , $class )[0];
    }
}