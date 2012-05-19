<?php 
namespace PhroznPlugin\Provider;

class Sdk
extends \Phrozn\Provider\Base
implements \Phrozn\Provider
{
    private $_map = array(
        'php' => array(
            'issues' => array(),
            'sourcecode' => 'https://github.com/corley/upcloo-php-sdk',
            'tags' => 'https://github.com/corley/upcloo-php-sdk/tags',
            'download' => 'https://github.com/corley/upcloo-php-sdk/downloads',
            'issuesLink' => 'https://github.com/corley/upcloo-php-sdk/issues' 
        ),
        'wordpress' => array(
            'issues' => array(),
            'sourcecode' => 'https://github.com/corley/upcloo-wordpress-plugin',
            'tags' => 'https://github.com/corley/upcloo-wordpress-plugin/tags',
            'download' => 'https://github.com/corley/upcloo-wordpress-plugin/downloads',
            'issuesLink' => 'https://github.com/corley/upcloo-wordpress-plugin/issues'
        )      
    );
    
    public function get()
    {
        $config = $this->getConfig();
    
        $sdk = $this->_map[$config["platform"]];
        
        $sdk["issues"] = @json_decode(file_get_contents($config["issues"]));
    
        return $sdk;
    }
}