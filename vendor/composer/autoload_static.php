<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0a6985ac8296805107787ae455f66340
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0a6985ac8296805107787ae455f66340::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0a6985ac8296805107787ae455f66340::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}