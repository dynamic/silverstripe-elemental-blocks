<?php

namespace Dynamic\Elements\Tests;

use Dynamic\Elements\Elements\AccordionElement;
use Dynamic\FlexSlider\Tests\TestPage;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

class AccordionElementTest extends SapphireTest
{
    /**
     * @var string
     */
    protected static $fixture_file = 'fixtures.yml';

    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = $this->objFromFixture(AccordionElement::class, 'one');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
        $this->assertNotNull($fields->dataFieldByName('Panels'));
    }
}
