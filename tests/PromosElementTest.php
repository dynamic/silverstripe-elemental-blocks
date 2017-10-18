<?php

namespace Dynamic\Elements\Tests;

use Dynamic\Elements\Elements\PromosElement;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataList;

class PromosElementTest extends SapphireTest
{
    /**
     * @var string
     */
    protected static $fixture_file = 'fixtures.yml';

    protected static $extra_dataobjects = [
    ];

    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = $this->objFromFixture(PromosElement::class, 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
        $this->assertNotNull($fields->dataFieldByName('Promos'));
    }

    /**
     *
     */
    public function testGetPromoList()
    {
        $object = $this->objFromFixture(PromosElement::class, 'one');
        $this->assertInstanceOf(DataList::class, $object->getPromoList());
        $this->assertEquals($object->getPromoList(), $object->Promos()->sort('SortOrder'));
    }
}