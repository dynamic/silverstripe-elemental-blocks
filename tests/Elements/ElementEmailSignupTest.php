<?php

namespace Dynamic\Elements\Tests;

use Dynamic\Elements\Elements\ElementEmailSignup;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

/**
 * Class ElementEmailSignupTest
 * @package Dynamic\Elements\Tests
 */
class ElementEmailSignupTest extends SapphireTest
{

    /**
     *
     */
    public function testGetCMSFields()
    {
        $object = Injector::inst()->create(ElementEmailSignup::class);
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
    }

    /**
     *
     */
    public function testGetType()
    {
        $object = Injector::inst()->create(ElementEmailSignup::class);
        $this->assertEquals($object->getType(), 'Email Signup');
    }
}
