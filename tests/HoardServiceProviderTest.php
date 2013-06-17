<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Hoard\HoardServiceProvider;

class HoardServiceProviderTest extends PHPUnit_Framework_TestCase
{
	public function testRegister()
	{
		$app = new Application;

		$app->register(new HoardServiceProvider, array(
			'hoard.apikey' => '1f991e67c1da7a53b6ce8ccd',
			'hoard.server' => 'http://dev.hoard.com',
			'hoard.bucket' => 'the-newest',
		));

		$app->get('/', function() use ($app) {
			$app['hoard'];
		});	

		$request = Request::create('/');
		$app->handle($request);

		$this->assertTrue($app['hoard'] instanceof \Hoard\HoardService);
	}
}

$class = new HoardServiceProviderTest();
$class->testRegister();