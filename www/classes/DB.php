<?php

class DB
{
    public function __construct() {
        require __DIR__ . '/../core/config.php';

        mysql_connect($config['db']['db_host'], $config['db']['db_username'], $config['db']['db_password']);
        mysql_select_db($config['db']['db_name']);
    }

    public function queryAll($query_str, $class = 'stdClass')
    {
        $res = mysql_query($query_str);

        if (false === $res) {
            return false;
        }

        $ret = [];
        while (false !== $row = mysql_fetch_object($res, $class)) {
            $ret[] = $row;
        }

        return $ret;
    }

    public function queryOne($sql, $class = 'stdClass')
    {
        return $this->queryAll($sql, $class)[0];
    }

    public function queryExec($query_str)
    {
        mysql_query($query_str);
    }

}