<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbe9ab7399fc3e08bfedf713b2a1ab2f8
{
    public static $prefixLengthsPsr4 = array (
        'l' => 
        array (
            'liw\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'liw\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbe9ab7399fc3e08bfedf713b2a1ab2f8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbe9ab7399fc3e08bfedf713b2a1ab2f8::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
