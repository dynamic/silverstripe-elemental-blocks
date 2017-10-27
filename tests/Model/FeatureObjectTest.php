<?php

namespace Dynamic\Elements\Tests;

use Dynamic\Elements\Model\FeatureObject;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

/**
 * Class FeatureObjectTest
 * @package Dynamic\Elements\Tests
 */
class FeatureObjectTest extends SapphireTest
{

    /**
     * Tests getCMSFields()
     */
    public function testGetCMSFields()
    {
        $feature = Injector::inst()->create(FeatureObject::class);
        $this->assertInstanceOf(FieldList::class, $feature->getCMSFields());
    }

    /**
     * Tests validate()
     */
    public function testValidate()
    {
        $feature = Injector::inst()->create(FeatureObject::class);
        $valid = $feature->validate()->isValid();
        $this->assertFalse($valid);

        $feature->Name = 'Name';
        $valid = $feature->validate()->isValid();
        $this->assertTrue($valid);
    }

    /**
     * Tests canCreate()
     */
    public function testCanCreate()
    {
        $feature = Injector::inst()->create(FeatureObject::class);
        $this->assertTrue($feature->canCreate());
    }

    /**
     * Tests canView()
     */
    public function testCanView()
    {
        $feature = Injector::inst()->create(FeatureObject::class);
        $this->assertTrue($feature->canView());
    }

    /**
     * Tests canEdit()
     */
    public function testCanEdit()
    {
        $feature = Injector::inst()->create(FeatureObject::class);
        $this->assertTrue($feature->canEdit());
    }

    /**
     * Tests canDelete()
     */
    public function testCanDelete()
    {
        $feature = Injector::inst()->create(FeatureObject::class);
        $this->assertTrue($feature->canDelete());
    }

}
