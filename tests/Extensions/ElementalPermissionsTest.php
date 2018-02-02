<?php

namespace Dynamic\Elements\Tests;

use DNADesign\Elemental\Models\BaseElement;
use DNADesign\Elemental\Models\ElementalArea;
use DNADesign\Elemental\Models\ElementContent;
use Dynamic\Elements\Model\BaseElementObject;
use Dynamic\Elements\ORM\ElementalPermissions;
use Dynamic\Elements\ORM\ElementContentDataExtension;
use Dynamic\Elements\ORM\ElementPermissions;
use Dynamic\Elements\Tests\TestOnly\TestElementContent;
use SilverStripe\Dev\Debug;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;
use SilverStripe\Security\Member;
use SilverStripe\Security\Security;

class ElementalPermissionsTest extends SapphireTest
{
    /**
     * @var string
     */
    protected static $fixture_file = '../fixtures.yml';

    /**
     * @var array
     */
    protected static $extra_dataobjects = [
        TestElementContent::class,
    ];

    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = TestElementContent::create();
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
    }

    /**
     *
     */
    public function testCanCreate()
    {
        $object = TestElementContent::create();
        $admin = $this->objFromFixture(Member::class, 'admin');
        $this->assertTrue($object->canCreate($admin));

        $owner = $this->objFromFixture(Member::class, 'site-owner');
        $this->assertTrue($object->canCreate($owner));

        $member = $this->objFromFixture(Member::class, 'default');
        $this->assertFalse($object->canCreate($member));
    }

    /**
     *
     */
    public function testCanEdit()
    {
        $object = TestElementContent::create();
        $admin = $this->objFromFixture(Member::class, 'admin');
        $this->assertTrue($object->canEdit($admin));

        $owner = $this->objFromFixture(Member::class, 'site-owner');
        $this->assertTrue($object->canEdit($owner));

        $member = $this->objFromFixture(Member::class, 'default');
        $this->assertFalse($object->canEdit($member));
    }

    /**
     *
     */
    public function testCanDelete()
    {
        $object = TestElementContent::create();
        $admin = $this->objFromFixture(Member::class, 'admin');
        $this->assertTrue($object->canDelete($admin));

        $owner = $this->objFromFixture(Member::class, 'site-owner');
        $this->assertTrue($object->canDelete($owner));

        $member = $this->objFromFixture(Member::class, 'default');
        $this->assertFalse($object->canDelete($member));
    }

    /**
     *
     */
    public function testCanPublish()
    {
        $object = TestElementContent::create();
        $admin = $this->objFromFixture(Member::class, 'admin');
        $this->assertTrue($object->canPublish($admin));

        $owner = $this->objFromFixture(Member::class, 'site-owner');
        $this->assertTrue($object->canPublish($owner));

        $member = $this->objFromFixture(Member::class, 'default');
        $this->assertFalse($object->canPublish($member));
    }
}
