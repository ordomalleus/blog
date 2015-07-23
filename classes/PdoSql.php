<?php

class PdoSql
{

    private $dbh;
    private $className = 'stdClass';

    //Подключение к базе с проверкой на исключение
    public function __construct($baseBd, $serverBd, $userBd, $pwdBd)
    {
        try {
            $this->dbh = new PDO('mysql:host=' . $serverBd . ';dbname=' . $baseBd . ';charset=UTF8;', $userBd, $pwdBd);
        } catch (PDOException $Exception) {
            $exc = new ModelException('Не удолось подключиться к базе в файле ' . __FILE__
                . '<br /> Класс вызвовший ошибку: ' . get_called_class()
            );
            throw $exc;
        }
    }

    public function setClassName($className)
    {
        $this->className = $className;
    }

    //подготовленный запрос в базу на получение данных
    //в нужном формате заданного класса
    public function query($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);

        return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
    }

    //подготовленный запрос в базу на запись данных
    public function execute($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);

        return $sth->execute($params);
    }

    //Получить последнее изменение в бд
    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }

}