<?php

class View implements Iterator, Countable
{
    protected $data = []; //['1', '2', '3', '4'];

    public function __set($key, $val)
    {
        $this->data[$key] = $val;
    }

    public function __get($key)
    {
        return $this->data[$key];
    }

    public function render($template_link)
    {
        // transform $this->data['articles'] to $articles
        foreach ($this->data as $key => $val) {
            $$key = $val;
        }

        ob_start();
        include __DIR__ . '/../views/' . $template_link;
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }

    public function display($template_link)
    {
        echo $this->render($template_link);
    }

    //methods for Iterator
    public function current()
    {
        // var_dump(__METHOD__);
        return current($this->data);
    }

    public function next()
    {
        // var_dump(__METHOD__);
        next($this->data);
    }

    public function key()
    {
        // var_dump(__METHOD__);
        return key($this->data);
}

    public function valid()
    {
        // var_dump(__METHOD__);
        return isset($this->data[$this->key()]);
    }

    public function rewind()
    {
        // var_dump(__METHOD__);
        reset($this->data);
    }

    // method for Countable
    public function count(){
        return count($this->data);
    }
}
