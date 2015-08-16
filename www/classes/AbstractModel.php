<?php

abstract class AbstractModel
{
    protected static $table;
    protected static $class;

    public static function getAll(){
        $sql_query_str = "SELECT * FROM " . static::$table;
        $db = new DB;
        return $db->queryAll($sql_query_str, static::$class);
    }

    public static  function getOne($id)
    {
        $sql_query_str = "SELECT * FROM " . static::$table . " WHERE id=" . $id;
        $db = new DB();
        return $db->queryOne($sql_query_str, static::$class);

    }
}