<?php

namespace Dynamic\Elements\Elements;

use DNADesign\Elemental\Models\BaseElement;

/**
 * Class ElementChildPages
 * @package Dynamic\Elements\Elements
 */
class ElementChildPages extends BaseElement
{
    /**
     * @var string
     */
    private static $icon = 'vendor/dnadesign/silverstripe-elemental/images/base.svg';

    /**
     * @var string
     */
    private static $singular_name = 'Child Pages Element';

    /**
     * @var string
     */
    private static $plural_name = 'Child Pages Elements';

    /**
     * @var string
     */
    private static $table_name = 'ElementChildPages';
    
    /**
     * @return string
     */
    public function getType()
    {
        return _t(__CLASS__ . '.BlockType', 'Child Pages');
    }
}
