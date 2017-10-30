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
     * Tests getCMSFields()
     */
    public function testGetCMSFields()
    {
        $promo = Injector::inst()->create(PromoObject::class);
        $this->assertInstanceOf(FieldList::class, $promo->getCMSFields());
    }

    /**
     *
     */
    public function testCanView()
    {
        $object = $this->objFromFixture(PromoObject::class, 'one');
        $admin = $this->objFromFixture(Member::class, 'admin');
        $this->assertTrue($object->canView($admin));

        $member = $this->objFromFixture(Member::class, 'default');
        $this->assertTrue($object->canView($member));

        Security::setCurrentUser();
        $this->assertTrue($object->canView());
    }

    /**
     *
     */
    public function testCanEdit()
    {
        $object = $this->objFromFixture(PromoObject::class, 'one');
        $admin = $this->objFromFixture(Member::class, 'admin');
        $this->assertTrue($object->canEdit($admin));

        $member = $this->objFromFixture(Member::class, 'default');
        $this->assertFalse($object->canEdit($member));

        Security::setCurrentUser();
        $this->assertFalse($object->canEdit());
    }

    /**
     *
     */
    public function testCanDelete()
    {
        $object = $this->objFromFixture(PromoObject::class, 'one');
        $admin = $this->objFromFixture(Member::class, 'admin');
        $this->assertTrue($object->canDelete($admin));

        $member = $this->objFromFixture(Member::class, 'default');
        $this->assertFalse($object->canDelete($member));

        Security::setCurrentUser();
        $this->assertFalse($object->canDelete());
    }

    /**
     *
     */
    public function testCanCreate()
    {
        $object = $this->objFromFixture(PromoObject::class, 'one');
        $admin = $this->objFromFixture(Member::class, 'admin');
        $this->assertTrue($object->canCreate($admin));

        $member = $this->objFromFixture(Member::class, 'default');
        $this->assertFalse($object->canCreate($member));

        Security::setCurrentUser();
        $this->assertFalse($object->canCreate());
    }
}
