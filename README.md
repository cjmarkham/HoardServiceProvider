HoardServiceProvider
=======================

A Silex service provider for hoard

Registering
-----------

In composer.json add this to your dependencies

	"cjmarkham/hoard": "dev-master"

Then to register

	$app->register(new Hoard\HoardServiceProvider());

Options
-------

* ```apikey``` - The hoard user api key
* ```server``` - The server your hoard setup resides on
* ```server``` - The name of the bucket you wish to use 

Usage
-----

	$app->register(new Hoard\HoarderviceProvider(), array(
	    'hoard.apikey' => 'my-api-key',
	    'hoard.server' => 'mongodb://127.0.0.1/hoard',
	    'hoard.bucket' => 'my-bucket-id',
	));

	$app['hoard']->track('test', array(
		'foo' => 'bar'
	));

For more information about Hoard [check the repo][1]
[1]: https://github.com/marcqualie/hoard