<?php

namespace Dynamic\Elements\Elements;

use DNADesign\Elemental\Models\BaseElement;
use Dynamic\Elements\Model\HTML5Video;

class ElementHTML5Video extends BaseElement
{
    /**
     * @var string
     */
    private static $singular_name = 'HTML5 Video Block';

    /**
     * @var string
     */
    private static $plural_name = 'HTML5 Video Blocks';

    /**
     * @var string
     */
    private static $table_name = 'ElementHTML5Video';

    /**
     * @var array
     */
    private static $many_many = [
        'Videos' => HTML5Video::class,
    ];

    /**
     * @return string
     */
    public function getType()
    {
        return _t(__CLASS__.'.BlockType', 'HTML5 Video');
    }


}