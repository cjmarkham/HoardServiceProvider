HoardCacheServiceProvider
=======================

A Silex service provider for hoard

Registering
-----------

In composer.json add this to your dependencies

	"cjmarkham/hoard": "dev-master"

Then to register

	$app->register(new Hoard\HoardCacheServiceProvider());

Options
-------

* ```cache_dir``` - The path to the output directory

Usage
-----

	$app->register(new Hoard\HoardCacheServiceProvider(), array(
	    'diskcache.cache_dir' => dirname(dirname(__FILE__)) . '/cache'
	));

	$app['diskcache']->set('foo', 'bar');
	$app['diskcache']->get('foo');
	$app['diskcache']->delete('foo');

Groups
------

Groups can be defined using a period (.).

	$app['diskcache']->set('groupname.foo');
	$app['diskcache']->delete_group('groupname');