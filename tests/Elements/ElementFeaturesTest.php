<?php

namespace Dynamic\Elements\Tests;

use Dynamic\Elements\Elements\ElementFeatures;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataList;

class ElementFeaturesTest extends SapphireTest
{
    /**
     * @var string
     */
    protected static $fixture_file = '../fixtures.yml';

    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = $this->objFromFixture(ElementFeatures::class, 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
    }

    public function testGetFeaturesList()
    {
        $object = $this->objFromFixture(ElementFeatures::class, 'one');
        $this->assertInstanceOf(DataList::class, $object->getFeaturesList());
        $this->assertEquals($object->getFeaturesList(), $object->Features()->sort('SortOrder'));
    }
}
