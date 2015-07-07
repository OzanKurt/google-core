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

	function __construct() {

		$this->setPropertiesFromConfigFile();

		$this->setupGoogleAssertionCredentials();

		$this->setupClient();

	}

	public function getClient()
	{
		return $this->client;
	}

	private function setPropertiesFromConfigFile()
	{
		$this->applicationName = config('google.applicationName');

		$this->p12FilePath = config('google.p12FilePath');

		$this->serviceClientId = config('google.serviceClientId');

		$this->serviceAccountName = config('google.serviceAccountName');

		$this->scopes = config('google.scopes');
	}

	private function setupGoogleAssertionCredentials()
	{
		$this->googleAssertionCredentials = new \Google_Auth_AssertionCredentials(
		    $this->serviceAccountName,
		    $this->scopes,
		    file_get_contents(
		    	storage_path($this->p12FilePath)
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