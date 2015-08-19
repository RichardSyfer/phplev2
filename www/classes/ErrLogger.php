<?php

class ErrLogger extends Exception
{
    protected $logStr;

    public function __construct($e)
    {
        define('ERR_LOGS_FILE', __DIR__ . '/../e_logs/Errors.txt');

        $this->message = $e->getMessage();
        $this->code = $e->getCode();
        $this->file = $e->getFile();
        $this->line = $e->getLine();

        $this->logStr = 'Date/Time: ' . date('Y/m/d H:i:s') . PHP_EOL .
                        'Message:   ' . $this->message . PHP_EOL .
                        'Code:      ' . $this->code . PHP_EOL .
                        'File:      ' . $this->file . PHP_EOL .
                        'Line:      ' . $this->line . PHP_EOL . PHP_EOL;

        $this->saveLogToFile();
    }

    public function saveLogToFile()
    {
        file_put_contents(ERR_LOGS_FILE, $this->logStr, FILE_APPEND | LOCK_EX);
    }
}