<?php

class SectionElementTest extends SapphireTest
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
        $this->assertNotNull($fields->dataFieldByName('Panels'));
    }
}
