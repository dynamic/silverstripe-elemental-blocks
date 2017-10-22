<?php

namespace Dynamic\Elements\Tests;

use Dynamic\Elements\Elements\ElementFeatures;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

class ElementFeaturesTest extends SapphireTest
{
    /**
     * @var string
     */
    protected static $fixture_file = 'fixtures.yml';

    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = $this->objFromFixture(ElementFeatures::class, 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
    }
}
