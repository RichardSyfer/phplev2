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

    public static function findByColumn($field, $value)
    {
        $class = get_called_class();
        $sql = "SELECT * FROM " . static::$table .
            " WHERE " . $field . " LIKE :" . $field;

        $db = new ODB();
        $db->setClassName($class);
        return $db->query($sql,[':'. $field => '%'.$value.'%']);
    }

    public function insert()
    {
        $cols = array_keys($this->data);
        $prms = [];
        foreach ($cols as $val) {
            $prms[':' . $val] = $this->data[$val];
        }

        $sql = '
            INSERT INTO ' . static::$table .'
            ('. implode(', ', $cols) .')
            VALUES
            ('. implode(', ', array_keys($prms)) .')
        ';

        // $this->data
        // ['title'=>'Foo', 'text'=>'Bar']
        // для подстановки
        // [':title'=>'Foo', ':text'=>'Bar']
        // п.э. создан локал. массив $data

        $db = new ODB();
        $this->data['id'] = $db->execute($sql, $prms);
    }

    public function delete($field, $value)
    {
        $sql = "DELETE FROM " . static::$table . " WHERE " . $field . "=:" . $field;
        $db = new ODB();
        $db->execute($sql, [':' . $field => $value]);
    }

    public function update($column, $value)
    {
        /*  UDPDATE table
            SET col1=val1, col2=val2, colN=valN
            WHERE someCol=someVal

            sql=
            UPDATE articles
            SET title = :title, author = :author
            WHERE id = :id

            prms= для подстановки PDO->execute
            [':title' => 'MyNewTitle', ':author' => 'NewAuthor', ':id' => 123]
         */

        $cols = array_keys($this->data);
        $prms = [];
        foreach ($cols as $val) {
            $prms[':' . $val] = $this->data[$val];
        }
        $prms[':' . $column] = $value;

        $setstr = [];
        foreach ($cols as $val) {
            $setstr[] = $val . ' = :' .$val;
        }

        $sql =
            'UPDATE ' . static::$table .
            ' SET ' . implode(', ', $setstr).
            ' WHERE ' . $column . '=:' . $column;

        $db = new ODB();
        $db->execute($sql, $prms);
    }

}
