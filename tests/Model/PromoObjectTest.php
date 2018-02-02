<?php

namespace Dynamic\Elements\Tests;

use Dynamic\Elements\Model\PromoObject;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;
use SilverStripe\Security\Member;
use SilverStripe\Security\Security;

class PromoObjectTest extends SapphireTest
{
    /**
     * @var string
     */
    protected static $fixture_file = '../fixtures.yml';

    /**
     * Tests getCMSFields().
     */
    public function testGetCMSFields()
    {
        $promo = Injector::inst()->create(PromoObject::class);
        $this->assertInstanceOf(FieldList::class, $promo->getCMSFields());
    }
}
