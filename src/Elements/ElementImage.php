<?php

namespace Dynamic\Elements\Elements;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Assets\Image;

/**
 * Class ElementImage.
 */
class ElementImage extends BaseElement
{
    /**
     * @var string
     */
    private static $icon = 'font-icon-block-file';

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
      'Image' => Image::class,
    );

    /**
     * @var array
     */
    private static $owns = array(
        'Image',
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
        return _t(__CLASS__.'.BlockType', 'Image');
    }
}
