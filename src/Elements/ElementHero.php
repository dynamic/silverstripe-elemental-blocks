<?php

namespace Dynamic\Elements\Elements;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\Assets\Image;

/**
 * Class ElementHero
 * @package Dynamic\Elements\Elements
 */
class ElementHero extends BaseElement
{

    /**
     * @var string
     */
    private static $icon = 'vendor/dnadesign/silverstripe-elemental/images/base.svg';

    /**
     * @return string
     */
    private static $singular_name = 'Hero Element';

    /**
     * @return string
     */
    private static $plural_name = 'Hero Elements';

    /**
     * @var string
     */
    private static $table_name = 'ElementHero';

    /**
     * @var array
     */
    private static $db = array(
      'Headline' => 'Varchar(255)'
    );

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

        $fields->fieldByName('Root.Main.Image')->setFolderName('Uploads/ElementHero');

        return $fields;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return _t(__CLASS__ . '.BlockType', 'Hero');
    }
}
