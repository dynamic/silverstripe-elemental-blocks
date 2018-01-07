<?php

namespace Dynamic\Elements\Tests;

use DNADesign\Elemental\Models\ElementContent;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

class ElementContentDataExtensionTest extends SapphireTest
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
        $object = $this->objFromFixture(ElementContent::class, 'default');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
    }
}
