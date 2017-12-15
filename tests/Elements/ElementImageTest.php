<?php

namespace Dynamic\Elements\Tests;

use Dynamic\Elements\Elements\ElementImage;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

/**
 * Class ElementImageTest.
 */
class ElementImageTest extends SapphireTest
{
    /**
     * Tests getCMSFields().
     */
    public function testGetCMSFields()
    {
        $object = Injector::inst()->create(ElementImage::class);
        $this->assertInstanceOf(FieldList::class, $object->getCMSFields());
    }

    /**
     * Tests getType().
     */
    public function testGetType()
    {
        $object = Injector::inst()->create(ElementImage::class);
        $this->assertEquals($object->getType(), 'Image');
    }
}
