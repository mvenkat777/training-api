<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbbc70ba138e3f2048483466d2d585843
{
    public static $files = array (
        '7b11c4dc42b3b3023073cb14e519683c' => __DIR__ . '/..' . '/ralouphie/getallheaders/src/getallheaders.php',
        'bd9634f2d41831496de0d3dfe4c94881' => __DIR__ . '/..' . '/symfony/polyfill-php56/bootstrap.php',
        '253c157292f75eb38082b5acb06f3f01' => __DIR__ . '/..' . '/nikic/fast-route/src/functions.php',
        'b33e3d135e5d9e47d845c576147bda89' => __DIR__ . '/..' . '/php-di/php-di/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'Z' => 
        array (
            'Zend\\EventManager\\' => 18,
            'Zend\\Code\\' => 10,
        ),
        'T' => 
        array (
            'Tr\\' => 3,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Util\\' => 22,
            'Symfony\\Polyfill\\Php56\\' => 23,
            'SuperClosure\\' => 13,
            'Slim\\Tests\\' => 11,
            'Slim\\Psr7\\' => 10,
            'Slim\\' => 5,
        ),
        'P' => 
        array (
            'Psr\\Http\\Server\\' => 16,
            'Psr\\Http\\Message\\' => 17,
            'Psr\\Container\\' => 14,
            'PhpParser\\' => 10,
            'PhpDocReader\\' => 13,
            'PackageVersions\\' => 16,
        ),
        'I' => 
        array (
            'Invoker\\' => 8,
        ),
        'F' => 
        array (
            'Fig\\Http\\Message\\' => 17,
            'FastRoute\\' => 10,
        ),
        'D' => 
        array (
            'Doctrine\\Common\\Lexer\\' => 22,
            'Doctrine\\Common\\Annotations\\' => 28,
            'DI\\Bridge\\Slim\\' => 15,
            'DI\\' => 3,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Zend\\EventManager\\' => 
        array (
            0 => __DIR__ . '/..' . '/zendframework/zend-eventmanager/src',
        ),
        'Zend\\Code\\' => 
        array (
            0 => __DIR__ . '/..' . '/zendframework/zend-code/src',
        ),
        'Tr\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Tr',
        ),
        'Symfony\\Polyfill\\Util\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-util',
        ),
        'Symfony\\Polyfill\\Php56\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-php56',
        ),
        'SuperClosure\\' => 
        array (
            0 => __DIR__ . '/..' . '/jeremeamia/superclosure/src',
        ),
        'Slim\\Tests\\' => 
        array (
            0 => __DIR__ . '/..' . '/slim/slim/tests',
        ),
        'Slim\\Psr7\\' => 
        array (
            0 => __DIR__ . '/..' . '/slim/psr7/src',
        ),
        'Slim\\' => 
        array (
            0 => __DIR__ . '/..' . '/slim/slim/Slim',
        ),
        'Psr\\Http\\Server\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-server-handler/src',
            1 => __DIR__ . '/..' . '/psr/http-server-middleware/src',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-factory/src',
            1 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
        'PhpParser\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/php-parser/lib/PhpParser',
        ),
        'PhpDocReader\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-di/phpdoc-reader/src/PhpDocReader',
        ),
        'PackageVersions\\' => 
        array (
            0 => __DIR__ . '/..' . '/ocramius/package-versions/src/PackageVersions',
        ),
        'Invoker\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-di/invoker/src',
        ),
        'Fig\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/fig/http-message-util/src',
        ),
        'FastRoute\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/fast-route/src',
        ),
        'Doctrine\\Common\\Lexer\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/lexer/lib/Doctrine/Common/Lexer',
        ),
        'Doctrine\\Common\\Annotations\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/annotations/lib/Doctrine/Common/Annotations',
        ),
        'DI\\Bridge\\Slim\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-di/slim-bridge/src',
        ),
        'DI\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-di/php-di/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'ProxyManager\\' => 
            array (
                0 => __DIR__ . '/..' . '/ocramius/proxy-manager/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbbc70ba138e3f2048483466d2d585843::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbbc70ba138e3f2048483466d2d585843::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitbbc70ba138e3f2048483466d2d585843::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
