<?php

namespace Dynamic\Elements\Elements;

use DNADesign\Elemental\Models\BaseElement;
use Dynamic\Elements\Model\FeatureObject;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\GridField\GridFieldDeleteAction;
use SilverStripe\ORM\FieldType\DBField;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

/**
 * Class PageSectionBlock
 *
 * @method HasManyList $Features
 */
class ElementFeatures extends BaseElement
{
    /**
     * @var string
     */
    private static $icon = 'vendor/dnadesign/silverstripe-elemental/images/base.svg';

    /**
     * @return string
     */
    private static $singular_name = 'Features Element';

    /**
     * @return string
     */
    private static $plural_name = 'Features Elements';

    /**
     * @var string
     */
    private static $table_name = 'ElementFeatures';

    /**
     * @var array
     */
    private static $db = [
        'Content' => 'HTMLText',
    ];

    /**
     * @var array
     */
    private static $has_many = [
        'Features' => FeatureObject::class,
    ];

    /**
     * @return \SilverStripe\Forms\FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        if ($this->ID) {
            // Features
            $config = GridFieldConfig_RecordEditor::create();
            $config->addComponent(new GridFieldOrderableRows('SortOrder'));
            $config->removeComponentsByType('GridFieldAddExistingAutocompleter');
            $config->removeComponentsByType('GridFieldDeleteAction');
            $config->addComponent(new GridFieldDeleteAction(false));
            $sectionsField = GridField::create('Features', 'Features', $this->Features(), $config);
            $fields->addFieldsToTab('Root.Features', array(
                $sectionsField,
            ));
        }

        return $fields;
    }

    /**
     * @return mixed
     */
    public function getFeaturesList()
    {
        return $this->Features()->sort('SortOrder');
    }

    /**
     * @return HTMLText
     */
    public function ElementSummary()
    {
        return DBField::create_field('Content', $this->Content)->Summary(20);
    }

    /**
     * @return string
     */
    public function getType()
    {
        return _t(__CLASS__ . '.BlockType', 'Features');
    }
}
