<?php

namespace Dynamic\Elements\Elements;

use DNADesign\Elemental\Models\BaseElement;
use Dynamic\Elements\Model\AccordionPanel;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldAddExistingAutocompleter;
use SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;
use SilverStripe\Forms\GridField\GridFieldDeleteAction;
use SilverStripe\ORM\FieldType\DBField;
use SilverStripe\ORM\FieldType\DBHTMLText;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

class ElementAccordion extends BaseElement
{
    /**
     * @var string
     */
    private static $singular_name = "Accordion";

    /**
     * @var string
     */
    private static $plural_name = "Accordions";

    /**
     * @var string
     */
    private static $table_name = 'ElementAccordion';

    /**
     * @var string
     */
    private static $description = "A collapsing list of content";

    /**
     * @var array
     */
    private static $db = [
        'Content' => 'HTMLText',
    ];

    /**
     * @return DBHTMLText
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
        return _t(__CLASS__ . '.BlockType', 'Accordion');
    }

    /**
     * @var array
     */
    private static $has_many = array(
        'Panels' => AccordionPanel::class,
    );

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName(array(
            'Sort',
            'Panels',
        ));

        $config = GridFieldConfig_RecordEditor::create();
        $config->addComponent(new GridFieldOrderableRows('Sort'));
        $config->removeComponentsByType(GridFieldAddExistingAutocompleter::class);
        $config->removeComponentsByType(GridFieldDeleteAction::class);
        $config->addComponent(new GridFieldDeleteAction(false));

        if ($this->ID) {
            $fields->addFieldsToTab('Root.Panels', array(
                GridField::create('Panels', 'Accordion Panels', $this->Panels()->sort('Sort'), $config),
            ));
        }

        return $fields;
    }
}
