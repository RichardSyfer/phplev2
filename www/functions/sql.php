<?php
function Sql_connect()
{
    mysql_connect('localhost', 'root', '');
    mysql_select_db('test');
}

function Sql_exec($query_str)
{
    Sql_connect();
    mysql_query($query_str);
}

function Sql_query($query_str)
{
    Sql_connect();

    $res = mysql_query($query_str);

    $ret = [];
    while (false !== $row = mysql_fetch_assoc($res)) {
        $ret[] = $row;
    }

    return $ret;
}