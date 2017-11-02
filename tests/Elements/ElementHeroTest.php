<?php

namespace Dynamic\Elements\Tests;

use Dynamic\Elements\Elements\ElementHero;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

/**
 * Class ElementHeroTest
 * @package Dynamic\Elements\Tests
 */
class ElementHeroTest extends SapphireTest
{
    /**
     * Tests getCMSFields()
     */
    public function testGetCMSFields()
    {
        $object = Injector::inst()->create(ElementHero::class);
        $this->assertInstanceOf(FieldList::class, $object->getCMSFields());
    }

    /**
     * Tests getType()
     */
    public function testGetType()
    {
        $object = Injector::inst()->create(ElementHero::class);
        $this->assertEquals($object->getType(), 'Hero');
    }
}
