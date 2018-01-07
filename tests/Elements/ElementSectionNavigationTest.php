<?php

namespace Dynamic\Elements\Tests;

use Dynamic\Elements\Elements\ElementSectionNavigation;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\ORM\FieldType\DBField;

/**
 * Class ElementSectionNavigationTest.
 */
class ElementSectionNavigationTest extends SapphireTest
{
    /**
     * Tests getSectionNavigation().
     */
    public function testGetSectionNavigation()
    {
        $nav = Injector::inst()->create(ElementSectionNavigation::class);
        $this->assertFalse($nav->getSectionNavigation());

        // TODO - figure out how to mock up element areas
    }

    /**
     *
     */
    public function testGetElementSummary()
    {
        $object = Injector::inst()->create(ElementSectionNavigation::class);
        $expected = DBField::create_field('HTMLText', '<p>Section Navigation</p>')->Summary(20);
        $this->assertEquals($object->ElementSummary(), $expected);
    }

    /**
     *
     */
    public function testGetType()
    {
        $object = Injector::inst()->create(ElementSectionNavigation::class);
        $this->assertEquals($object->getType(), 'Section Navigation');
    }
}
