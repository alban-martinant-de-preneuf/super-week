<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit667ae47bf0380930bf852b2bacfc0d32
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
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'AltoRouter' => __DIR__ . '/..' . '/altorouter/altorouter/AltoRouter.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit667ae47bf0380930bf852b2bacfc0d32::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit667ae47bf0380930bf852b2bacfc0d32::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit667ae47bf0380930bf852b2bacfc0d32::$classMap;

        }, null, ClassLoader::class);
    }
}
