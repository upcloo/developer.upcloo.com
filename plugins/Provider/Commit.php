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
            $chunk = $chunk[0];
            for ($i=0; $i<count($chunk); $i++) {
                if (is_object($chunk[$i]) &&property_exists($chunk[$i], "commit")) {                
                    $chunk[$i]->commit->tree->html_url = new \stdClass();
                    $chunk[$i]->commit->tree->html_url =  
                        $config["repo"] . "/commit/" . basename($chunk[$i]->commit->url); 
                }
            }
            
            return $chunk;
        } else {
            return array();
        }
        
    }
}