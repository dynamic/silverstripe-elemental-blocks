<?php

namespace Dynamic\Elements\Tests;

use Dynamic\Elements\Model\PromoObject;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

class BaseElementObjectTest extends SapphireTest
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
        $object = $this->objFromFixture(PromoObject::class, 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
        #$this->assertNotNull($fields->dataFieldByName('BlockLinkID'));
    }

    /**
     *
     */
    public function testValidateName()
    {
        $promo = Injector::inst()->create(PromoObject::class);
        $valid = $promo->validate()->isValid();
        $this->assertFalse($valid);

        $promo->Name = 'Title';
        $valid = $promo->validate()->isValid();
        $this->assertTrue($valid);
    }
}
