<?php

namespace Dynamic\Elements\Tests;

use Dynamic\Elements\Model\GalleryImage;
use SilverStripe\Core\Injector\Injector;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Forms\FieldList;

/**
 * Class GallerImageTest.
 */
class GalleryImageTest extends SapphireTest
{
    /**
     * Tests getCMSFields().
     */
    public function testGetCMSFields()
    {
        $feature = Injector::inst()->create(GalleryImage::class);
        $this->assertInstanceOf(FieldList::class, $feature->getCMSFields());
    }
}
