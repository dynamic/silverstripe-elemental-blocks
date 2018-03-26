<?php

namespace Dynamic\Elements\Extensions;

use SilverStripe\Core\Extension;
use SilverStripe\View\Requirements;

/**
 * Class LeftAndMainExtension.
 */
class LeftAndMainExtension extends Extension
{
    public function init()
    {
        Requirements::css('dynamic/silverstripe-elemental-blocks: icons/icons.css');
    }
}
