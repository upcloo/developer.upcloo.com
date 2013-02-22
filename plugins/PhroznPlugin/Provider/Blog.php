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

        $xml = simplexml_load_file("http://www.upcloo.com/contenuti/rss/0/news.xml");
        $paths = $xml->xpath("/rss/channel/item");

        foreach ($paths as $i =>$path) {
            if ($i > 4) break;
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
