<?php

namespace Dynamic\PageBuildr\ORM;

use Dynamic\PageBuildr\Elements\SlideshowElement;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;

class SlideshowElementSlideDataExtension extends DataExtension
{
    /**
     * @var array
     */
    private static $has_one = array(
        'SlideshowElement' => SlideshowElement::class,
    );

    /**
     * @param FieldList $fields
     */
    public function updateCMSFields(FieldList $fields)
    {
        $fields->removeByName(array(
            'SlideshowElementID',
        ));
    }
}