<?php

namespace Hoard;

class HoardService
{
	public $apikey;
	public $server;
	public $bucket;

	private $instance;
	
	public function initialize($bucket = null)
	{
		if (!$this->apikey) 
		{
			throw new \Exception('Hoard requires an active API Key.');
		}

		if (!$this->server)
		{
			throw new \Exception('No server supplied for Hoard.');
		}

		$this->instance = new \Hoard\Client(array(
			'server' => $this->server,
			'apikey' => $this->apikey
		));

		if ($bucket)
		{
			$this->bucket = $this->instance->getBucket($bucket);
		}
	}

	public function getBucket($bucket)
	{
		return $this->instance->getBucket($bucket);
	}

	public function track($type, array $params)
	{
		return $this->bucket->track($type, $params);
	}
}