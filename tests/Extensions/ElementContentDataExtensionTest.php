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
     * @var array
     */
    protected static $required_extensions = [
        ElementContent::class => [
            ElementContentDataExtension::class,
        ],
    ];

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
