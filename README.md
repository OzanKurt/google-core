# Google Core

A package to keep all the required google setup together and ready.

## Installation

### Step 1
Add `ozankurt/google-core` to your composer requirements.

```php
composer require ozankurt/google-core
```

## Getting ready to use

### Step 1

Create a google developer account which as actually logging in to any of your google accounts.

From [https://developers.google.com/console/](https://developers.google.com/console/).

### Step 2

Create a new project.

> PS: Skip this step if you already have one.

![New Project](http://i.imgur.com/iedTiGQ.png)

### Step 3

Create a new Client ID, type should be `Service Account`

> PS: Skip this step if you already have one.

![Create a new Client ID](http://i.imgur.com/0Qme3d7.png)
![Service Account](http://i.imgur.com/YVb4EdC.png)

### Step 4

Generate new P12 key and download it.

> PS: Skip this step if you already have one.

### Step 5

Copy the P12 file somewhere be used in php.

## Configuration (Pure PHP)

#### Example Configuration File

```php
<?php

require 'vendor/autoload.php';

use Kurt\Google\Core;
use Kurt\Google\Analytics;

$googleCore = new Core([
	'applicationName' 		=> 'MyProject',
	'p12FilePath' 			=> 'MyProject-1b6e6bbb8826.p12',
	'serviceClientId' 		=> '122654635465-u7io2injkjniweklew48knh7158.apps.googleusercontent.com',
	'serviceAccountName' 	=> '122654635465-u7io2injkjniweklew48knh7158@developer.gserviceaccount.com',
	'scopes' => [
		//
	],
]);
```

## Configuration (Laravel)

#### Step 1

Add the service provider to you `config/app.php`.

```php
'providers' => [
    Kurt\Google\CoreServiceProvider::class,
],
```

#### Step 2

Run `vendor:publish` command from your terminal.

```
php artisan vendor:publish
```

#### Step 3

Edit the fields in the configuration file.

```php
<?php

return [

	/**
	 * Application Name
	 *
	 * Name of your project in `https://console.developers.google.com/`.
	 */
	'applicationName' => 'MyProject',

	/**
	 * P12 File
	 *
	 * After creating a project, go to `APIs & auth` and choose `Credentials` section.
	 * 
	 * Click `Create new Client ID` and select `Service Account` choose `P12` as the `Key Type`.
	 *
	 * After downloading the `p12` file copy and paste it in the `storage` directory.
	 * 		Example:
	 * 			storage/MyProject-2a4d6aaa4413.p12
	 * 
	 */
	'p12FilePath' => 'MyProject-2a4d6aaa4413.p12',

	/**
	 * You will find this information under `Service Account` > `Client ID`
	 *
	 * 		Example:
	 * 			122654635465-u7io2injkjniweklew48knh7158.apps.googleusercontent.com
	 */
	'serviceClientId' => '',
	
	/**
	 * You will find this information under `Service Account` > `Email Address`
	 *
	 * 		Example:
	 * 			122654635465-u7io2injkjniweklew48knh7158@developer.gserviceaccount.com
	 */
	'serviceAccountName' => '',
	
	/**
	 * Here you should pass an array of needed scopes depending on what service you will be using.
	 *
	 * 		Example:
	 * 			For analytics service:
	 * 			
	 * 				'scopes' => [
	 *					'https://www.googleapis.com/auth/analytics.readonly',
	 *				],
	 */
	'scopes' => [
		//
	],

];
```

## License

This package inherits the licensing of its parent framework, Laravel, and as such is open-sourced 
software licensed under the [MIT license](http://opensource.org/licenses/MIT)
