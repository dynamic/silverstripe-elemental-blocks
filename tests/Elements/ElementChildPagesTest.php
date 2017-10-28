<?php

namespace Dynamic\Elements\Tests;

use Dynamic\Elements\Elements\ElementChildPages;
use SilverStripe\Dev\SapphireTest;

class ElementChildPagesTest extends SapphireTest
{
    /**
     *
     */
    public function testGetType()
    {
        $object = singleton(ElementChildPages::class);
        $this->assertEquals($object->getType(), 'Child Pages');
    }
}
