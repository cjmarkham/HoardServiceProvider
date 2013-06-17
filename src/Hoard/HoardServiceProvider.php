<?php

namespace Hoard;

use Silex\Application;
use Silex\ServiceProviderInterface;

class HoardServiceProvider implements ServiceProviderInterface
{
	public function register(Application $app)
	{
		$app['hoard'] = $app->share(function() use ($app) {
			$hoardService = new HoardService();

			if (isset($app['hoard.server']))
			{
				$hoardService->server = $app['hoard.server'];
			}

			if (isset($app['hoard.apikey']))
			{
				$hoardService->apikey = $app['hoard.apikey'];
			}

			$hoardService->initialize(isset($app['hoard.bucket']) ? $app['hoard.bucket'] : null);

			return $hoardService;
		});
	}

	public function boot(Application $app) {}
}