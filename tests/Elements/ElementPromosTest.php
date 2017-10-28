<?php

namespace Dynamic\Elements\Tests;

use Dynamic\Elements\Elements\ElementPromos;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataList;

class ElementPromosTest extends SapphireTest
{
    /**
     * @var string
     */
    protected static $fixture_file = '../fixtures.yml';

    protected static $extra_dataobjects = [
    ];

    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = $this->objFromFixture(ElementPromos::class, 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
        $this->assertNotNull($fields->dataFieldByName('Promos'));
    }

    /**
     *
     */
    public function testGetPromoList()
    {
        $object = $this->objFromFixture(ElementPromos::class, 'one');
        $this->assertInstanceOf(DataList::class, $object->getPromoList());
        $this->assertEquals($object->getPromoList(), $object->Promos()->sort('SortOrder'));
    }

    /**
     *
     */
    public function testGetElementSummary()
    {
        $object = $this->objFromFixture(ElementPromos::class, 'one');
        $this->assertEquals($object->ElementSummary(), $object->dbObject("Content")->Summary(20));
    }

    /**
     *
     */
    public function testGetType()
    {
        $object = $this->objFromFixture(ElementPromos::class, 'one');
        $this->assertEquals($object->getType(), 'Promos');
    }
}
