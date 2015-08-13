<?php

class Php2SQL
{
    protected $server = 'localhost';
    protected $user = 'root';
    protected $password = '';
    protected $db = 'test';

    public function __construct() {
        mysql_connect($this->server, $this->user, $this->password);
        mysql_select_db($this->db);
    }

    public function Sql_query($query_str, $class = 'stdClass')
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

    public function Sql_exec($query_str)
    {
        mysql_query($query_str);
    }

}