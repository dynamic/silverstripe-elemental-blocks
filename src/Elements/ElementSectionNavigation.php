<?php

namespace Dynamic\Elements\Elements;

use DNADesign\Elemental\Models\BaseElement;

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
}
