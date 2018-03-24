<?php

namespace Dynamic\Elements\Tests;

use Dynamic\Elements\Model\BaseElementObject;
use Dynamic\Elements\Model\PromoObject;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;
use SilverStripe\Security\Member;

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
        $object = Injector::inst()->create(BaseElementObject::class);
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
        $object = Injector::inst()->create(BaseElementObject::class);
        $valid = $object->validate()->isValid();
        $this->assertFalse($valid);

        $object->Name = 'Title';
        $valid = $object->validate()->isValid();
        $this->assertTrue($valid);
    }

    /**
     *
     */
    public function testCanView()
    {
        $object = Injector::inst()->create(BaseElementObject::class);

        $admin = $this->objFromFixture(Member::class, 'admin');
        $this->assertTrue($object->canView($admin));

        $siteowner = $this->objFromFixture(Member::class, 'site-owner');
        $this->assertTrue($object->canView($siteowner));

        $member = $this->objFromFixture(Member::class, 'default');
        $this->assertNull($object->canView($member));
    }

    /**
     *
     */
    public function testCanEdit()
    {
        $object = Injector::inst()->create(BaseElementObject::class);

        $admin = $this->objFromFixture(Member::class, 'admin');
        $this->assertTrue($object->canEdit($admin));

        $siteowner = $this->objFromFixture(Member::class, 'site-owner');
        $this->assertTrue($object->canEdit($siteowner));

        $member = $this->objFromFixture(Member::class, 'default');
        $this->assertNull($object->canEdit($member));
    }

    /**
     *
     */
    public function testCanDelete()
    {
        $object = Injector::inst()->create(BaseElementObject::class);

        $admin = $this->objFromFixture(Member::class, 'admin');
        $this->assertTrue($object->canDelete($admin));

        $siteowner = $this->objFromFixture(Member::class, 'site-owner');
        $this->assertTrue($object->canDelete($siteowner));

        $member = $this->objFromFixture(Member::class, 'default');
        $this->assertNull($object->canDelete($member));
    }

    /**
     *
     */
    public function testCanCreate()
    {
        $object = Injector::inst()->create(BaseElementObject::class);

        $admin = $this->objFromFixture(Member::class, 'admin');
        $this->assertTrue($object->canCreate($admin));

        $siteowner = $this->objFromFixture(Member::class, 'site-owner');
        $this->assertTrue($object->canCreate($siteowner));

        $member = $this->objFromFixture(Member::class, 'default');
        $this->assertNull($object->canCreate($member));
    }
}
