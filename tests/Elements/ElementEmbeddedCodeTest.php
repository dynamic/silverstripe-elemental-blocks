<?php

namespace Dynamic\Elements\Tests;

use Dynamic\Elements\Elements\ElementEmbeddedCode;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

/**
 * Class ElementEmbeddedCodeTest.
 */
class ElementEmbeddedCodeTest extends SapphireTest
{
    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = Injector::inst()->create(ElementEmbeddedCode::class);
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
    }

    /**
     *
     */
    public function testGetType()
    {
        $object = Injector::inst()->create(ElementEmbeddedCode::class);
        $this->assertEquals($object->getType(), 'Embedded Code');
    }
}
