<?php

namespace Dynamic\Elements\Tests;

use Dynamic\Elements\Elements\ElementOembed;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\FieldType\DBField;

class ElementOembedTest extends SapphireTest
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
        $object = $this->objFromFixture(ElementOembed::class, 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
        $this->assertNotNull($fields->dataFieldByName('EmbeddedObject'));
    }

    /**
     *
     */
    public function testGetElementSummary()
    {
        $object = $this->objFromFixture(ElementOembed::class, 'one');
        $expected = DBField::create_field('HTMLText', '<p>External Content</p>')->Summary(20);
        $this->assertEquals($object->ElementSummary(), $expected);
    }

    /**
     *
     */
    public function testGetType()
    {
        $object = $this->objFromFixture(ElementOembed::class, 'one');
        $this->assertEquals($object->getType(), 'oEmbed');
    }
}
