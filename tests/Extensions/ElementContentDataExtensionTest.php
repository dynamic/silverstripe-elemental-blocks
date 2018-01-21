<?php

namespace Dynamic\Elements\Tests;

use DNADesign\Elemental\Models\ElementContent;
use Dynamic\Elements\ORM\ElementContentDataExtension;
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
        $ext = new ElementContentDataExtension();
        $fields = $object->getCMSFields();
        $fields = $ext->updateCMSFields($fields);
        $this->assertInstanceOf(FieldList::class, $fields);
    }
}
