<?php

class AccordionElementTest extends SapphireTest
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
        $object = $this->objFromFixture('AccordionElement', 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf('FieldList', $fields);
        $this->assertNotNull($fields->dataFieldByName('Panels'));
    }
}
