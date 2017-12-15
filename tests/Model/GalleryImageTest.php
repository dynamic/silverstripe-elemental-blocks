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

    /**
     * Tests canCreate().
     */
    public function testCanCreate()
    {
        $feature = Injector::inst()->create(GalleryImage::class);
        $this->assertTrue($feature->canCreate());
    }

    /**
     * Tests canView().
     */
    public function testCanView()
    {
        $feature = Injector::inst()->create(GalleryImage::class);
        $this->assertTrue($feature->canView());
    }

    /**
     * Tests canEdit().
     */
    public function testCanEdit()
    {
        $feature = Injector::inst()->create(GalleryImage::class);
        $this->assertTrue($feature->canEdit());
    }

    /**
     * Tests canDelete().
     */
    public function testCanDelete()
    {
        $feature = Injector::inst()->create(GalleryImage::class);
        $this->assertTrue($feature->canDelete());
    }
}
