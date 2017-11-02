<?php

namespace Dynamic\Elements\Elements;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Assets\Image;

/**
 * Class ElementImage
 * @package Dynamic\Elements\Elements
 */
class ElementImage extends BaseElement
{

    /**
     * @var string
     */
    private static $icon = 'vendor/dnadesign/silverstripe-elemental/images/base.svg';

    /**
     * @return string
     */
    private static $singular_name = 'Image Element';

    /**
     * @return string
     */
    private static $plural_name = 'Image Elements';

    /**
     * @var string
     */
    private static $table_name = 'ElementImage';

    /**
     * @var array
     */
    private static $has_one = array(
      'Image' => Image::class
    );

    /**
     * @return \SilverStripe\Forms\FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->fieldByName('Root.Main.Image')->setFolderName('Uploads/ElementImage');

        return $fields;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return _t(__CLASS__ . '.BlockType', 'Image');
    }
}
