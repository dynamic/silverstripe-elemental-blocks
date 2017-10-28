<?php

namespace Dynamic\Elements\Elements;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\ORM\FieldType\DBField;

class ElementSlideshow extends BaseElement
{
    /**
     * @var string
     */
    private static $icon = 'vendor/dnadesign/silverstripe-elemental/images/base.svg';

    /**
     * @var string
     */
    private static $singular_name = 'Slideshow Element';

    /**
     * @var string
     */
    private static $plural_name = 'Slideshow Elements';

    /**
     * @var string
     */
    private static $table_name = 'ElementSlideshow';

    /**
     * @var array
     */
    private static $db = [
        'Content' => 'HTMLText',
    ];

    /**
     * @return HTMLText
     */
    public function ElementSummary()
    {
        return DBField::create_field('HTMLText', $this->Content)->Summary(20);
    }

    /**
     * @return string
     */
    public function getType()
    {
        return _t(__CLASS__ . '.BlockType', 'Slideshow');
    }
}
