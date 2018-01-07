<?php

namespace Dynamic\Elements\Elements;

use DNADesign\Elemental\Models\BaseElement;
use Sheadawson\Linkable\Forms\LinkField;
use Sheadawson\Linkable\Models\Link;
use SilverStripe\Forms\FieldList;

class ElementCallToAction extends BaseElement
{
    /**
     * @var string
     */
    private static $singular_name = 'Call To Action Element';

    /**
     * @var string
     */
    private static $plural_name = 'Call To Action Elements';

    /**
     * @var string
     */
    private static $table_name = 'ElementCallToAction';

    /**
     * @var array
     */
    private static $has_one = [
        'ElementLink' => Link::class,
    ];

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $this->beforeUpdateCMSFields(function ($fields) {
            $fields->addFieldToTab(
                'Root.Main',
                LinkField::create('ElementLinkID', 'Link')
            );
        });

        $fields = parent::getCMSFields();

        return $fields;
    }

    /**
     *
     */
    public function ElementSummary()
    {
        return '';
    }

    /**
     * @return string
     */
    public function getType()
    {
        return _t(__CLASS__.'.BlockType', 'Call To Action');
    }
}
