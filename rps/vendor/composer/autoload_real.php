<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInita1f35bfa05eefa1677172c885a98256f
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInita1f35bfa05eefa1677172c885a98256f', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInita1f35bfa05eefa1677172c885a98256f', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInita1f35bfa05eefa1677172c885a98256f::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
