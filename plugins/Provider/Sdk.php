<?php 
namespace PhroznPlugin\Provider;

class Sdk
extends \Phrozn\Provider\Base
implements \Phrozn\Provider
{
    private $_map = array(
        'php' => array(
            'issues' => array()
        ),
        'wordpress' => array(
            'issues' => array()
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