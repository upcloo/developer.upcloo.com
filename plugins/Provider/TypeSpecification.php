<?php 
namespace PhroznPlugin\Provider;

class TypeSpecification 
    extends \Phrozn\Provider\Base
    implements \Phrozn\Provider
{
    private $_map = array(
        'string' => array(
            'name' => 'String',
            'syntax' => 'string',
            'description' => 'Character vector.',
        ),
        'integer' => array(
            'name' => 'Integer',
            'syntax' => 'string',
            'description' => 'Integer numbers. All positives and negatives numbers
                with zero.',
        ),
        'decimal' => array(
            'name' => 'Decimal (floating point)',
            'syntax' => 'decimal',
            'description' => 'Floating point numbers, use the dot for decimal separation.',
        ),
        'date' => array(
            'name' => 'Dates and Times',
            'syntax' => 'date',
            'description' => 'Dates and times in ISO8601 format.'
        ),
        'text' => array(
            'name' => 'Texts',
            'syntax' => 'text',
            'description' => 'Text string. This field is threated by UpCloo for text analysis.'
        )
    );
    
    public function get()
    {
        $config = $this->getConfig();

        $fieldSpec = $this->_map[$config["fieldName"]];

        return $fieldSpec;
    }
}