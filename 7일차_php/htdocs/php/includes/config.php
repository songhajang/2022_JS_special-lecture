<?php

/**
 * Used to store website configuration information.
 *
 * @var string or null
 */
function config($key = '')
{
    $host=$_SERVER["HTTP_HOST"];
    $config = [
        'name' => 'Simple PHP Website',
        'site_url' => "http://$host",
        'pretty_uri' => true,
        'nav_menu' => [
            '' => 'Home',
            'about-us' => 'About Us',
            'products' => 'Products',
            'contact' => 'Contact',
            'conferenceRoom' => 'conferenceRoom',
            'contact' => 'Contact'
        ],
        'template_path' => 'template',
        'content_path' => 'views',
        'api_path' => 'controllers',
        'version' => 'v3.0',
    ];

    return isset($config[$key]) ? $config[$key] : null;
}
?>