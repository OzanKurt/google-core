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
     *      Example:
     *          storage/MyProject-2a4d6aaa4413.p12
     * 
     */
    'jsonFilePath' => 'MyProject-2a4d6aaa4413.p12',

    /*
     * Here you should pass an array of needed scopes depending on what service you will be using.
     *
     *      Example:
     *          For analytics service:
     *          
     *              'scopes' => [
     *                  'https://www.googleapis.com/auth/analytics.readonly',
     *              ],
     */
    'scopes' => [
        //
    ],

];
