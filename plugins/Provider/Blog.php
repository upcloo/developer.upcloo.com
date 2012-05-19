<?php 
namespace PhroznPlugin\Provider;

class Blog 
    extends \Phrozn\Provider\Base
    implements \Phrozn\Provider
{
    public function get()
    {
        $config = $this->getConfig();

        $results = array();
        
        $xml = simplexml_load_file("http://walterdalmut.com/feed");
        $paths = $xml->xpath("/rss/channel/item");
        
        foreach ($paths as $path) {
            $date = strtotime((string)$path->pubDate);
            
            $data = array(
                'title' => (string)$path->title,
                'link' => (string)$path->link,
                'pubDate' => date("Y-m-d H:i:s", $date),
                'summary' => (string)$path->description 
            );
            $results[] = $data;
        }
        
        return $results;
    }
}