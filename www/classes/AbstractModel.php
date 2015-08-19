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

    public function __isset($key)
    {
        return isset($this->data[$key]);
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
        $res = $db->query($sql, [':id' => $id])[0];
        if (empty($res)) {
            $e_message = 'В базе данных не найдена запись, соответсвующая данному id=' . $id;
            $e_code = 1;
            throw new E404Exception($e_message, $e_code);
        }
        return $res;
    }

    public static function findByColumn($column, $value)
    {
        $db = new ODB();
        $db->setClassName(get_called_class());

        $sql = "SELECT * FROM " . static::$table .
            " WHERE " . $column . " LIKE :" . $column;

        $res = $db->query($sql,[':'. $column => '%'.$value.'%']);
        if (empty($res)) {
            $e_message = 'Пустой результат выборки по запросу';
            $e_code = 2;
            throw new E404Exception($e_message, $e_code);
        }
        return $res;
    }

    protected function insert()
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
        $db->execute($sql, $prms);
        $this->id = $db->lastInsertId();
    }

    protected function update()
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

        $setstr = [];
        $prms = [];
        foreach ($this->data as $k => $v) {
            $prms[':' . $k] = $v;
            if ('id' == $k) {
                continue;
            }
            $setstr[] = $k . ' = :' .$k;
        }

        $sql =
            'UPDATE ' . static::$table .
            ' SET ' . implode(', ', $setstr).
            ' WHERE id=:id';

        $db = new ODB();
        $db->execute($sql, $prms);
    }

    public function save()
    {
        if (!isset($this->id)) {
            $this->insert();
        } else {
            $this->update();
        }
    }

    public function delete()
    {
        $sql = "DELETE FROM " . static::$table . " WHERE id=:id";
        $db = new ODB();
        $db->execute($sql, [':id' => $this->id]);
    }



}
