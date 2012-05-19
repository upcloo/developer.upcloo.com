<?php 
namespace PhroznPlugin\Provider;

class FieldSpecification 
    extends \Phrozn\Provider\Base
    implements \Phrozn\Provider
{
    private $_map = array(
        'id' => array(
            'name' => 'Identification String',
            'syntax' => 'id',
            'usage' => 'mandatory',
            'description' => 'This is the main seed used for all
                C.R.U.D. (Create, Retrive, Update, Delete) operations.',
            'type' => 'general string',
            'notes' => 'You can set any string without any limit if not the minimun length is one character.',
            'multiplicity' => 'one time'
        ),
        'title' => array(
            'name' => 'Title',
            'syntax' => 'title',
            'usage' => 'optional',
            'description' => 'This field represent your content title, 
                this field is tipically used for computing correlation.',
            'type' => 'general string',
            'notes' => 'You can set any string without any limit if not the minimun length is one character.',
            'multiplicity' => 'one time'
        ),
        'publish_date' => array(
            'name' => 'Publish Date',
            'syntax' => 'publish_date',
            'usage' => 'optional',
            'description' => 'This field represent your content publication date,
                this field is very useful for every time based operation, eg. search with
                date relevancy.',
            'type' => 'Date (ISO8601)',
            'notes' => 'You have to set a valid ISO8601 date string.',
            'multiplicity' => 'one time'
        ),
        'summary' => array(
            'name' => 'Summary',
            'syntax' => 'summary',
            'usage' => 'optional',
            'description' => 'This field is a summarization of your
                article/post content.',
            'type' => 'text',
            'notes' => 'This field is automatically threated as a text.',
            'multiplicity' => 'one time'
        ),
        'content' => array(
            'name' => 'Content Body',
            'syntax' => 'content',
            'usage' => 'optional',
            'description' => 'This field is your content body.',
            'type' => 'text',
            'notes' => 'This field is automatically threated as a text.',
            'multiplicity' => 'one time'
        )
    );
    
    public function get()
    {
        $config = $this->getConfig();

        $fieldSpec = $this->_map[$config["fieldName"]];

        return $fieldSpec;
    }
}