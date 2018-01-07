<?php

namespace Dynamic\Elements\Tests;

use Dynamic\Elements\Elements\ElementCallToAction;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

class ElementCallToActionTest extends SapphireTest
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
        $object = $this->objFromFixture(ElementCallToAction::class, 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
        $this->assertNotNull($fields->dataFieldByName('ElementLinkID'));
    }

    /**
     *
     */
    public function testGetElementSummary()
    {
        $object = $this->objFromFixture(ElementCallToAction::class, 'one');
        $this->assertEquals($object->ElementSummary(), '');
    }

    /**
     *
     */
    public function testGetType()
    {
        $object = Injector::inst()->create(ElementCallToAction::class);
        $this->assertEquals($object->getType(), 'Call To Action');
    }
}