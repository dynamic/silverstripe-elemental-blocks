<?php

namespace Dynamic\Elements\Elements;

use DNADesign\Elemental\Models\BaseElement;
use Dynamic\Elements\Model\PromoObject;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\GridField\GridFieldAddExistingAutocompleter;
use SilverStripe\ORM\FieldType\DBField;
use SilverStripe\ORM\FieldType\DBHTMLText;
use Symbiote\GridFieldExtensions\GridFieldAddExistingSearchButton;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

/**
 * Class PromosElement.
 */
class ElementPromos extends BaseElement
{
    /**
     * @var string
     */
    private static $icon = 'font-icon-block-banner';

    /**
     * @return string
     */
    private static $singular_name = 'Promos Element';

    /**
     * @return string
     */
    private static $plural_name = 'Promos Elements';

    /**
     * @var string
     */
    private static $table_name = 'ElementPromos';

    /**
     * @var array
     */
    private static $styles = array();

    /**
     * @var array
     */
    private static $db = [
        'Content' => DBHTMLText::class,
    ];

    /**
     * @var array
     */
    private static $many_many = array(
        'Promos' => PromoObject::class,
    );

    /**
     * @var array
     */
    private static $many_many_extraFields = array(
        'Promos' => array(
            'SortOrder' => 'Int',
        ),
    );

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {
            $fields->dataFieldByName('Content')
                ->setRows(8)
            ;

            if ($this->ID) {
                $promoField = $fields->dataFieldByName('Promos');
                $config = $promoField->getConfig();
                $config->addComponent(new GridFieldOrderableRows('SortOrder'));
                $config->removeComponentsByType(GridFieldAddExistingAutocompleter::class);
                $config->addComponent(new GridFieldAddExistingSearchButton());
                $config->removeComponentsByType(GridFieldDeleteAction::class);
                $fields->addFieldsToTab('Root.Promos', array(
                    $promoField,
                ));
            }
        });

        return parent::getCMSFields();
    }

    /**
     * @return mixed
     */
    public function getPromoList()
    {
        return $this->Promos()->sort('SortOrder');
    }

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
        return _t(__CLASS__.'.BlockType', 'Promos');
    }
}
