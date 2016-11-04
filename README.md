# Google Core

[![Latest Stable Version](https://poser.pugx.org/ozankurt/google-core/v/stable)](https://packagist.org/packages/ozankurt/google-core) [![Total Downloads](https://poser.pugx.org/ozankurt/google-core/downloads)](https://packagist.org/packages/ozankurt/google-core) [![Latest Unstable Version](https://poser.pugx.org/ozankurt/google-core/v/unstable)](https://packagist.org/packages/ozankurt/google-core) [![License](https://poser.pugx.org/ozankurt/google-core/license)](https://packagist.org/packages/ozankurt/google-core)

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

### Step 3

Create a new `Service Account` and download the json auth file.

> PS: Skip this step if you already have one.

![Create Credentials - 1](http://i.imgur.com/cq5faRV.png)
![Create Credentials - 2](http://i.imgur.com/3SKns9X.png)

### Step 5

Copy the json auth file somewhere be used in php.

## Configuration (Pure PHP)

#### Example Configuration File

```php
<?php

require 'vendor/autoload.php';

use Kurt\Google\Core;

$googleCore = new Core([
    'applicationName'       => 'Google API Wrapper Demo',
    'jsonFilePath'          => 'Google API Wrapper Demo-174e172143a9.json',
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

    /*
     * Application Name
     *
     * Name of your project in `https://console.developers.google.com/`.
     */
    'applicationName' => 'MyProject',

    /*
     * Json Auth File Path
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
    'jsonFilePath' => 'MyProject-2a4d6aaa4413.p12',

    /*
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

This open-sourced is software licensed under the [MIT license](http://opensource.org/licenses/MIT).
