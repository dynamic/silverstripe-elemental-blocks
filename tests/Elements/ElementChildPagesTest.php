<?php

namespace Dynamic\Elements\Tests;

use Dynamic\Elements\Elements\ElementChildPages;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

class ElementChildPagesTest extends SapphireTest
{
    /**
     * Tests getCMSFields().
     */
    public function testGetCMSFields()
    {
        $promo = Injector::inst()->create(ElementChildPages::class);
        $this->assertInstanceOf(FieldList::class, $promo->getCMSFields());
    }

    /**
     *
     */
    public function testGetType()
    {
        $object = singleton(ElementChildPages::class);
        $this->assertEquals($object->getType(), 'Child Pages');
    }
}
