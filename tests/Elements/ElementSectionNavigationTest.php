<?php

namespace Dynamic\Elements\Tests;

use DNADesign\Elemental\Models\ElementalArea;
use Dynamic\Elements\Elements\ElementSectionNavigation;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Dev\SapphireTest;

/**
 * Class ElementSectionNavigationTest
 * @package Dynamic\Elements\Tests
 */
class ElementSectionNavigationTest extends SapphireTest
{

    /**
     * Tests getSectionNavigation()
     */
    public function testGetSectionNavigation()
    {
        $nav = Injector::inst()->create(ElementSectionNavigation::class);
        $this->assertFalse($nav->getSectionNavigation());

        // TODO - figure out how to mock up element areas
    }
}
