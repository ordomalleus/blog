<?php

class PdoSql
{

    private $dbh;

    public function __construct( $baseBd, $serverBd, $userBd, $pwdBd )
    {
        $this->dbh = new PDO( 'mysql:dbname='.$baseBd.';host='.$serverBd.';', $userBd, $pwdBd );
    }

    public function query( $sql, $params = [ ] )
    {
        $sth = $this->dbh->prepare( $sql );
        $sth->execute( $params );

        return $sth->fetchAll( PDO::FETCH_OBJ );
    }

}