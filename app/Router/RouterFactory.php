<?php

namespace App;

use Nette;
use Nette\Application\Routers\Route;
use Nette\Application\Routers\RouteList;
use Nette\Routing\Router;


final class RouterFactory
{
	use Nette\StaticClass;


    /**
     * @return Router
     * @throws Nette\InvalidArgumentException
     */
	public static function createRouter(): Router
    {
		$router = new RouteList;
        $router[] = new Route('2014[/<path .+>]', 'Archive:2014');
        $router[] = new Route('2015[/<path .+>]', 'Archive:2015');
        $router[] = new Route('2016[/<path .+>]', 'Archive:2016');
        $router[] = new Route('2017[/<path .+>]', 'Archive:2017');
        $router[] = new Route('2018[/<path .+>]', 'Archive:2018');

        $router[] = new Route('2019', 'Homepage:default', Route::ONE_WAY);
        $router[] = new Route('[2019/]kontakt', 'Homepage:contact');
        $router[] = new Route('[!2019/]partneri', 'Homepage:partners');
        $router[] = new Route('[!2019/]prednasky', 'Conference:talks');
        $router[] = new Route('[!2019/]prednasky/<guid>', 'Conference:talksDetail');
        $router[] = new Route('[!2019/]program', 'Program:list');
        $router[] = new Route('[!2019/]hlasovani', 'Conference:vote');
        $router[] = new Route('[2019/]plzenakovo-slovnicek-pojmu', 'Homepage:vocabulary');
        $router[] = new Route('[!2019/]attend', 'Attend:default');

        $router[] = new Route('<presenter>/<action>[/<id>]', 'Homepage:default');
		return $router;
	}
}
