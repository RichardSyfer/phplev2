<?php

class DB
{
    public function __construct() {
        mysql_connect('localhost', 'root', '');
        mysql_select_db('test');
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