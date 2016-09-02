<?php

class AccordionElement extends DynamicBaseElement
{
    /**
     * @var string
     */
    private static $title = "Accordion";

    /**
     * @var string
     */
    private static $cmsTitle = 'Accordion';

    /**
     * @var string
     */
    private static $description = "A collapsing list of content";

    /**
     * @var array
     */
    private static $db = array(
        'SortOrder' => 'Int',
    );

    /**
     * @var array
     */
    private static $has_many = array(
        'Panels' => 'AccordionPanel',
    );

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName(array(
            'SortOrder',
            'Panels',
        ));

        $config = GridFieldConfig_RecordEditor::create();
        $config->addComponent(new GridFieldSortableRows('SortOrder'));
        $config->removeComponentsByType('GridFieldAddExistingAutocompleter');
        $config->removeComponentsByType('GridFieldDeleteAction');
        $config->addComponent(new GridFieldDeleteAction(false));

        if ($this->ID) {
            $fields->addFieldsToTab('Root.Panels', array(
                GridField::create('Panels', 'Accordion Panels', $this->Panels()->sort('SortOrder'), $config),
            ));
        }

        return $fields;
    }
}
