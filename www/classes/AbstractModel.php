<?php

abstract class AbstractModel
{
    protected static $table;
    protected $data = [];

    public function __set($key, $val)
    {
        $this->data[$key] = $val;
    }

    public function __get($key)
    {
        return $this->data[$key];
    }

    public static function findAll()
    {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table;
        $db = new ODB();
        $db->setClassName($class);
        return $db->query($sql);
    }

    public static function findOneByPk($id)
    {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $db = new ODB();
        $db->setClassName($class);
        return $db->query($sql, [':id' => $id])[0];
    }

    public function insert()
    {
        $cols = array_keys($this->data);
        $data = [];
        foreach ($cols as $val) {
            $data[':' . $val] = $this->data[$val];
        }

        $sql = '
            INSERT INTO ' . static::$table .'
            ('. implode(', ', $cols) .')
            VALUES
            ('. implode(', ', array_keys($data)) .')
        ';

        // $this->data
        // ['title'=>'Foo', 'text'=>'Bar']
        // для подстановки
        // [':title'=>'Foo', ':text'=>'Bar']
        // п.э. создан локал. массив $data

        $db = new ODB();
        $db->execute($sql, $data);
    }
}
