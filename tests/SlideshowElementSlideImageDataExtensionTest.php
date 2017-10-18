<?php

namespace Dynamic\Elements\Tests;

use Dynamic\FlexSlider\Model\SlideImage;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

class SlideshowElementSlideImageDataExtensionTest extends SapphireTest
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
        $object = $this->objFromFixture(SlideImage::class, 'default');
        $fields = $object->getCMSFields();
        $this->assertInstanceOf(FieldList::class, $fields);
        $this->assertNull($fields->dataFieldByName('SlideshowElementID'));
    }
}