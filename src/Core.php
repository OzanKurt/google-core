<?php

namespace Kurt\Google;

class Core {

	private $applicationName;
	private $p12FilePath;
	private $serviceClientId;
	private $serviceAccountName;
	private $scopes;

	private $client;
	private $googleAssertionCredentials;

	protected $settings;

	function __construct($settings = null) {

		$this->settings = $settings;

		$this->setupConfiguration();

		$this->setupGoogleAssertionCredentials();

		$this->setupClient();

	}

	public function getClient()
	{
		return $this->client;
	}

	public function getSettings($key = null)
	{
		if (is_null($key)) {
			return $this->settings;
		}

		if (array_key_exists($key, $this->settings)) {
			return $this->settings[$key];
		}

		throw new \Exception("Undefined setting [{$key}].", 1);
	}

	private function setupConfiguration()
	{
		if (is_null($this->settings)) 
		{
			$this->setupConfigurationFromConfigFile();
		}

		$this->applicationName = $this->settings['applicationName'];

		$this->p12FilePath = $this->settings['p12FilePath'];

		$this->serviceClientId = $this->settings['serviceClientId'];

		$this->serviceAccountName = $this->settings['serviceAccountName'];

		$this->scopes = $this->settings['scopes'];
	}

	private function setupConfigurationFromConfigFile()
	{
		foreach (config('google') as $key => $value) {
			$this->settings[$key] = $value;
		}
	}

	private function setupGoogleAssertionCredentials()
	{
		$this->googleAssertionCredentials = new \Google_Auth_AssertionCredentials(
		    $this->serviceAccountName,
		    $this->scopes,
		    file_get_contents(
		    	$this->p12FilePath
		    )
		);
	}

	private function setupClient()
	{
		$this->client = new \Google_Client();

		$this->client->setAssertionCredentials($this->googleAssertionCredentials);

		$this->client->setClientId($this->serviceClientId);

		$this->client->setApplicationName($this->applicationName);
	}

}