<?php

class PdoSql
{

    private $dbh;
    private $className = 'stdClass';

    public function __construct( $baseBd, $serverBd, $userBd, $pwdBd )
    {
        $this->dbh = new PDO( 'mysql:dbname='.$baseBd.';charset=UTF8;host='.$serverBd.';', $userBd, $pwdBd );
    }

    public function setClassName( $className )
    {
        $this->className = $className;
    }
    
    //подготовленный запрос в базу на получение данных
    //в нужном формате заданного класса
    public function query( $sql, $params = [ ] )
    {
        $sth = $this->dbh->prepare( $sql );
        $sth->execute( $params );

        return $sth->fetchAll( PDO::FETCH_CLASS, $this->className );
    }
    
    //подготовленный запрос в базу на запись данных
    public function execute( $sql, $params = [ ] )
    {
        $sth = $this->dbh->prepare( $sql );

        return $sth->execute( $params );
    }

}