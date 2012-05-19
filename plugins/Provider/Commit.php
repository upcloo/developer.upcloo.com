<?php 
namespace PhroznPlugin\Provider;

class Commit
extends \Phrozn\Provider\Base
implements \Phrozn\Provider
{
    public function get()
    {
        $config = $this->getConfig();
    
        $list =  @json_decode(file_get_contents($config["api"]));
        if (is_array($list)) {
            $chunk = array_chunk($list, 5);
            return $chunk[0];
        } else {
            return array();
        }
        
    }
}