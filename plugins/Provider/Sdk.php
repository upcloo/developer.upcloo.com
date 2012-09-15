<?php
namespace PhroznPlugin\Provider;

class Sdk
extends \Phrozn\Provider\Base
implements \Phrozn\Provider
{
    private $_map = array(
        'php' => array(
            'issues' => array(),
            'sourcecode' => 'https://github.com/upcloo/upcloo-php-sdk',
            'tags' => 'https://github.com/upcloo/upcloo-php-sdk/tags',
            'download' => 'https://github.com/upcloo/upcloo-php-sdk/downloads',
            'issuesLink' => 'https://github.com/upcloo/upcloo-php-sdk/issues'
        ),
        'java' => array(
            'issues' => array(),
            'sourcecode' => 'https://github.com/upcloo/upcloo-java-sdk',
            'tags' => 'https://github.com/upcloo/upcloo-java-sdk/tags',
            'download' => 'https://github.com/upcloo/upcloo-java-sdk/downloads',
            'issuesLink' => 'https://github.com/upcloo/upcloo-java-sdk/issues'
        ),
        'wordpress' => array(
            'issues' => array(),
            'sourcecode' => 'https://github.com/upcloo/upcloo-wordpress-plugin',
            'tags' => 'https://github.com/upcloo/upcloo-wordpress-plugin/tags',
            'download' => 'https://github.com/upcloo/upcloo-wordpress-plugin/downloads',
            'issuesLink' => 'https://github.com/upcloo/upcloo-wordpress-plugin/issues'
        ),
        'joomla' => array(
            'issues' => array(),
            'sourcecode' => 'https://github.com/upcloo/upcloo-joomla-plugin',
            'tags' => 'https://github.com/upcloo/upcloo-joomla-plugin/tags',
            'download' => 'https://github.com/upcloo/upcloo-joomla-plugin/downloads',
            'issuesLink' => 'https://github.com/upcloo/upcloo-joomla-plugin/issues'
        ),
        'sitewalker' => array(
            'issues' => array(),
            'sourcecode' => 'https://github.com/upcloo/jupcloo-site-walker',
            'tags' => 'https://github.com/upcloo/jupcloo-site-walker/tags',
            'download' => 'https://github.com/upcloo/jupcloo-site-walker/downloads',
            'issuesLink' => 'https://github.com/upcloo/jupcloo-site-walker/issues'
        ),
		'ios' => array(
    		'issues' => array(),
    		'sourcecode' => 'https://github.com/upcloo/upcloo-ios-sdk',
    		'tags' => 'https://github.com/upcloo/upcloo-ios-sdk/tags',
    		'download' => 'https://github.com/upcloo/upcloo-ios-sdk/downloads',
    		'issuesLink' => 'https://github.com/upcloo/upcloo-ios-sdk/issues'
		),
    	'js' => array(
    		'issues' => array(),
    		'sourcecode' => 'https://github.com/upcloo/upcloo-js-sdk',
    		'tags' => 'https://github.com/upcloo/upcloo-js-sdk/tags',
    		'download' => 'https://github.com/upcloo/upcloo-js-sdk/downloads',
    		'issuesLink' => 'https://github.com/upcloo/upcloo-js-sdk/issues'
    	),
    );

    public function get()
    {
        $config = $this->getConfig();

        $sdk = $this->_map[$config["platform"]];

        $sdk["issues"] = @json_decode(file_get_contents($config["issues"]));

        return $sdk;
    }
}
