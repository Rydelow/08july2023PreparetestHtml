<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit50989f547160e30b048ac4ee36befb35
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
        'P' => 
        array (
            'PaymentPlugins\\WooFunnels\\Stripe\\' => 33,
            'PaymentPlugins\\CheckoutWC\\Stripe\\' => 33,
            'PaymentPlugins\\CartFlows\\Stripe\\' => 32,
            'PaymentPlugins\\Blocks\\Stripe\\' => 29,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
        'PaymentPlugins\\WooFunnels\\Stripe\\' => 
        array (
            0 => __DIR__ . '/../..' . '/packages/woofunnels/src',
        ),
        'PaymentPlugins\\CheckoutWC\\Stripe\\' => 
        array (
            0 => __DIR__ . '/../..' . '/packages/checkoutwc/src',
        ),
        'PaymentPlugins\\CartFlows\\Stripe\\' => 
        array (
            0 => __DIR__ . '/../..' . '/packages/cartflows/src',
        ),
        'PaymentPlugins\\Blocks\\Stripe\\' => 
        array (
            0 => __DIR__ . '/../..' . '/packages/blocks/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit50989f547160e30b048ac4ee36befb35::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit50989f547160e30b048ac4ee36befb35::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit50989f547160e30b048ac4ee36befb35::$classMap;

        }, null, ClassLoader::class);
    }
}
