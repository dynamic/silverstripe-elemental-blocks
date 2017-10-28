<?php

use Dynamic\Elements\Elements\ElementSlideshow;
use SilverStripe\Dev\SapphireTest;

class ElementSlideshowTest extends SapphireTest
{
    /**
     * @var string
     */
    protected static $fixture_file = '../fixtures.yml';

    /**
     *
     */
    public function testGetElementSummary()
    {
        $object = $this->objFromFixture(ElementSlideshow::class, 'one');
        $this->assertEquals($object->ElementSummary(), $object->dbObject("Content")->Summary(20));
    }

    /**
     *
     */
    public function testGetType()
    {
        $object = $this->objFromFixture(ElementSlideshow::class, 'one');
        $this->assertEquals($object->getType(), 'Slideshow');
    }
}
