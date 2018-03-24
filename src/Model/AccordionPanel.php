<?php

namespace Dynamic\Elements\Model;

use Dynamic\Elements\Elements\ElementAccordion;
use SilverStripe\Forms\FieldList;

class AccordionPanel extends BaseElementObject
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

    /**
     * @var array
     */
    private static $db = array(
        'Sort' => 'Int',
    );
    /**
     * @var array
     */
    private static $has_one = array(
        'Accordion' => ElementAccordion::class,
    );

    /**
     * @var string
     */
    private static $default_sort = 'Sort';

    /**
     * @var string
     */
    private static $table_name = 'AccordionPanel';

    /**
     * @return FieldList
     *
     * @throws \Exception
     */
    public function getCMSFields()
    {
        $this->beforeUpdateCMSFields(function ($fields) {
            $fields->removeByName(array(
                'Sort',
                'AccordionID',
            ));

            $fields->dataFieldByName('Image')
                ->setFolderName('Uploads/Elements/Accordions');
        });

        return parent::getCMSFields();
    }

    /**
     * @return null
     */
    public function getPage()
    {
        $page = null;

        if ($this->AccordionID) {
            if($this->Accordion()->hasMethod('getPage')) {
                $page = $this->Accordion()->getPage();
            }
        }

        return $page;
    }
}
