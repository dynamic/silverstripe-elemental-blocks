<?php

namespace Dynamic\Elements\Tests;

use SilverStripe\Dev\SapphireTest;

class DynamicBaseElementTest extends SapphireTest
{
    /**
     * @var string
     */
    protected static $fixture_file = 'dynamic-elements/tests/Fixtures.yml';

    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = $this->objFromFixture('DynamicBaseElement', 'default');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf('FieldList', $fields);
        $this->assertNotNull($fields->dataFieldByName('Headline'));
        $this->assertNotNull($fields->dataFieldByName('Content'));
    }

    public function testGetTitle()
    {
        $object = $this->objFromFixture('DynamicBaseElement', 'default');
        $this->assertEquals($object->getTitle(), $object->Title);
        $object->Title = '';
        $this->assertEquals($object->getTitle(), $object->config()->title);
    }

    public function testGetCMSTitle()
    {
        $object = $this->objFromFixture('DynamicBaseElement', 'default');
        $cmsTitle = $object->config()->title . ': ' . $object->Title;
        $this->assertEquals($object->getCMSTitle(), $cmsTitle);
        $object->Title = '';
        $this->assertEquals($object->getCMSTitle(), $object->config()->title);
    }

    /**
     *
     */
    public function testCanView()
    {
        $object = $this->objFromFixture('DynamicBaseElement', 'default');
        $admin = $this->objFromFixture('Member', 'admin');
        $this->assertTrue($object->canView($admin));
        $member = $this->objFromFixture('Member', 'default');
        $this->assertTrue($object->canView($member));
    }

    /**
     *
     */
    public function testCanEdit()
    {
        $object = $this->objFromFixture('DynamicBaseElement', 'default');
        $admin = $this->objFromFixture('Member', 'admin');
        $this->assertTrue($object->canEdit($admin));
        $member = $this->objFromFixture('Member', 'default');
        $this->assertTrue($object->canEdit($member));
    }

    /**
     *
     */
    public function testCanDelete()
    {
        $object = $this->objFromFixture('DynamicBaseElement', 'default');
        $admin = $this->objFromFixture('Member', 'admin');
        $this->assertTrue($object->canDelete($admin));
        $member = $this->objFromFixture('Member', 'default');
        $this->assertTrue($object->canDelete($member));
    }

    /**
     *
     */
    public function testCanCreate()
    {
        $object = $this->objFromFixture('DynamicBaseElement', 'default');
        $admin = $this->objFromFixture('Member', 'admin');
        $this->assertTrue($object->canCreate($admin));
        $member = $this->objFromFixture('Member', 'default');
        $this->assertTrue($object->canCreate($member));
    }
}