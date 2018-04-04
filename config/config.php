<?php

//namespace Config;

class Config
{
    const AUTOLOAD_PATH = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
    const LOCAL_DATA_PATH = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR;

    const DEFAULT_STORAGE_METHOD = 'local';

}
