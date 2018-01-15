<?php

namespace Dynamic\Elements\Elements;

use DNADesign\Elemental\Models\BaseElement;
use SilverStripe\ORM\FieldType\DBField;
use SilverStripe\ORM\FieldType\DBHTMLText;

/**
 * Class ElementSectionNavigation.
 */
class ElementSectionNavigation extends BaseElement
{
    /**
     * @var string
     */
    private static $icon = 'sectionnav-icon';

    /**
     * @var string
     */
    private static $singular_name = 'Section Navigation Element';

    /**
     * @var string
     */
    private static $plural_name = 'Section Navigation Elements';

    /**
     * @var string
     */
    private static $table_name = 'ElementSectionNavigation';

    /**
     * @return bool|\SilverStripe\ORM\SS_List
     */
    public function getSectionNavigation()
    {
        if ($page = $this->getPage()) {
            if ($page->Children()->Count() > 0) {
                return $page->Children();
            } elseif ($page->Parent()) {
                return $page->Parent()->Children();
            } else {
                return false;
            }
        }

        return false;
    }

    /**
     * @return DBHTMLText
     */
    public function ElementSummary()
    {
        return DBField::create_field('HTMLText', '<p>Section Navigation</p>')->Summary(20);
    }

    /**
     * @return string
     */
    public function getType()
    {
        return _t(__CLASS__.'.BlockType', 'Section Navigation');
    }
}
