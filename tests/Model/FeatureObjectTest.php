<?php

namespace Dynamic\Elements\Tests;

use Dynamic\Elements\Model\FeatureObject;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

/**
 * Class FeatureObjectTest.
 */
class FeatureObjectTest extends SapphireTest
{
    /**
     * Tests getCMSFields().
     */
    public function testGetCMSFields()
    {
        $feature = Injector::inst()->create(FeatureObject::class);
        $this->assertInstanceOf(FieldList::class, $feature->getCMSFields());
    }
}
