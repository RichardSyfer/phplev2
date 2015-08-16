<?php

class View
    implements Iterator
{
    protected $data = [];

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
        //transform $this->data['articles'] to $articles
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

    public function current()
    {
        // TODO: Implement current() method.
    }

    public function next()
    {
        // TODO: Implement next() method.
    }

    public function key()
    {
        // TODO: Implement key() method.
    }

    public function valid()
    {
        // TODO: Implement valid() method.
    }

    public function rewind()
    {
        // TODO: Implement rewind() method.
    }
}