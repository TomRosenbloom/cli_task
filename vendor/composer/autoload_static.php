<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit71e65fb495da5212ce917e5ec9d72f1f
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'M' => 
        array (
            'Monolog\\' => 8,
            'Michelf\\' => 8,
        ),
        'L' => 
        array (
            'League\\CommonMark\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
        'Michelf\\' => 
        array (
            0 => __DIR__ . '/..' . '/michelf/php-markdown/Michelf',
        ),
        'League\\CommonMark\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/commonmark/src',
        ),
    );

    public static $classMap = array (
        'Config' => __DIR__ . '/../..' . '/config/config.php',
        'MarkdownOptions' => __DIR__ . '/../..' . '/config/markdownOptions.php',
        'StorageStrategy' => __DIR__ . '/../..' . '/src/storageStrategy.php',
        'StoreFTP' => __DIR__ . '/../..' . '/src/storageStrategy.php',
        'StoreFile' => __DIR__ . '/../..' . '/src/storageStrategy.php',
        'StoreLocal' => __DIR__ . '/../..' . '/src/storageStrategy.php',
        'StoreS3' => __DIR__ . '/../..' . '/src/storageStrategy.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit71e65fb495da5212ce917e5ec9d72f1f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit71e65fb495da5212ce917e5ec9d72f1f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit71e65fb495da5212ce917e5ec9d72f1f::$classMap;

        }, null, ClassLoader::class);
    }
}