<?php

namespace Dynamic\Elements\Elements;

use DNADesign\Elemental\Models\BaseElement;
use Sheadawson\Linkable\Forms\EmbeddedObjectField;
use Sheadawson\Linkable\Models\EmbeddedObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\FieldType\DBField;

class ElementOembed extends BaseElement
{
    /**
     * @var string
     */
    private static $icon = 'embed-icon';

    /**
     * @return string
     */
    private static $singular_name = 'oEmbed Element';

    /**
     * @return string
     */
    private static $plural_name = 'oEmbed Elements';

    /**
     * @var string
     */
    private static $table_name = 'ElementOembed';

    /**
     * @var array
     */
    private static $has_one = [
        'EmbeddedObject' => EmbeddedObject::class,
    ];

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->replaceField(
            'EmbeddedObjectID',
            EmbeddedObjectField::create('EmbeddedObject', 'Content from oEmbed URL', $this->EmbeddedObject())
        );

        return $fields;
    }

    /**
     * @return DBHTMLText
     */
    public function ElementSummary()
    {
        if ($this->EmbeddedObject()->ID) {
            return DBField::create_field('HTMLText', $this->EmbeddedObject->Description)->Summary(20);
        }

        return DBField::create_field('HTMLText', '<p>External Content</p>')->Summary(20);
    }

    /**
     * @return string
     */
    public function getType()
    {
        return _t(__CLASS__.'.BlockType', 'oEmbed');
    }
}
