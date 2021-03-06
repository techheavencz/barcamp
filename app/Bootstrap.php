<?php
declare(strict_types=1);

/** @noinspection PhpUnhandledExceptionInspection */

namespace App;

use JakubBoucek\DebugEnabler\DebugEnabler;
use Nette\Configurator;
use Nette\InvalidArgumentException;
use Nette\NotSupportedException;


class Bootstrap
{
    /**
     * @return Configurator
     * @throws InvalidArgumentException
     * @throws NotSupportedException
     */
    public static function boot(): Configurator
    {
        $configurator = new Configurator;

        $configurator->setDebugMode(DebugEnabler::isDebugByEnv());
        $configurator->enableTracy(__DIR__ . '/../log', 'pan@jakubboucek.cz');

        $configurator->setTimeZone('Europe/Prague');
        $configurator->setTempDirectory(__DIR__ . '/../temp');

        $configurator->createRobotLoader()
            ->addDirectory(__DIR__)
            ->register();

        $configurator->addConfig(__DIR__ . '/Config/config.neon');
        $configurator->addConfig(__DIR__ . '/../local/config.local.neon');


        return $configurator;
    }
}
