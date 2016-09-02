<?php

class AccordionPanel extends DataObject
{
    /**
     * @var string
     */
    private static $singular_name = 'Accordion Panel';

    /**
     * @var string
     */
    private static $plural_name = 'Accordion Panels';

    /**
     * @var string
     */
    private static $description = 'A panel for a Accordion widget';

    private static $db = array(
        'Title' => 'Varchar(255)',
        'Content' => 'HTMLText',
        'SortOrder' => 'Int',
    );
    /**
     * @var array
     */
    private static $has_one = array(
        'Accordion' => 'AccordionElement',
        'Image' => 'Image',
    );

    /**
     * @var string
     */
    private static $default_sort = 'SortOrder';

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName(array(
            'SortOrder',
            'AccordionID',
        ));

        $fields->addFieldToTab(
            'Root.Main',
            ImageUploadField::create('Image')
                ->setFolderName('Uploads/Elements/Accordions'),
            'Content'
        );

        return $fields;
    }

    /**
     * @return ValidationResult
     */
    public function validate()
    {
        $result = parent::validate();

        if (!$this->Name || !$this->Content) {
            $result->error('Both Title and Content are required');
        }

        return $result;
    }

    /**
     * @param null $member
     *
     * @return bool
     */
    public function canCreate($member = null)
    {
        return true;
    }

    /**
     * @param null $member
     *
     * @return bool
     */
    public function canView($member = null)
    {
        return true;
    }

    /**
     * @param null $member
     *
     * @return bool
     */
    public function canEdit($member = null)
    {
        return true;
    }

    /**
     * @param null $member
     *
     * @return bool
     */
    public function canDelete($member = null)
    {
        return true;
    }
}
