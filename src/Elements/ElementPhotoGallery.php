<?php

namespace Dynamic\Elements\Elements;

use DNADesign\Elemental\Models\BaseElement;
use Dynamic\Elements\Model\GalleryImage;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldAddExistingAutocompleter;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\GridField\GridFieldDeleteAction;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

/**
 * Class ElementPhotoGallery.
 */
class ElementPhotoGallery extends BaseElement
{
    /**
     * @var string
     */
    private static $icon = 'vendor/dnadesign/silverstripe-elemental/images/base.svg';

    /**
     * @return string
     */
    private static $singular_name = 'Photo Gallery Element';

    /**
     * @return string
     */
    private static $plural_name = 'Photo Gallery Elements';

    /**
     * @var string
     */
    private static $table_name = 'ElementPhotoGallery';

    /**
     * @var array
     */
    private static $has_many = array(
        'Images' => GalleryImage::class,
    );

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName([
            'Images',
        ]);
        if ($this->ID) {
            $config = GridFieldConfig_RecordEditor::create();
            $config->addComponent(new GridFieldOrderableRows('SortOrder'));
            $config->removeComponentsByType(GridFieldAddExistingAutocompleter::class);
            $config->removeComponentsByType(GridFieldDeleteAction::class);
            $config->addComponent(new GridFieldDeleteAction(false));
            $imagesField = GridField::create('Images', 'Images', $this->Images()->sort('SortOrder'), $config);
            $fields->addFieldToTab('Root.Photos', $imagesField);
        }

        return $fields;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return _t(__CLASS__.'.BlockType', 'Photo Gallery');
    }
}
