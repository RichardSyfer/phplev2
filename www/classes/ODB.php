<?php

class ODB
{
    private $dbh;
    private $className = 'stdClass';

    public function __construct()
    {
        require __DIR__ . '/../core/config.php';

        $dsn = 'mysql:dbname=' . $config['db']['db_name'] .
            ';host=' . $config['db']['db_host'];

        $this->dbh = new PDO($dsn,
            $config['db']['db_username'],
            $config['db']['db_password']
            );
    }

    public function setClassName($className)
    {
        $this->className = $className;
    }

    public function query($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
    }

    public function execute($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }
}
