<?php

namespace NeEET;

use Nette;
use Nette\Application\Routers\RouteList;
use Nette\Application\Routers\Route;


class RouterFactory
{

	/**
	 * @return Nette\Application\IRouter
	 */
	public function create()
	{
		$router = new RouteList;

		$router[] = $apiRouter = new RouteList('App:Api');

		$apiRouter[] = new Route('api[/<version=v1>]/fik[![.<format>]]', 'Homepage:default');

		$router[] = $frontRouter = new RouteList('App:Front');

		$frontRouter[] = new Route('<presenter>/<action>', 'Homepage:default');

		return $router;
	}

}
