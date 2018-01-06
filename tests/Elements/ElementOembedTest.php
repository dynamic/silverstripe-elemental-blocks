<?php

namespace Dynamic\Elements\Tests;

use Dynamic\Elements\Elements\ElementOembed;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

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
}