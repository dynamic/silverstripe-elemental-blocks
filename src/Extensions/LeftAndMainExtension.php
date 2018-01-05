<?php

namespace Dynamic\Elements\Extensions;

use SilverStripe\Admin\LeftAndMain;
use SilverStripe\Core\Extension;
use SilverStripe\View\Requirements;

/**
 * Class LeftAndMainExtension
 * @package Dynamic\Elements\Extensions
 */
class LeftAndMainExtension extends Extension
{
  public function init()
  {

    Requirements::css('resources/dynamic/dynamic-elements/icons/icons.css');

  }
}
