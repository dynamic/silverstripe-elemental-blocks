<?php

class AccordionPanelTest extends SapphireTest
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
        $object = $this->objFromFixture('AccordionPanel', 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf('FieldList', $fields);
        $this->assertNull($fields->dataFieldByName('SortOrder'));
    }

    /**
     *
     */
    public function testValidateName()
    {
        $object = $this->objFromFixture('AccordionPanel', 'one');
        $object->Name = '';
        $this->setExpectedException('ValidationException');
        $object->write();
    }

    /**
     *
     */
    public function testCanView()
    {
        $object = $this->objFromFixture('AccordionPanel', 'one');
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
        $object = $this->objFromFixture('AccordionPanel', 'one');
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
        $object = $this->objFromFixture('AccordionPanel', 'one');
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
        $object = $this->objFromFixture('AccordionPanel', 'one');
        $admin = $this->objFromFixture('Member', 'admin');
        $this->assertTrue($object->canCreate($admin));
        $member = $this->objFromFixture('Member', 'default');
        $this->assertTrue($object->canCreate($member));
    }
}
